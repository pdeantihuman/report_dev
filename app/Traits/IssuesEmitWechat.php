<?php
/**
 * Created by PhpStorm.
 * User: johnd
 * Date: 2018/6/7
 * Time: 上午11:16
 */

namespace App\Traits;


use App\Issue;
use GuzzleHttp\Client;

trait IssuesEmitWechat
{
    /**
     * @param Issue $issue
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function emitWechat(Issue $issue) {
        /**
         * 组装数据
         */
        $data = [
            'location' => $issue->alley." 教 ".$issue->room." 室",
            'time' => $issue->created_at,
            'content' => substr($issue->description,0,10),
            'url' => url('issues',['issue'=>$issue->id])
        ];
        /**
         * 构建 url
         */
        $base_url = env('WXINTERFACE');
        $destination =$base_url.'/?';
        foreach($data as $key => $value){
            $variable = $key.'='.$value.'&';
            $destination = $destination.$variable;
        }
        \Log::debug($destination);
        /**
         * 发送数据
         */
        $client = new Client();
        $client->request('GET',$destination);
    }
}