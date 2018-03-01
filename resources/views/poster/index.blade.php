@extends('layouts.app')
@section('title', trans('poster.list_all'))
@section('backlink', 'account.dashboard')
@section('container-class', 'poster-list')

@section('content')
    <div class="filters posters-filter">
        {{ Form::open(['route' => 'poster.filter', 'method' => 'GET', 'class' => 'poster-filter']) }}
            @include('poster.elements.autocomplete')
        {{ Form::close() }}
    </div>
    <div class="posters-container">
        {{--@include('poster.elements.posters')--}}
    </div>
@endsection
@section('footer')
    @include('layouts.confirm-popup')
@endsection