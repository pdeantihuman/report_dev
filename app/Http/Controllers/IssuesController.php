<?php

namespace App\Http\Controllers;

use App\Issue;
use App\Traits\IssuesEmitWechat;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    use IssuesEmitWechat;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::latest()->paginate(20);
        return view('issues.index',compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $alley = $request->input('alley');
        $room = $request->input('room');
        return view('issues.create',compact('alley','room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Issue $issue)
    {
        $request->validate([
            'alley' => 'required|numeric|between:1,12',
            'room' => ['required','integer',function($attribute, $value, $fail) {
                $int = (int) $value;
                if ($int / 100 < 1 or $int / 100 > 8 or $int % 100 < 1 or $int % 100 > 30){
                    $fail('无效的教室！');
                }
            }],
            'description' => 'required',
        ]);
        $issue = $issue->fill($request->all());
        $issue->save();
        $this->emitWechat($issue);
        return view('issues.home');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function undo(Request $request){
        $issue = Issue::findOrFail($request->issue);
        $issue->isOpen = 1;
        $issue->save();
        return response()->json([],200); // TODO: 修改状态码
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
         * 准备数据
         */
        $completed = Issue::where('isOpen',true)->whereDate('created_at', now()->toDateString())->doesntExist();
        $issue = Issue::findOrFail($id);
        $next_issue = Issue::where('isOpen',true)
            ->where('id','<',$issue->id)
            ->orderBy('id','desc')
            ->first();
        /**
         * 处理边界情况，前端做好对应
         */
        if (is_null($next_issue)){
            $next_issue = new Issue();
            $next_issue->id = 0;
        }
        $next_id = $next_issue->id;
        return view('issues.show',compact('issue','completed','next_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $issue = Issue::findOrFail($id);
        $issue->isOpen = false;
        $issue->save();
        return response()->json([],200); // TODO: 修改状态码
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
