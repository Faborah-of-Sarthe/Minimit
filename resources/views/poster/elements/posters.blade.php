@forelse ($posters as $poster)
    <div class="poster" data-id="{{ $poster->id }}">
        <a href="{{ route('poster.edit', $poster->id) }}">
            <img src="{{ $poster->getThumbnail() }}" alt="">
        </a>
        {!! Form::open(['route' => ['poster.destroy', $poster->id], 'method' => 'DELETE', 'class' => 'delete-poster id-'.$poster->id]) !!}
        <div class="delete  needs-confirm"  data-text="{{ trans('poster.delete_poster_confirmation_message') }}" data-id="{{ $poster->id }}">{{ trans('poster.poster_delete') }}</div>
        {!! Form::close() !!}
    </div>
@empty
    {{ trans('poster.list_empty') }}
@endforelse
{!!  $posters->appends(Illuminate\Support\Facades\Input::except('page'))->links() !!}