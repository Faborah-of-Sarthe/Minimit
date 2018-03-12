{!! Form::open(['route' => 'selection.index', 'method' => 'GET']) !!}

{!! Form::label('title', 'Rechercher', ['class' => 'search-bar']) !!} {{-- localisation label --}}
{!! Form::text('title') !!}

{!! Form::label('tags[]', 'test') !!}
{!! Form::checkbox('tags[]', '1') !!}

{!! Form::label('tags[]', 'test') !!}
{!! Form::checkbox('tags[]', '5') !!}

{{ Form::submit(trans('selections.search_submit'), ['class' => 'submit-search btn']) }}

{!! Form::close() !!}