<?php

namespace App\Http\Controllers\API;

use App\Issue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IssuesController extends Controller
{
    public function index(){

        return Issue::orderBy('id', 'desc')->paginate(15);
    }
}
