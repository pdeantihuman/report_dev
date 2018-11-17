@extends('layouts.app_with_js')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">后台管理</div>
                    <div class="card-body">
                        <div class="container">
                            <issues-list></issues-list>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ static_resource('js/index.js') }}" defer></script>
@endsection