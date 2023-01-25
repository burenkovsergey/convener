@extends('layouts.app')

@section('title', $boardgame->name)

@section('content')


    <div class="container row">
        <img class="col-4" src="{{ $boardgame->getCoverUrl() }}" />

        <div class="col-8">
            <h1>{{ $boardgame->name }}</h1>
            <p>{{ $boardgame->description }}</p>
            <p>От {{ $boardgame->min_players_count }} до {{ $boardgame->max_players_count }} игроков.</p>
        </div>
    </div>

    <form class="d-inline" method="POST" action="{{ route('boardgames.destroy', ['boardgame' => $boardgame->id]) }}">
        @csrf
        @method('DELETE')
        <div class="container row mt-3">
            <a class="btn btn-primary col-6" href="{{ route('boardgames.edit', ['boardgame' => $boardgame->id]) }}">Изменить</a>
            <input type="submit" value="Удалить" class="btn btn-danger col-6">
        </div>
    </form>
@endsection
