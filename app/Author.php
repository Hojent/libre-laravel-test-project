<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Author extends Model
{

    protected $guarded = ['id'];

    public function books() {
        return $this->hasMany(Book::class);
    }

}
