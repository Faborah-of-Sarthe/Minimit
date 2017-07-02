<div class="images-wrapper wrapper">
    <div class="images-frame">
        @foreach ($details['images'] as $key => $image)
            <img data-nb="{{ $key +1 }}" {{-- Starting at 1 instead of 0. Easier to map with levels --}}
                {!! posterDetailSrcsets($image->filepath) !!}
                alt="{!! trans('poster.poster_by', ['author' => $details['author']]) !!}"
                class="poster-img loading {{ ($key == 0) ? 'current' : '' }}">
        @endforeach
        <div class="solution invisible">
            <span class="title current-version">{{ $poster->oeuvre->title_ov }}</span>
            <span class="title original-version">{{ $poster->oeuvre->getTitleAttribute() }}</span>
            <span class="year">{{  $poster->oeuvre->year }}</span>
        </div>
    </div>
</div>
<div class="controls">
    <div data-id="{{ $idPrev or '' }}" data-selection="{{ $idSelection or '' }}" class="previous switch-poster">{!! trans('poster.prev_button') !!}</div>
    <div data-id="{{ $idNext or '' }}" data-selection="{{ $idSelection or '' }}" class="next switch-poster">{!! trans('poster.next_button') !!}</div>
</div>
<div class="hints {{ ($details['images']->count() == 1) ? 'hidden' : '' }}">
    <div class="switch-level minus hidden"><span>-</span></div>
    <div class="switch-level plus"><span>+</span></div>
</div>
<div class="show-solution"><span>{!! trans('poster.show-solution') !!}</span></div>
