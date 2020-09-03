<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface AuthorRepository
{
    public function getBooks(string $authorId): Collection;
}
