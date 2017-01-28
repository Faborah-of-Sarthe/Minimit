@extends('layouts.app')
@section('title', trans('account.dash_title'))

@section('content')
    <a href="{{ url('/logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
        {!! trans('account.logout') !!}
    </a>
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
    </form>

    @if (Auth::user()->is_admin)
        <a href="{{ route('oeuvre.index') }}">
            {!! trans('account.oeuvre_list') !!}
        </a>
    @endif
@endsection
