<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface BaseRepository
{

    public function getOne(string $modelId): Model;

    public function getAll(): Collection;

    public function filter(array $filters): Collection;

    public function getRelated(string $modelId, string $relation): Collection;
}
