@extends('layouts.app')
@section('title', trans('poster.list_all'))
@section('backlink', 'account.dashboard')
@section('container-class', 'poster-list')

@section('content')
    <div class="posters-container">
        @include('poster.partialposters')
    </div>
@endsection
@section('footer')
    @include('layouts.confirm-popup')
@endsection