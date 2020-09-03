<?php

namespace App\Repositories;

use App\Repositories\Contracts\AuthorRepository as AuthorRepositoryContract;
use App\Author;
use Illuminate\Database\Eloquent\Collection;

class AuthorRepository extends Repository implements AuthorRepositoryContract
{

    /**
     * @var Author
     */
    protected $model;

    public function __construct(Author $authorModel)
    {
        parent::__construct($authorModel);
    }

    public function getBooks(string $authorId): Collection
    {
        return $this->getRelated($authorId, 'books');
    }
}
