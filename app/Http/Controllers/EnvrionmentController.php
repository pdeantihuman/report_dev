<?php

namespace App\Http\Controllers;

use App\Environment;
use Illuminate\Http\Request;

class EnvrionmentController extends Controller
{


    public function index(){
        return Environment::all();
    }

    public function update(Request $request){
        $env = Environment::all()->pluck('value', 'key');

        $key = $request->input('key');
        $value = $request->input('value');
        switch($key){
            case 'minimum_alley':
                if ($env['minimum_alley']>$env['maximum_alley']){
                    abort(404);
                };
                break;

            case 'maximum_alley':
                if ($env['maximum_alley']<$env['minimum_alley']){
                    abort(404);
                };
                break;
            default:
                break;
        }
        $item = Environment::where('key', $key)->first();
        $item->value = $value;
        $item->save();
        return $env;
    }
}
