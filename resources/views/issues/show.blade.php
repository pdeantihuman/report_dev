@extends('layouts.admin.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <issues-card issue_id="{{ $issue->id }}"
                             location="{{ $issue->alley.' 教 '.$issue->room.'教室' }}"
                             description="{{ $issue->description }}"
                             completed="{{ $completed?1:0 }}"
                             is_open="{{ $issue->is_open }}"
                             next_id="{{ $next_id }}"
                             datetime="{{ $issue->created_at }}"
                             @if($issue->is_open) @else disabled @endif></issues-card>
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
