<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 18-11-16
 * Time: 上午3:58
 */

namespace App\Traits;


use App\Issue;
use App\User;
use GuzzleHttp\Client;
use Log;

trait EmitIssueNotification
{
    public function emitIssueNotification(Issue $issue, User $user){
        $client = new Client([
            'base_uri' => env('WXINTERFACE')
        ]);
        $data = [
            "first" => 'hello',
            'touser' => $user->openid,
            'url' => url("/issues/{$issue->id}"),
            'id' => '3818',
            'keyword1' => "未知",
            'keyword2' => "{$issue->description}",
            'keyword3' => "计算机故障",
            'keyword4' => "{$issue->alley}教学楼{$issue->room}教室",
            'keyword5' => "{$issue->created_at}",
            'remark' => ""
        ];
        $response = $client->request('POST', 'message/template/send', [
            'form_params' => $data
        ]);
        return view('issues.home');
    }

}