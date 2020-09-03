<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'authors_books');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'books_genres');
    }

    public function scopeSearch(Builder $queryBuilder, $field, $value = null)
    {
        return $queryBuilder->where($field, "%$value%");
    }
}
