@extends('layouts.app')
@section('title', trans('poster.random_poster_title'))

@section('content')
    <div class="poster-wrapper">
        @include('poster.poster')
    </div>
@endsection
