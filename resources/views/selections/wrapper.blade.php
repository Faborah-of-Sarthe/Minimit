@extends('layouts.app')
@section('title', trans('selections.list_title'))


@section('content')
    @include('selections.search')
    <div class="selections-wrapper">
        @include('selections.list')
    </div>
@endsection
@section('footer')
@endsection
