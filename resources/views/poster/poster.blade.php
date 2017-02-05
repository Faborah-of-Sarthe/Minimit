<div class="image_wrapper wrapper">
    @foreach ($details['images'] as $key => $image)
        <img data-nb="{{ $key +1 }}" {{-- Starting at 1 instead of 0. Easier to map with levels --}}
            {!! posterDetailSrcsets($image->filepath) !!}
            alt="{!! trans('poster.poster_by', ['author' => $details['author']]) !!}"
            class="poster-img @if ($key != 0) hidden @endif" >
    @endforeach
</div>
<div class="controls">
    <div class="previous">{!! trans('poster.prev_button') !!}</div>
    <div class="next">{!! trans('poster.next_button') !!}</div>
</div>
<div class="hints @if ($details['images']->count() == 1)hidden @endif">
    <div class="minus hidden"><span>-</span></div>
    <div class="plus"><span>+</span></div>
</div>
