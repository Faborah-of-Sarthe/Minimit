@extends('layouts.app')
@section('title', trans('poster.edit_title'))
@section('backlink', 'poster.index')
@section('container-class', 'poster-update')
@section('content')
    {!! Form::model($poster, ['route' => ['poster.update', $poster->id], 'method' => 'PUT', 'class' => 'poster-main-form']) !!}
        @include('poster.form')
@endsection
@section('footer')
    @include('layouts.confirm-popup')
@endsection