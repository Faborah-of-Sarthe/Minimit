@extends('layouts.app')
@section('main-title', trans('auth.register_title'))
@section('content')
<div class="container">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
        {{ csrf_field() }}

        <div class="form-row wide form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <div class="field">
                <label for="name" class="col-md-4 control-label">{{ trans('auth.name') }}</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group wide{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="field">
                <label for="email" class="col-md-4 control-label">{{ trans('auth.email_address') }}</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group shared{{ $errors->has('password') ? ' has-error' : '' }}">
            <div class="field">
                <label for="password" class="col-md-4 control-label">{{ trans('auth.password') }}</label>
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="field">
                <label for="password-confirm" class="col-md-4 control-label">{{ trans('auth.password_confirm') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group actions">
            <div class="action-wrapper">
                <button type="submit" class="btn btn-primary">
                    {{ trans('auth.register') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
