@foreach($selections as $selection)
    <div class="selection-item">
        <span class="icon"></span>{{-- TODO Remplacer par la fonctionnalité de favoris --}}
        <h2 class="selection-title">{{ $selection->title }}</h2>
        <span class="auteur">{!! trans('selection.by') !!} {{ $selection->user->name }}</span>
        <span class="nb-posters">{{ $selection->posters->count() }} {!! trans_choice('selection.number_posters', $selection->posters->count()) !!}</span>
        <span class="note">{{ $selection->averageRating() }}</span>{{-- TODO Que faire si null? --}}

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