<?php

namespace App\Http\Controllers\API;

use App\Issue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IssuesController extends Controller
{
    public function index(Request $request){
        $fif=$request->input('filter','0');
        if($fif=='0'){
            $alley = \Auth::user()->alley;
            return Issue::orderBy('id', 'desc')->paginate(15);
        }
        $alley = \Auth::user()->alley;
        return Issue::where('alley', $alley)->orderBy('id', 'desc')->paginate(15);
    }
}
