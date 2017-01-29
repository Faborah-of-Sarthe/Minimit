<div class="autocomplete-results-content">
    <ul>
        @foreach ($results as $oeuvre)
            <li class="result" data-id="{{ $oeuvre['id'] }}">
                <div class="main-title">
                    <span class="title">{!! $oeuvre['mainTitle'] !!}</span> <span class="year">({{ $oeuvre['year'] }})</span>
                </div>
                <div class="secondary-title">
                    <span class="label">{!! $oeuvre['secondaryTitleLabel'] !!}</span> <span class="secondary-title">{!! $oeuvre['secondaryTitle'] !!}</span>
                </div>
            </li>
        @endforeach
    </ul>
</div>
