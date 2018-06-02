<?php
/**
 * Created by PhpStorm.
 * User: johnd
 * Date: 2018/6/2
 * Time: 下午4:33
 */?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">后台管理</div>
                    <div class="card-body">
                        <div class="container">
                            <ul class="list-group">
                                @foreach($issues as $issue)
                                    <li class="list-group-item">{{ $issue->description }}</li>
                                @endforeach
                            </ul>
                        </div>
                        {{ $issues->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

