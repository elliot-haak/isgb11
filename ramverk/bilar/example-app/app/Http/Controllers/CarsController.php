<?php

namespace app\http\controllers;

use App\Models\Car;
use Illuminate\Http\Request; 
use Illuminate\Validation\Rule; 

Class CarsController extends Controller{
    
    public function index(){
        $posts = Car::all();
        return $posts; 
    }

    public function read($id){
        $posts = Car::findOrFail($id);
        return $posts; 
    }
}
