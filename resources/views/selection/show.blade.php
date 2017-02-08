@extends('layouts.app')
@section('title', trans('poster.selection_title'))

@section('content')
    <div class="poster-wrapper">
        @include('poster.poster')
    </div>
@endsection
@section('footer')
    <script type="text/javascript">
        ajaxPosterUrls = {
            switchposter: "{{ route('selection.navigation') }}"
        }
    </script>
@endsection
