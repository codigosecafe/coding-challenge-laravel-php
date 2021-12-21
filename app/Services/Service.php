<?php

namespace App\Services;

use App\Traits\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use App\Exceptions\MovementException;

abstract class Service
{
    use Validator;

    public $relations = [];
    public $relationsCount = [];

    /**
     *
     * @param Collection|null $filters
     * @return void
     */
   public function index(Collection $filters = null){

    if (!$filters) {$filters = collect();}

        $order = $filters->get('order', 'asc');
        $sortBy = $filters->get('sort', $this->entity::ID);
        $limit = $filters->get('limit', 0);

        $query = $this->entity::with($this->relations);
        if ($search = Str::slug($filters->get('searchTerm'))) {
                $query->whereFuzzy($this->entity::SLUG_NAME, $search);
        }

        $query->orderBy($sortBy, $order);
        $result = $limit > 0 ? $query->paginate($limit) : $query->get();

        if($result->isEmpty()){
            throw new MovementException( __('movement.TERMO_NAO_ENCONTRADO_OU_INVALIDO'), JsonResponse::HTTP_BAD_REQUEST);
        }
        return $result;
    }

}
