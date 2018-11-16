@extends('layouts.app_with_js')

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
                         datetime="{{ $issue->created_at }}" @if($issue->is_open) @else disabled @endif></issues-card>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/show.js') }}" defer></script>
@endsection
