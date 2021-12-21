<?php
namespace App\Services;

use Cache;

use App\Services\Service;
use App\Entities\Movement;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Validators\MovementValidators;


class MovementService extends Service
{
    protected $entity;
    protected $classNameNow;
    /**
    * MovementService constructor.
    */
    public function __construct(Movement $movement)
    {
        $this->classNameNow = __CLASS__;
        $this->entity = $movement;
        $this->relations = [];
    }
   /**
    *
    * @param [type] $movement
    * @return void
    */
   public function show($movement){
        $cacheNameShow = \md5(Str::slug($this->classNameNow .' '.$movement));
        $dataMovement = Cache::remember($cacheNameShow, 3600, function () use ($movement){
            $movement = $this->entity->where($this->entity::ID, $movement)->orWhere($this->entity::SLUG_NAME, Str::slug($movement))->firstOrFail();
            return $movement->load($this->relations);
        });
        if(empty($dataMovement)){
            Cache::forget($cacheNameShow);
        }
        return $dataMovement;
   }

  /**
   * Store function
   *
   * @param Collection $request
   * @return void
   */
   public function store(Collection $request){
        $this->validateWithArray($request->toArray(), MovementValidators::store(), MovementValidators::messages() );
        $data4Create = $this->entity->fieldsForCreator($request);
        $this->clearCache($data4Create['name']);
        return $this->entity->create($data4Create);
   }

  /**
   * Update function
   *
   * @param [type] $request
   * @param [type] $movementID
   * @return void
   */
   public function update($request,  $movementID){

        $this->validateWithArray([$this->entity::ID => $movementID], MovementValidators::updateOrDestroy(), MovementValidators::messages() );
        $movement = $this->entity->where($this->entity::ID, $movementID)->first();
        $data4Update = $this->entity->fieldsForCreator($request, $this->entity::METHOD_UPDATE);
        $this->clearCache($data4Update['name']);
        return tap( $movement)->update($data4Update);
   }


 /**
  * Destroy function
  *
  * @param [type] $movementID
  * @return void
  */
   public function destroy($movementID){
        $this->validateWithArray([$this->entity::ID => $movementID], MovementValidators::updateOrDestroy(), MovementValidators::messages() );
        $deleteData = $this->entity->where($this->entity::ID, $movementID)->first();
        if($deleteData->personal_records->isNotEmpty()){
            $deleteData->personal_records()->delete();
        }
        $this->clearCache($deleteData->name);
        tap($deleteData)->delete();
        return $deleteData->name;
   }

   public function clearCache($name)
   {
        Cache::forget(\md5(Str::slug('App\Services\MovementService' .' '.$name )));
        Cache::forget(\md5(Str::slug('App\Services\RankMovementService' .' '.$name)));
   }
}
