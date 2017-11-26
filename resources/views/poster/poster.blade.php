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
            <div class="count">
                <span class="colorized">{{ $current }}</span>/<span>{{ $count }}</span>
            </div>
        @endif
    </div>
    <div class="search-infos">
        {{-- TODO Remplacer par le type d'oeuvre et ajouter l'icône --}}
        <div class="main">{{ trans('selection.searching_for') }} <span class="colorized">XXX</span></div>
        <div class="hints {{ ($details['images']->count() == 1) ? 'hidden' : '' }}">
            <div class="colorized-bg switch-level minus hidden"><span>{{ trans('selection.too_easy') }}</span></div>
            <div class="colorized-bg switch-level plus"><span>{{ trans('selection.too_hard') }}</span></div>
        </div>
    </div>
    <div class="solution-wrapper not-visible">
        <div class="title current-version">
            {{ trans('selection.it_was') }} <span class="colorized">
                {{ $poster->oeuvre->getTitleAttribute() }}
            </span>
        </div>
        <div class="title original-version">
            {{ trans('selection.original') }} : {{ $poster->oeuvre->title_ov }} - <span class="year">{{  $poster->oeuvre->year }}</span>
        </div>
        <div class="action-wrapper">
            <div class="close-solution btn">
                <span>{!! trans('poster.close-solution') !!}</span>
            </div>
        </div>
    </div>
    <div class="controls">
        <div class="action-placeholder">
            <div data-id="{{ $idPrev or '' }}" data-selection="{{ $idSelection or '' }}" class="previous switch-poster btn colorized">{!! trans('poster.prev_button') !!}</div>
        </div>
        <div class="action-placeholder">
            <div class="show-solution btn">
                <span>{!! trans('poster.show-solution') !!}</span>
            </div>
        </div>
        <div class="action-placeholder">
            <div data-id="{{ $idNext or '' }}" data-selection="{{ $idSelection or '' }}"
                 class="next switch-poster colorized btn">{!! trans('poster.next_button') !!}</div>
        </div>
    </div>
</div>
