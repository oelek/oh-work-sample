<?php

namespace App\Http\Controllers;

use App\Http\Resources\Resource;
use App\Repositories\Contracts\BookRepository;

class BookController extends Controller
{
    /**
     * @var BookRepository
     */
    protected $repository;

    public function __construct(BookRepository $repository)
    {
        parent::__construct($repository);
    }

    public function authorsIndex($bookId)
    {
        return Resource::collection($this->repository->getAuthors($bookId));
    }

    public function genresIndex($bookId)
    {
        return Resource::collection($this->repository->getGenres($bookId));
    }
}
