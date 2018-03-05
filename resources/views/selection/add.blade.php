@extends('layouts.app')
@section('title', trans('selection.add_title'))
@section('backlink', 'selection.index')

@section('content')
    {!! Form::open(['route' => 'selection.store', 'method' => 'POST']) !!}
        @include('selection.form')
    {!! Form::close() !!}
    @include('selection.poster-selector')
@endsection
