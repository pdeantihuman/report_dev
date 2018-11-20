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
        $alleys = Auth::user()->alleys;
        return Issue::whereIn('alley', $alleys)->orderBy('id', 'desc')->paginate(15);
    }

    public function show(Request $request){
        $id = $request->id;
        $completed = Issue::where('is_open', true)->whereDate('created_at', now()->toDateString())->doesntExist();
        $issue = Issue::findOrFail($id);
        $next_issue = Issue::where('is_open', true)
            ->where('id', '<', $issue->id)
            ->whereIn('alley', Auth::user()->alleys)
            ->orderBy('id', 'desc')
            ->first();
        if (is_null($next_issue)) {
            $next_issue = new Issue();
            $next_issue->id = 0;
        }
        $next_id = $next_issue->id;
        return response()->json(compact('issue', 'completed', 'next_id'));
    }

}
