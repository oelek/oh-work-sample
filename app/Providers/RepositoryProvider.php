<?php

namespace App\Providers;

use App\Repositories\AuthorRepository;
use App\Repositories\BookRepository;
use App\Repositories\Contracts\BaseRepository;
use App\Repositories\Contracts\BookRepository as BookRepositoryContract;
use App\Repositories\Contracts\AuthorRepository as AuthorRepositoryContract;
use App\Repositories\Contracts\GenreRepository as GenreRepositoryContract;
use App\Repositories\GenreRepository;
use App\Repositories\Repository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->bind(BaseRepository::class, Repository::class);
        $this->app->bind(AuthorRepositoryContract::class, AuthorRepository::class);
        $this->app->bind(BookRepositoryContract::class, BookRepository::class);
        $this->app->bind(GenreRepositoryContract::class, GenreRepository::class);

        //
    }
}
