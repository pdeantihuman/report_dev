@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        管理面板
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="/admin/configuration">配置中心</a></li>
                        <li class="list-group-item"><a href="/issues">处理报修</a></li>
                        <li class="list-group-item">
                            <a href="//123.206.59.147/mobile">帮助手册</a>
                        </li>
                        <li class="list-group-item">
                            <a href="//123.206.59.147/">编辑手册</a>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </div>
@endsection
