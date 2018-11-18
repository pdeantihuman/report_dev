<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/17
 * Time: 20:52
 */

function static_resource($path) {
    $base = env('STATIC_RESOURCE_URL', env('APP_URL'));
    $base = $base[strlen($base)-1]=="/"?$base:$base.'/';
    $path = $path[0]=="/"?substr($path,1):$path;
    return $base.$path;
}