@forelse ($posters as $poster)
    <div class="poster" data-id="{{ $poster->id }}" data-url="{{ route('poster.selected', $poster->id) }}">
        <img src="{{ $poster->getThumbnail() }}" alt="">
        <div class="author">{{ $poster->user->name }}</div>
    </div>
@empty
    {{ trans('poster.list_empty') }}
@endforelse
{!!  $posters->appends(Illuminate\Support\Facades\Input::except('page'))->links() !!}