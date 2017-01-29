@extends('layouts.app')
@section('title', trans('oeuvre.list_title'))
@section('backlink', 'account.dashboard')

@section('content')
    <a href="{{ route('oeuvre.create') }}">{!! trans('oeuvre.create_link') !!}</a>
    <ul>
        @forelse ($oeuvres as $oeuvre)
            <li>
                <a href="{{ route('oeuvre.edit', [$oeuvre->id]) }}">{{ $oeuvre->title }}</a>
                {{ Form::model($oeuvre, ['route' => ['oeuvre.destroy', $oeuvre->id], 'method' => 'delete', 'class' => 'id-'.$oeuvre->id]) }}
                    {{ Form::submit(trans('global.delete'), ['class' => 'needs-confirm', 'data-text' => 'contenuuuu', 'data-id' => $oeuvre->id]) }}
                {{ Form::close() }}
            </li>
        @empty
            {!! trans('oeuvre.empty_list') !!}
        @endforelse
    </ul>
@endsection

@section('footer')
    @include('layouts.confirm-popup')
@endsection
