{!! Form::hidden('poster_ids', null, ['class' => 'posters-hidden posters-ids']) !!}
<div class="form-row">
    {!! Form::label('title', trans('selection.title_label')) !!}
    {!! Form::text('title') !!}
</div>
<div class="posters-selected">
    <ul>
        @forelse($posters as $poster)
            @include('selection.elements.poster')
        @empty
            {{ trans('selection.no_posters') }}
        @endforelse
    </ul>
</div>
<div class="add-posters">{{ trans('selection.add_posters') }}</div>
