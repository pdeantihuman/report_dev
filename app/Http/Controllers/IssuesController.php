<?php

namespace App\Http\Controllers;

use App\Environment;
use App\Footprint;
use App\Issue;
use App\Traits\EmitIssueNotification;
use App\User;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    use EmitIssueNotification;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('issues.index');
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
        $footprint = new Footprint();
        $footprint->alley = $alley;
        $footprint->room = $room;
        $footprint->save();
        return view('issues.create', compact('alley', 'room'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Issue $issue
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(Request $request, Issue $issue)
    {
        // 获取环境变量
        $env = Environment::all()->pluck('value', 'key');
        // 表单验证
        $request->validate([
            'alley' => "required|numeric|between:{$env['minimum_alley']},{$env['maximum_alley']}",
            'room' => ['required', 'integer', function ($attribute, $value, $fail) use ($env){
                // 将 room 转化为 integer
                $int = (int)$value;
                if ($int / 100 < 1 or $int / 100 > 4 or $int % 100 < 1 or $int % 100 > 30) {
                    $fail('无效的教室！');
                }
            }],
            'description' => 'required',
        ]);
        // 填充报修事件参数
        $issue->alley = $request->input('alley');
        $issue->room = $request->input('room');
        $issue->description = $request->input('description');
        // 指派给维修人员
        $users = User::whereRaw('json_contains(`alleys`, ?)',['"'.$issue->alley.'"'])->get();
        if ($users->count() > 1) {
            throw new \Exception();
        }
        if ($users->count() == 1) {
            $user = $users->first();
            $issue->appointTo($user);
//            try {
                $this->emitIssueNotification($issue, $user);
//            } catch (\GuzzleHttp\Exception\BadResponseException $e) {
//                session([
//                    'message'=>  '发送微信推送时出现故障',
//                    'status' => '500'
//                ]);
//            }
        }
        $issue->save();
        return redirect('/issues/home/success');
    }

    /**
     * 撤销完成操作
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function undo(Request $request)
    {
        $issue = Issue::findOrFail($request->issue);
        $issue->is_open = 1;
        $issue->save();
        return response()->json([], 200); // TODO: 修改状态码
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('issues.show', ['id'=> $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 将报修状态设置为完成
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $issue = Issue::findOrFail($id);
        $issue->is_open = false;
        $issue->save();
        return response()->json([], 200); // TODO: 修改状态码
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function home()
    {
        return view('issues.home');
    }
}
