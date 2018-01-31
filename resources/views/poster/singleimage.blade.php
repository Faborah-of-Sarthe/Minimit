<div data-id="{{ $image->id }}" class="image">
    <img src="{{ $image->getThumbnailPath }}" alt="">
    <div class="delete">{{ trans('poster.delete_image') }}</div>
</div>