<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'authors';

    public function books()
    {
        return $this->belongsToMany(Book::class, 'authors_books');
    }
}
