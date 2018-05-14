@extends('layouts.app')
@section('container-class', 'compact-layout login-page account')
@section('main-title', trans('auth.login_title'))
@section('content')
    <div class="container">

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="form-row form-group wide{{ $errors->has('email') ? ' has-error' : '' }}">

                <div class="field">
                    <label for="email" class="control-label">{{ trans('auth.email_address') }}</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-row form-group wide{{ $errors->has('password') ? ' has-error' : '' }}">

                <div class="field">
                    <label for="password" class="control-label">{{ trans('auth.password') }}</label>
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group wide">
                <div class="field">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> {{ trans('auth.remember_me') }}
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group shared">
                <div class="action-wrapper">
                    <a class="" href="{{ url('/password/reset') }}">
                        {{ trans('auth.forgot_password') }}
                    </a>
                </div>
                <div class="action-wrapper">
                    <button type="submit" class="btn btn-primary">
                        {{ trans('auth.login_button') }}
                    </button>
                </div>
            </div>
            <div class="form-separator"></div>
            <div class="form-group">
                <div class="center">
                    <a class="register-link" href="{{ url('/register') }}">
                        {{ trans('auth.register_link') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
