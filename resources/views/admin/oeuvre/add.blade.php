@extends('layouts.app')
@section('title', trans('oeuvre.add_title'))
@section('backlink', 'oeuvre.index')

@section('content')
    {!! Form::open(['route' => 'oeuvre.store', 'method' => 'POST']) !!}
        @include('admin.oeuvre.form')
    {!! Form::close() !!}
@endsection
