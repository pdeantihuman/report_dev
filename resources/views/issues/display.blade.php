@extends('layouts.guest.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">报修 #{{$issue_id}}</div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>报修位置</span><span>{{ $location }}</span></li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>是否已被处理</span><span>{{ $status }}</span></li>
                        @if(isset($genius_name))
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>已提交给</span><span>{{ $genius_name }}</span></li>
                        @endif
                    </ul>
                </div>
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
