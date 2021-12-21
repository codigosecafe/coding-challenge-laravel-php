<?php
namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Resources\Resource;

class RankMovementResource extends Resource
{
    protected $positionRank = [];

    public function toResource($resource)
    {
        $rank = $this->makeRank( collect( $resource->personal_records->toArray() ) );
        return [
            'movement'       => Str::upper($resource->name),
            'ranked_records' => count($rank),
            'rank'           => $rank,

        ];
    }

    public function makeRank($personalRecords)
    {
        if($personalRecords->isEmpty()){
            return [];
        }
        $recordByUser = $this->getMaxRecordByUser($personalRecords);
        return $this->prepareReturn($recordByUser);
    }


    private function getMaxRecordByUser($personalRecords)
    {
        return $personalRecords->filter(function($row) use ($personalRecords) {
            $record =  $personalRecords->where('user_id', $row['user_id'])->max('value');
            return $row['value'] == $record;
        })->sortByDesc('value')->values();
    }

    private function prepareReturn($recordByUser)
    {
       return $recordByUser->map(function($row){
            return [
               'name_user'          => Str::upper($row["user"]["name"]),
               'position'           => $this->getPosition($row['value']),
               'score'              => \floatval($row['value']),
               'date_time'          => Carbon::parse($row['date'])->format('Y-m-d H:i:s'),
               'date_time_formated' => Carbon::parse($row['date'])->format('d/m/Y H:i:s')
            ];
        })->sortBy('position')->values();
    }

    private function getPosition($score)
    {
        $position = array_search($score, $this->positionRank);
        if($position === false){
            array_push($this->positionRank, $score);
            return $this->getPosition($score);
        }
        return $position + 1;

    }
}
