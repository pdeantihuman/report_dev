@extends('layouts.app_with_js')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <issues-card></issues-card>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ static_resource('js/index.js') }}" defer></script>
@endsection