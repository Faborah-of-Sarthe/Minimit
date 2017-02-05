<div class="image_wrapper">
    @foreach ($details['images'] as $key => $image)
        <img {!! posterDetailSrcsets($image->filepath) !!} alt="{!! trans('poster.poster_by', ['author' => $details['author']]) !!}" @if ($key != 0) style="display:none;" @endif >
    @endforeach
</div>
<div class="controls">
    <div class="previous">{!! trans('poster.prev_button') !!}</div>
    <div class="next">{!! trans('poster.next_button') !!}</div>
</div>
<div class="hints" @if ($details['images']->count() == 1) style="display:none;" @endif>
    <div class="minus" style="display:none;"><span>-</span></div>
    <div class="plus"><span>+</span></div>
</div>
