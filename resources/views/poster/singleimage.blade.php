<div data-id="{{ $image->id }}" class="image">
    <img src="{{ url($image->getThumbnailPath()) }}" alt="">
    {!! Form::open(['route' => ['image.destroy', $image->id], 'method' => 'DELETE', 'class' => 'delete-image id-'.$image->id]) !!}
        <div class="delete  needs-confirm"  data-text="{{ trans('poster.delete_image_confirmation_message') }}" data-id="{{ $image->id }}">{{ trans('poster.delete_image') }}</div>
    {!! Form::close() !!}
</div>