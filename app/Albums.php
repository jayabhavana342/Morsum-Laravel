<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    //
    protected $table = "albums";

    protected $fillable = ['title', 'singer', 'shelves_id'];


}
