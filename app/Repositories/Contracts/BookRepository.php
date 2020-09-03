<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface BookRepository
{

    public function getAuthors(string $bookId): Collection;

    public function getGenres(string $bookId): Collection;
}
