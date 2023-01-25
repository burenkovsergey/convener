@extends('layouts.app')
@section('title', 'Регистрация пользователя')
@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Логин</label>
            <input
                name="name"
                value="{{ old('name') }}"
                id="name"
                required
                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
            />

            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input
                name="email"
                value="{{ old('email') }}"
                id="email"
                required
                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
            />

            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input
                name="password"
                id="password"
                type="password"
                required
                class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
            />

            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group">
            <label for="password_confirmation">Подтвержденный пароль</label>
            <input
                name="password_confirmation"
                id="password_confirmation"
                type="password"
                required
                class="form-control"
            />
        </div>

        <button type="submit" class="btn btn-primary mt-3 col-12">Зарегистрироваться</button>
    </form>
@endsection
