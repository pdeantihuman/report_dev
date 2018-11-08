<?php

namespace App\Http\Controllers;

use App\Environment;
use Illuminate\Http\Request;

class EnvrionmentController extends Controller
{


    public function index(){
        return Environment::all();
    }
    //
    public function update(Request $request){

        $key = $request->input('key');
        $value = $request->input('value');
        $env = Environment::where('key', $key)->first();
        $env->value = $value;
        $env->save();
        return $env;
    }
}
