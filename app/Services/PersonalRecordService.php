<?php
namespace App\Services;

use Cache;

use Carbon\Carbon;
use App\Services\Service;
use Illuminate\Support\Str;
use App\Entities\PersonalRecord;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use App\Validators\PersonalRecordValidators;


class PersonalRecordService extends Service
{
    protected $entity;
    protected $classNameNow;


    public function __construct(PersonalRecord $personalRecord)
    {
        $this->classNameNow = __CLASS__;
        $this->entity = $personalRecord;
        $this->relations = ['user', 'movement'];
    }

    /**
     * Show function
     *
     * @param [type] $user
     * @return void
     */
   public function show($personalRecordID){
        $cacheNameShow = \md5(Str::slug($this->classNameNow .' '.$personalRecordID));
        $dataPersonalRecord = Cache::remember($cacheNameShow, 3600, function () use ($personalRecordID){
            $user = $this->entity->where($this->entity::ID, $personalRecordID)->firstOrFail();
            return $user->load($this->relations);
        });
        if(empty($dataPersonalRecord)){
            Cache::forget($cacheNameShow);
        }
        return $dataPersonalRecord;
   }

   /**
    * Store function
    *
    * @param Collection $request
    * @return void
    */
   public function store(Collection $request){

        $this->validateWithArray($request->toArray(), PersonalRecordValidators::store(), PersonalRecordValidators::messages() );
        $data4Create = $this->entity->fieldsForCreator($request);
        $this->entity->setValueForField($data4Create, $this->entity::VALUE, floatval($request->get('score')), $this->entity::ADD_FIELD_IF_NOT_EXIST);
        $this->entity->setValueForField($data4Create, $this->entity::DATE, Carbon::now()->format('Y-m-d H:i:s'), $this->entity::ADD_FIELD_IF_NOT_EXIST);
        $this->clearCache();
        return $this->entity->create($data4Create);
   }

  /**
   * Delete function
   *
   * @param [type] $personalRecordID
   * @return void
   */
   public function destroy($personalRecordID){
        $this->validateWithArray([$this->entity::ID => $personalRecordID], PersonalRecordValidators::updateOrDestroy(), PersonalRecordValidators::messages() );
        $deleteData = $this->entity->where($this->entity::ID, $personalRecordID)->first();
        $this->clearCache();
        tap($deleteData)->delete();
        return $deleteData->id;
   }

   public function clearCache()
   {
        Artisan::call('cache:clear');
   }
}
