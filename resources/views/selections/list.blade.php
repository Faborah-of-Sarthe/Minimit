@foreach($selections as $selection)
    <div class="selection-item">
        <div class="fav icon" data-status="{{ $selection->isFavOfUser(Auth::user()) ? 'is-faved' : 'not-faved' }}" data-id="{{ $selection->id }}">
            <span class="label">{!! trans('selection.fav_me') !!}</span>
        </div>{{-- TODO Ajout possibilité de mettre en favori --}}
        <h2 class="selection-title">{{ $selection->title }}</h2>
        <span class="auteur">{!! trans('selection.by') !!} {{ $selection->user->name }}</span>
        <span class="nb-posters">{{ $selection->posters->count() }} {!! trans_choice('selection.number_posters', $selection->posters->count()) !!}</span>
        <span class="note" data-rating="{{ $selection->averageRating() }}">{{ $selection->averageRating() }}</span>

        <a class="play-selection btn" href="{{ route('selection.show', $selection) }}">
            <span>{!! trans('selection.play') !!}</span>
        </a>

        <div class="tags">
            @foreach($selection->tags as $tag)
                <span class="tag">{{ $tag->title }}</span>
            @endforeach
        </div>
    </div>
@endforeach

{{ $selections->links() }}