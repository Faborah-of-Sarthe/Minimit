@extends('layouts.app')
@section('title', trans('selection.list_title'))


@section('content')
    @include('selections.search')
    <div class="selections-wrapper">
        @include('selections.list')
    </div>
@endsection
@section('footer')
@endsection
