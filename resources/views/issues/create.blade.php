@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">提交报修</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('issues.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="alley" class="col-sm-4 col-form-label text-md-right">教学楼</label>
                            <div class="col-md-6">
                                <input id="alley" type="number" class="form-control{{ $errors->has('alley') ? ' is-invalid' : '' }}" name="alley" value="{{ old('alley') }}" required autofocus>
                                @if ($errors->has('alley'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('alley') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="room" class="col-sm-4 col-form-label text-md-right">教室</label>
                            <div class="col-md-6">
                                <input id="room" type="number" class="form-control{{ $errors->has('room') ? ' is-invalid' : '' }}" name="room" value="" required autofocus>
                                @if ($errors->has('room'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('room') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label text-md-right">描述</label>
                            <div class="col-md-6">
                                <textarea name="description" id="description" class="form-control{{ $errors->has('room') ? ' is-invalid' : '' }}" rows="10" required autofocus></textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    提交报修
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
