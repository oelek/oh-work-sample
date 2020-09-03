<?php

namespace App\Repositories;

use App\Book;
use App\Repositories\Contracts\BookRepository as BookRepositoryContract;
use Illuminate\Database\Eloquent\Collection;

class BookRepository extends Repository implements BookRepositoryContract
{

    /**
     * @var Book
     */
    protected $model;

    public function __construct(Book $bookModel)
    {
        parent::__construct($bookModel);
    }

    public function getGenres(string $bookId): Collection
    {
        return $this->getRelated($bookId, 'genres');
    }

    public function getAuthors(string $bookId): Collection
    {
        return $this->getRelated($bookId, 'authors');
    }
}
