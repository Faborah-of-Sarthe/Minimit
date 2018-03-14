@extends('layouts.app')
@section('title', trans('selection.add_title'))
@section('backlink', 'selection.my')

@section('content')
    <div class="poster-count">{{ count($posters) }}</div>
    {!! Form::model($selection, ['route' => ['selection.update', $selection], 'method' => 'PUT']) !!}
        {!! Form::hidden('cookie-name', 'selection_'.$selection->id, ['class' => 'cookie-name']) !!}
        @include('selection.form')
    {!! Form::close() !!}
    <div class="add-posters">{{ trans('selection.add_posters') }}</div>
    @include('selection.poster-selector')
@endsection