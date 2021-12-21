<?php
namespace App\Http\Resources;

use Illuminate\Support\Str;
use App\Http\Resources\Resource;

class UserResource extends Resource
{
    private $dataReturn;
    public function toResource($resource)
    {
        $this->dataReturn = [
            'id'                 =>  $resource->getKey(),
            'name_user'       =>  Str::upper($resource->name),
        ];

        if($resource->personal_records->isNotEmpty()){
            $resource->personal_records->map(function($row){
                $this->dataReturn['personal_records'][$row->movement->name][]= [
                    'score' => $row->value,
                    'date' => $row->date->format('Y-m-d H:i:s'),
                ];
            });
        }

        return  $this->dataReturn;
    }
}
