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
                if ($value>$env['maximum_alley']){
                    $data = [
                        'errMsg' => 'minimum_alley 不能大于 maximum_alley',
                        'id' => str_random(10),
                    ];
                    return response()->json($data,500);
                };
                break;

            case 'maximum_alley':
                if ($value<$env['minimum_alley']){
                    $data=[
                        'errMsg' => 'maximum_alley 不能小于 minimum_alley',
                        'id' => str_random(10),
                    ];
                    return response()->json($data,500);
                };

                break;
            default:
                break;
        }
        $item = Environment::where('key', $key)->first();
        $item->value = $value;
        $item->save();
        $data = [
            'key' => $item->key,
            'value' => $item->value,
        ];
        return response()->json($data,200);
    }
}
