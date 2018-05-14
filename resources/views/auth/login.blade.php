@extends('layouts.app')
@section('main-title', trans('auth.login_title'))
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-row form-group wide{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="control-label">{{ trans('auth.email_address') }}</label>

                            <div class="field">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row form-group wide{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label">{{ trans('auth.password') }}</label>

                            <div class="field">
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

                        <div class="form-group actions">
                            <div class="action-wrapper">
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    {{ trans('auth.forgot_password') }}
                                </a>
                            </div>
                            <div class="action-wrapper">
                                <a class="btn colorized" href="{{ url('/register') }}">
                                    {{ trans('auth.register') }}
                                </a>
                            </div>
                            <div class="action-wrapper">
                                <button type="submit" class="btn btn-primary">
                                    {{ trans('auth.login_button') }}
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
