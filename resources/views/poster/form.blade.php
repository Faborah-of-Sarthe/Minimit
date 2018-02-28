{!! Form::hidden('image_ids', null, ['class' => 'images-hidden image-ids']) !!}
<div class="form-row">
     @include('poster.elements.autocomplete')
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
            {{ Form::submit(trans('poster.upload_image'), ['class' => 'upload-btn btn']) }}
        </div>
    {!! Form::close() !!}
    <div class="errors"></div>
    <div class="images-list">
        <div class="no-images @if($images) hidden @endif">
                {{ trans('poster.no_images') }}
        </div>
        <div class="container">
            @foreach($images as $image)
                @include('poster.elements.singleimage')
            @endforeach
        </div>

    </div>
</div>
<div class="form-errors errors"></div>
<div class="form-row">
    {{ Form::submit(trans('poster.submit'), ['class' => 'submit-poster btn']) }}
</div>
<script>
    var formErrors = {
        emptyOeuvre: "{{ trans('poster.empty_oeuvre_error')}}",
        emptyPosters: "{{ trans('poster.empty_posters_error')}}"
    }
</script>