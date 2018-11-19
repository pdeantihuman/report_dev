<?php

namespace App\Http\Controllers\API;

use App\Issue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IssuesController extends Controller
{
    public function index(Request $request){
        $filter = $request->input('filter','0');
        if($filter=='0'){
            return Issue::orderBy('id', 'desc')->paginate(15);
        }
        $alley = Auth::user()->alley;
        return Issue::where('alley', $alley)->orderBy('id', 'desc')->paginate(15);
    }
}
