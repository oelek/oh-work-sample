<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface AuthorRepository extends BaseRepository
{
    public function getBooks(string $authorId): Collection;
}
