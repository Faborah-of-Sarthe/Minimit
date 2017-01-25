@extends('layouts.app')
@section('title', trans('oeuvre.list_title'))

@section('content')
    <a href="{{ route('oeuvre.create') }}">{!! trans('oeuvre.create_link') !!}</a>
    <ul>
        @forelse ($oeuvres as $oeuvre)
            <li>
                <a href="{{ route('oeuvre.edit', [$oeuvre->id]) }}">{{ $oeuvre->title_ov }}</a>
                <a href="{{ route('oeuvre.destroy', [$oeuvre->id]) }}">{!! trans('global.delete') !!}</a>
            </li>
        @empty
            {!! trans('oeuvre.empty_list') !!}
        @endforelse
    </ul>
@endsection
