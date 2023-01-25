@extends('layouts.app')

@section('title', 'Добавление игры')

@section('content')
    <form action="{{ route('boardgames.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('boardgames.partials.form')
        <div><input type="submit" value="Добавить" class="btn btn-primary mt-3 col-12"></div>
    </form>
@endsection
