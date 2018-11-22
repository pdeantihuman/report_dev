<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @hasSection('static_resource')
        @yield('static_resource')
    @else
        @component('layouts.components.head.resource')
        @endcomponent
    @endif
</head>
<body>
<div id="app">
    @component('layouts.components.nav')
        @slot('url')
            /admin
        @endslot
        @slot('left_side')
        @endslot('left_side')
        @slot('right_side')
            @guest
                <li><a class="nav-link" href="{{ route('login') }}">登录</a></li>
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            下线
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>

                        <a class="dropdown-item" href="/admin/configuration">
                            配置中心
                        </a>

                        <a href="/issues" class="dropdown-item">
                            处理报修
                        </a>
                    </div>
                </li>
            @endguest
        @endslot
    @endcomponent
    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
