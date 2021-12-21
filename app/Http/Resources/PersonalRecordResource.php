<?php
namespace App\Http\Resources;

use Illuminate\Support\Str;
use App\Http\Resources\Resource;

class PersonalRecordResource extends Resource
{
    public function toResource($resource)
    {
        return [
            'id'                 =>  $resource->getKey(),
            'name_user'       =>  Str::upper($resource->user->name),
            'name_movement'       =>  Str::upper($resource->movement->name),
            'score'       => $resource->value,
            'date_time'       => $resource->date->format('Y-m-d H:i:s'),
        ];
    }
}
