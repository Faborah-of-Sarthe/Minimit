
<div class="form-row">
    {!! Form::label('title', trans('selection.title_label')) !!}
    {!! Form::text('title') !!}
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
<div class="add-posters">{{ trans('selection.add_posters') }}</div>
