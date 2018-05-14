@extends('layouts.app')
@section('main-title', trans('auth.reset_password_title'))

<!-- Main Content -->
@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}

        <div class="form-group wide{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="field">
                <label for="email" class="control-label">{{ trans('auth.email_address') }}</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group actions">
            <div class="action-wrapper">
                <button type="submit" class="btn btn-primary">
                    {{ trans('auth.reset_password_button') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
