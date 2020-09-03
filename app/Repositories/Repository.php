<?php

namespace App\Repositories;

use App\Repositories\Common\FilterQuery;
use App\Repositories\Contracts\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Repository implements BaseRepository
{

    /**
     * @var Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    protected function getQueryBuilder(): Builder
    {
        return $this->model->newModelQuery();
    }

    public function getOne(string $modelId): Model
    {
        $queryBuilder = $this->getQueryBuilder();

        return $queryBuilder->findOrFail($modelId);
    }

    public function getAll(): Collection
    {
        $queryBuilder = $this->getQueryBuilder();

        return $queryBuilder->get();
    }

    public function getRelated(string $modelId, string $relation): Collection
    {
        $queryBuilder = $this->getQueryBuilder();

        return $queryBuilder->with($relation)
                            ->findOrFail($modelId)->{$relation};
    }

    public function filter(array $filters): Collection
    {
        return FilterQuery::for($this->getQueryBuilder())
                          ->applyFilter($filters);
    }
}
