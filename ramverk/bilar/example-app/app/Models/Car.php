<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;


class Car extends Model{
    protected $table = "bilar";

    protected $fillable = [
        'regnr',
        'marke',
        'modell',
        'arsmodell',
    ];
}
