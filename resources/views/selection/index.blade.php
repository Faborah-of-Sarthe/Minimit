@extends('layouts.app')
@section('title', trans('selection.my_selections'))
@section('backlink', 'account.dashboard')

@section('content')
  <div class="selections items-list">
      @forelse($selections as $selection)
          <div class="selection-item item" data-id="{{ $selection->id }}">
              <h2 class="selection-title">{{ $selection->title }}</h2>
              <span class="auteur">{!! trans('selection.by') !!} {{ $selection->user->name }}</span>
              <span class="nb-posters">{{ $selection->posters->count() }} {!! trans_choice('selection.number_posters', $selection->posters->count()) !!}</span>
              <a class="edit-selection btn" href="{{ route('selection.edit', $selection) }}">
                  <span>{!! trans('selection.edit') !!}</span>
              </a>
              {!! Form::open(['route' => ['selection.destroy', $selection->id], 'method' => 'DELETE', 'class' => 'delete-selection delete-item id-'.$selection->id]) !!}
              <div class="delete  needs-confirm"  data-text="{{ trans('selection.delete_selection_confirmation_message') }}" data-id="{{ $selection->id }}">{{ trans('selection.selection_delete') }}</div>
              {!! Form::close() !!}
          </div>
      @empty
      @endforelse
  </div>
@endsection
@section('footer')
    @include('layouts.confirm-popup')
@endsection