<?php
namespace App\Services;

use Cache;

use App\Entities\User;
use App\Services\Service;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Validators\UserValidators;


class UserService extends Service
{
    protected $entity;
    protected $classNameNow;

    /**
     * Construct function
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->classNameNow = __CLASS__;
        $this->entity = $user;
        $this->relations = ['personal_records', 'personal_records.movement'];
    }

    /**
     * Show function
     *
     * @param [type] $user
     * @return void
     */
   public function show($userID){
        $cacheNameShow = \md5(Str::slug($this->classNameNow .' '.$userID));
        $dataUser = Cache::remember($cacheNameShow, 3600, function () use ($userID){
            $user = $this->entity->where($this->entity::ID, $userID)->firstOrFail();
            return $user->load($this->relations);
        });
        if(empty($dataUser)){
            Cache::forget($cacheNameShow);
        }
        return $dataUser;
   }

   /**
    * Store function
    *
    * @param Collection $request
    * @return void
    */
   public function store(Collection $request){
        $this->validateWithArray($request->toArray(), UserValidators::store(), UserValidators::messages() );
        $data4Create = $this->entity->fieldsForCreator($request);
        $this->clearCache($data4Create['name']);
        return $this->entity->create($data4Create);
   }

   /**
    * Update function
    *
    * @param [type] $request
    * @param [type] $userID
    * @return void
    */
   public function update($request,  $userID){

        $this->validateWithArray([$this->entity::ID => $userID], UserValidators::updateOrDestroy(), UserValidators::messages() );
        $user = $this->entity->where($this->entity::ID, $userID)->first();
        $data4Update = $this->entity->fieldsForCreator($request, $this->entity::METHOD_UPDATE);
        $this->clearCache($data4Update['name']);
        return tap( $user)->update($data4Update);
   }


  /**
   * Delete function
   *
   * @param [type] $userID
   * @return void
   */
   public function destroy($userID){
        $this->validateWithArray([$this->entity::ID => $userID], UserValidators::updateOrDestroy(), UserValidators::messages() );
        $deleteData = $this->entity->where($this->entity::ID, $userID)->first();
        if($deleteData->personal_records->isNotEmpty()){
            $deleteData->personal_records()->delete();
        }
        $this->clearCache($deleteData->name);
        tap($deleteData)->delete();
        return $deleteData->name;
   }

   public function clearCache($name)
   {
        Cache::forget(\md5(Str::slug('App\Services\UserService' .' '.$name )));
   }
}
