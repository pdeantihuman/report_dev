@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <configuration-list></configuration-list>
            </div>
        </div>
    </div>
@endsection

@section('static_resource')
    @component('layouts.components.head.resource')
        @slot('asset_script')
            <script src="{{ static_resource('js/configuration.js') }}" defer></script>
        @endslot
    @endcomponent
@endsection
