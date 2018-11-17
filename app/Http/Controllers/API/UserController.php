<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function setAlley(Request $request){
        $env = Environment::all()->pluck('value', 'key');
        $user=\Auth::user();
        $user->alley = $request->input('alley');
        if($user->alley < $env['minimum_alley'] && $user->alley > $env['maximum_alley']){
            abort(404);
        }
        $user->save();
        return $user;
    }

    public function getUser(){
        return \Auth::user();
    }
}
