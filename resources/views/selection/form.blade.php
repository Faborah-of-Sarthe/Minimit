
<div class="form-row">
    {!! Form::label('title', trans('selection.title_label')) !!}
    {!! Form::text('title') !!}
</div>
<div class="form-row">
    {{ trans('selection.tags_selection') }}
    @foreach($tags as $tag)
        {!! Form::label('tag_'.$tag->id, $tag->title) !!}
        {!! Form::checkbox('tags[]', $tag->id, null, ['id' => 'tag_'.$tag->id]) !!}
    @endforeach
</div>
<div class="posters-selected">
    <div class="empty-message  @if($posters) hidden @endif">
        {{ trans('selection.no_posters') }}
    </div>
    <div class="content">
        @forelse($posters as $poster)
            @include('selection.elements.poster')
        @empty
        @endforelse
    </div>
</div>
<div class="form-row">
    {{ Form::submit(trans('selection.submit'), ['class' => 'submit-poster btn']) }}
</div>
