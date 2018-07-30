<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    //
    protected $table = "books";

    protected $fillable = ['title', 'authors', 'shelves_id'];
}
