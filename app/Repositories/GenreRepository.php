<?php

namespace App\Repositories;

use App\Repositories\Contracts\GenreRepository as GenreRepositoryContract;
use App\Genre;

class GenreRepository extends Repository implements GenreRepositoryContract
{

    /**
     * @var Genre
     */
    protected $model;

    public function __construct(Genre $genreModel)
    {
        parent::__construct($genreModel);
    }
}
