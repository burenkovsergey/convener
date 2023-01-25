@extends('layouts.app')
@section('title', 'Аутентификация пользователя')
@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
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
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    name="remember"
                    value="{{ old('remember') ? 'checked' : '' }}"
                />
                <label class="form-check-label" for="remember">Запомнить</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-3 col-12">Войти</button>
    </form>
@endsection
