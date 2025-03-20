<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request; 
use Illuminate\Validation\Rule; 

Class MoviesController extends Controller{
    
    public function getAllMovies(){
        $getAll = Movie::all();
        return $getAll; 
    }

    public function searchMovie($id){
        $find = Movie::findOrFail($id);
        return $find; 
    }
}
