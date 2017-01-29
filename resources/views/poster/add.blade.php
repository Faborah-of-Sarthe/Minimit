@extends('layouts.app')
@section('title', trans('poster.add_title'))
@section('backlink', 'poster.index')

@section('content')
    {!! Form::open(['route' => 'poster.store', 'method' => 'POST']) !!}
        @include('poster.form')
    {!! Form::close() !!}
@endsection
