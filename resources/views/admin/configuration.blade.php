@extends('admin.app')

@section('title')
    配置中心
@endsection

@section('brand')
    配置中心
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <configuration-list></configuration-list>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ static_resource('js/configuration.js') }}" defer></script>
@endsection