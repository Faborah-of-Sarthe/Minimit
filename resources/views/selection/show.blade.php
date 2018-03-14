@extends('layouts.app')
@section('title', trans('selection.selection_title', ['name' => $selection->title]))

@section('content')
    <div class="poster-wrapper">
        @include('poster.poster')
    </div>
@endsection
@section('footer')
    <script type="text/javascript">
        ajaxPosterUrls = {
            switchposter: "{{ route('selection.navigation') }}",
            final: "{{ route('selection.final') }}"
        }
    </script>
@endsection
