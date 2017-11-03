<div class="images-wrapper wrapper">
    <div class="images-frame">
        @foreach ($details['images'] as $key => $image)
            <img data-nb="{{ $key +1 }}" {{-- Starting at 1 instead of 0. Easier to map with levels --}}
                {!! posterDetailSrcsets($image->filepath) !!}
                alt="{!! trans('poster.poster_by', ['author' => $details['author']]) !!}"
                class="poster-img loading {{ ($key == 0) ? 'current' : '' }}">
        @endforeach
    </div>
</div>
<div class="infos-wrapper">
    <div class="upper-infos">
        <div class="selection-name">
            "{{ $selection->title or trans('poster.random_poster_title') }}"
        </div>
        @if(isset($selection))
            <span class="colorized">{{ $current }}</span> / {{ $count }}
        @endif
    </div>
    <div class="search-infos">
        {{-- TODO Remplacer par le type d'oeuvre et ajouter l'icône --}}
        <div class="main">{{ trans('selection.searching_for') }} <span class="colorized">XXX</span></div>
        <div class="hints {{ ($details['images']->count() == 1) ? 'hidden' : '' }}">
            <div class="colorized switch-level minus hidden"><span>{{ trans('selection.too_easy') }}</span></div>
            <div class="colorized switch-level plus"><span>{{ trans('selection.too_hard') }}</span></div>
        </div>
    </div>
    <div class="solution invisible">
        <div class="title current-version">
            {{ trans('selection.it_was') }} <span class="colorized">
                {{ $poster->oeuvre->getTitleAttribute() }}
            </span>
        </div>
        <div class="title original-version">
            {{ trans('selection.original') }} : {{ $poster->oeuvre->title_ov }} - <span class="year">{{  $poster->oeuvre->year }}</span>
        </div>

    </div>
    <div class="controls">
        <div data-id="{{ $idPrev or '' }}" data-selection="{{ $idSelection or '' }}" class="previous switch-poster">{!! trans('poster.prev_button') !!}</div>
        <div class="show-solution"><span>{!! trans('poster.show-solution') !!}</span></div>
        <div data-id="{{ $idNext or '' }}" data-selection="{{ $idSelection or '' }}" class="next switch-poster">{!! trans('poster.next_button') !!}</div>
    </div>
</div>
