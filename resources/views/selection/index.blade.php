@extends('layouts.app')
@section('title', trans('selection.my_selections'))
@section('backlink', 'account.dashboard')

@section('content')
  <div class="selections">
      @forelse($selections as $selection)
          <div class="selection-item">
              <h2 class="selection-title">{{ $selection->title }}</h2>
              <span class="auteur">{!! trans('selection.by') !!} {{ $selection->user->name }}</span>
              <span class="nb-posters">{{ $selection->posters->count() }} {!! trans_choice('selection.number_posters', $selection->posters->count()) !!}</span>
              <a class="edit-selection btn" href="{{ route('selection.edit', $selection) }}">
                  <span>{!! trans('selection.edit') !!}</span>
              </a>
          </div>
      @empty
      @endforelse
  </div>
@endsection