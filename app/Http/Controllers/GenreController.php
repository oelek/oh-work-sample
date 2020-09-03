<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\GenreRepository;

class GenreController extends Controller
{
    /**
     * @var GenreRepository
     */
    protected $repository;

    public function __construct(GenreRepository $repository)
    {
        parent::__construct($repository);
    }
}
