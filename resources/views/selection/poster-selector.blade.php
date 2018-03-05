<div class="poster-selector hidden">
    <div class="close">✖</div>
    {{ Form::open(['route' => 'poster.search', 'method' => 'GET']) }}
        @include('poster.elements.autocomplete')
    {{ Form::close() }}
    <div class="posters-result"></div>
</div>