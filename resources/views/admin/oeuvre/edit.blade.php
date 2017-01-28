@extends('layouts.app')
@section('title', trans('oeuvre.edit_title'))

@section('content')
    {!! Form::model($oeuvre, ['route' => ['oeuvre.update', $oeuvre->id], 'method' => 'PUT']) !!}
        @include('admin.oeuvre.form')
    {!! Form::close() !!}
@endsection
