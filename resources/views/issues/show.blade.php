@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <issues-card issue_id="{{ $id }}"></issues-card>
            </div>
        </div>
    </div>
@endsection

@section('static_resource')
    @component('layouts.components.head.resource')
        @slot('asset_script')
            <script src="{{ static_resource('js/show.js') }}" defer></script>
        @endslot
    @endcomponent
@endsection
