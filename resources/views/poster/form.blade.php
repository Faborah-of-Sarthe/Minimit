<div class="form-row">
    {!! Form::label('oeuvre', trans('poster.oeuvre')) !!}
    {!! Form::hidden('oeuvre_id', null, ['class' => 'autofill-hidden', 'autocomplete' => 'off']) !!}
    {!! Form::hidden('image_ids', null, ['class' => 'images-hidden']) !!}
    {!! Form::text('oeuvre_title', null, ['class' => 'autocomplete-field autofill oeuvre-title', 'data-url' => route('oeuvre.search'), 'autocomplete' => 'off']) !!}
    <div class="autocomplete-results hidden"></div>
</div>

<div class="images form-row">
    <div class="upload">
        <label for="image">
            {{ trans('poster.add_image') }}
            {!! Form::file('image', ['class' => 'input-file', 'data-href' => route('image.store')]) !!}
        </label>
        <div class="upload-btn btn">{{ trans('poster.upload_image') }}</div>
    </div>
    <div class="errors"></div>
    <div class="images-list">
        @forelse($images as $image)
            @include('poster.singleimage')
        @empty
            {{ trans('poster.no_images') }}
        @endforelse
    </div>
</div>

<div class="form-row">
    {{ Form::submit(trans('poster.submit')) }}
</div>
