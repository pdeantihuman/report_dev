@extends('layouts.app_with_js')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <issues-card issues_id="{{ $this->id }}"
                         location="{{ $this->alley.' 教 '.$this->room.'教室' }}"
                         description="{{ $this->description }}"
                         completed="{{ $completed }}"
                         next_id="{{ $next_id }}"
                         datetime="{{ $this->created_at }}"></issues-card>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/show.js') }}" defer></script>
@endsection
