<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;

Class Movie extends Model{
    protected $table = "movies";

    protected $fillable = [
        'title',
        'year',
        'genre',
        'rating',
    ];
}