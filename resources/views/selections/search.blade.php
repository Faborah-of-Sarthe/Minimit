<div class="search-form">

{!! Form::open(['route' => 'selection.index', 'method' => 'GET']) !!}

{!! Form::label('title', trans('selection.search_label'), ['class' => 'search-bar']) !!}
{!! Form::text('title') !!}

<p class="search-baseline">
    {!! trans('selection.search_filters_baseline') !!}
</p>

<div class="filters">
    @foreach($tags as $tag)
    {!! Form::label('tags[]', $tag->title) !!}
    {!! Form::checkbox('tags[]', $tag->id) !!}
    @endforeach
</div>

{{ Form::submit(trans('selection.search_submit'), ['class' => 'submit-search btn']) }}

{!! Form::close() !!}

</div>