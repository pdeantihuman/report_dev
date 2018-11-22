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
            #
        @endslot
        @slot('left_side')
        @endslot
        @slot('right_side')
        @endslot
    @endcomponent

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
