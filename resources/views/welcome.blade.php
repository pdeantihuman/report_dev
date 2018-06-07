<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                background-color: #f5f8fa;
            }

            .full-height {
                height: 100vh;
                margin-bottom: -75px;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 18px;
                font-weight: 500;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                background-color: white;
                height: 124px;
                border-radius: 30px;
                padding: 5px 25px;
            }

            img {
                height: 124px;
                width: 124px;
                margin-right: 5px;
            }

            span {
                padding-bottom: 20px;
            }

            .flo {
                float: left
            }

            footer {
                margin-bottom: 20px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">主页</a>
                    @else
                        <a href="{{ route('login') }}">登录</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <div class="flo"><img src="{{ asset('logo/tianjin.jpg') }}" alt="log"></div>
                    <span>{{ config('app.name') }}</span>
                </div>

                <div class="links">
                    <a href="{{ route('issues.create') }}">打开报修</a>
                    <a href="{{ route('issues.index') }}">处理报修</a>
                    <a href="//123.206.59.147/mobile">帮助手册</a>
                    <a href="//123.206.59.147/">编辑手册</a>
                </div>
            </div>
        </div>
    </body>

    <footer>
        <div style="text-align: center">
            <p>北京科技大学天津学院 网络中心</p>
            <p>V1.0</p>
        </div>
    </footer>
</html>
