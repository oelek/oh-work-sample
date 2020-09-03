<?php

namespace App\Http\Controllers;

use App\Http\Resources\Resource;
use App\Repositories\Contracts\AuthorRepository;

class AuthorController extends Controller
{

    /**
     * @var AuthorRepository
     */
    protected $repository;

    public function __construct(AuthorRepository $repository)
    {
        parent::__construct($repository);
    }

    public function booksIndex($authorId)
    {
        return Resource::collection($this->repository->getBooks($authorId));
    }
}
