<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function setAlley(Request $request){
        $user=\Auth::user();
        $user->alley = $request->input('alley');
        $user->save();
        return $user;
    }

    public function getUser(){
        return \Auth::user();
    }
}
