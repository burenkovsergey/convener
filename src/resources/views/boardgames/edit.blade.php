@extends('layouts.app')

@section('title', 'Изменение игры')

@section('content')
    <form action="{{ route('boardgames.update', ['boardgame' => $boardgame->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('boardgames.partials.form')
        <div><input type="submit" value="Готово" class="btn btn-primary mt-3 col-12"></div>
    </form>
@endsection
