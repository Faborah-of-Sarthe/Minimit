<div class="poster" data-id="{{ $poster->id }}">
    <input type="hidden" name="poster[]" value="{{ $poster->id }}">
    <div class="col"><img src="{{ $poster->getThumbnail() }}" alt="{{ $poster->title }}"></div>
    <div class="col">{{ $poster->oeuvre->title }}</div>
    <div class="col">{{ $poster->user->name }}</div>
    <div class="col"><div class="btn delete">delete</div></div>
</div>