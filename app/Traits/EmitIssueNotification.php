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
use App\Environment;
use GuzzleHttp\Client;
use Log;

trait EmitIssueNotification
{
    protected function emitWeChatNotificaiton(Issue $issue, User $user)
    {
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
        return $response;
    }

    protected function emitSocketNotification(Issue $issue, User $user){
        

        $issue_data=[
            "alley" => "{$issue->alley}",
            "room" => "{$issue->room}",
            "description" =>"{$issue->description}",
        ];
        
        // Redis::publish("issue-genius", json_encode($issue_data)); TODO: 判断环境变量中的 push_notification 是否为 true
        return true; // feat: 
    }


    public function emitIssueNotification(Issue $issue, User $user)
    {
        $env = Environment::all()->pluck('value', 'key');
        $this->emitWeChatNotificaiton($issue, $user);
        if($env['push_socket_notification'] == '1') {
            $this->emitSocketNotification($issue, $user);
        }
        return true;
    }

}