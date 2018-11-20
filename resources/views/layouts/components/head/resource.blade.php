<!-- Scripts -->
@if(isset($asset_script))
    {{ $asset_script }}
@else
    <script src="{{ static_resource('js/app.js') }}" defer></script>
@endif

<!-- Fonts -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

<!-- Styles -->
@if(isset($asset_css))
    {{ $asset_css }}
@else
    <link href="{{ static_resource('css/app.css') }}" rel="stylesheet">
@endif