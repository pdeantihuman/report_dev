<?php

namespace App\Http\Controllers\API;

use App\Environment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getUser()
    {
        return \Auth::user();
    }

    public function setAlley(Request $request)
    {
        $env = Environment::all()->pluck('value', 'key');
        $user = \Auth::user();
        $user->alley = $request->input('alley');
        if ($user->alley < $env['minimum_alley'] && $user->alley > $env['maximum_alley']) {
            abort(404);
        }
        $user->save();
        return $user;
    }

    public function setOpenid(Request $request)
    {
        $user = \Auth::user();
        $user->openid = $request->input('openid');
        $user->save();
        return $user;
    }
}
