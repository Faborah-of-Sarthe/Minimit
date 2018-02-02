@extends('layouts.app')
@section('title', trans('poster.add_title'))
@section('backlink', 'poster.index')
@section('container-class', 'poster-update')

@section('content')
    {!! Form::open(['route' => 'poster.store', 'method' => 'POST']) !!}
        @include('poster.form')
@endsection
@section('footer')
    @include('layouts.confirm-popup')
@endsection