@if (Auth::id() != $micropost->user_id)
    @if (Auth::user()->is_favorite($micropost->user_id))
        {{-- お気に入り解除ボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.unfavorite', $micropost->user_id], 'method' => 'delete']) !!}
            {!! Form::submit('Unfavorite', ['class' => 'btn btn-danger btn-sm']) !!}
        {!! Form::close() !!}
    @else
        {{-- お気に入りボタンのフォーム --}}
        {!! Form::open(['route' => ['favorites.favorite', $micropost->user_id]]) !!}
            {!! Form::submit('Favorite', ['class' => "btn btn-primary btn-sm"]) !!}
        {!! Form::close() !!}
    @endif
@endif