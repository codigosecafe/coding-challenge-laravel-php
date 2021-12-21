<?php
namespace App\Http\Resources;

use Illuminate\Support\Str;
use App\Http\Resources\Resource;

class MovementResource extends Resource
{

    public function toResource($resource)
    {
        return [
            'id'                 =>  $resource->getKey(),
            'name'               =>  Str::upper($resource->name),
        ];
    }
}
