<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface BookRepository extends BaseRepository
{

    public function getAuthors(string $bookId): Collection;

    public function getGenres(string $bookId): Collection;
}
