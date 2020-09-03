<?php

namespace App\Repositories\Common;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class FilterQuery
{

    /**
     * @var Builder
     */
    private $queryBuilder;

    public function __construct(Builder $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    public static function for(Builder $queryBuilder): FilterQuery
    {
        return new self($queryBuilder);
    }

    public function applyFilter(array $filter): Collection
    {
        $queryBuilder = $this->queryBuilder;

        foreach ($filter as $key => $value) {
            $queryBuilder
                ->where($key, 'LIKE', "%$value%");
        }

        return $queryBuilder->get();
    }
}
