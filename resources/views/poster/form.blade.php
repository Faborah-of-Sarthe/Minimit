<div class="form-row">
    {!! Form::label('oeuvre_title', trans('poster.oeuvre')) !!}
    {!! Form::hidden('oeuvre_id', null, ['class' => 'autofill-hidden', 'autocomplete' => 'off']) !!}
    {!! Form::hidden('image_ids', null, ['class' => 'images-hidden image-ids']) !!}
    {!! Form::text('oeuvre_title', null, ['class' => 'autocomplete-field autofill oeuvre-title', 'data-url' => route('oeuvre.search'), 'autocomplete' => 'off']) !!}
    <div class="autocomplete-results hidden"></div>
</div>
{!! Form::close() !!}
<div class="images form-row">
    {!! Form::open(['route' => 'image.store', 'method' => 'POST', 'files' => true, 'class' => 'form-poster']) !!}
        <div class="upload">
            <label for="image">
                {{ trans('poster.add_image') }}
                {!! Form::hidden('poster_id', $poster, ['class' => 'poster-hidden']) !!}
                {!! Form::file('image', ['class' => 'input-file', 'data-href' => route('image.store')]) !!}
            </label>
            {{ Form::submit(trans('poster.upload_imag'), ['class' => 'upload-btn btn']) }}
        </div>
    {!! Form::close() !!}
    <div class="errors"></div>
    <div class="images-list">
        <div class="no-images @if($images) hidden @endif">
                {{ trans('poster.no_images') }}
        </div>
        <div class="container">
            @foreach($images as $image)
                @include('poster.singleimage')
            @endforeach
        </div>

    </div>
</div>

<div class="form-row">
    {{ Form::submit(trans('poster.submit')) }}
</div>
