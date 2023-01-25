@extends('layouts.app')

@section('title', 'Настольные игры')

@section('content')
    <a class="btn btn-primary" href="{{ route('boardgames.create') }}">Добавить игру</a>
    <div class="container row card-deck">
        @foreach($boardgames as $boardgame)
            @include('boardgames.partials.boardgame', ['boardgame' => $boardgame])
        @endforeach
    </div>
@endsection
