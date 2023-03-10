<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <title>Созыватор - @yield('title')</title>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm mb-3">
        <h5 class="my-0 me-md-auto font-weight-normal">Созыватор</h5>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ route('laravel-doc') }}">Документация Laravel</a>
            <a href="{{ route('boardgames.index') }}">Настольные игры</a>
            @guest
                @if (Route::has('register'))
                    <a class="p-2 text-dark" href="{{ route('register') }}">Зарегистрироваться</a>
                @endif
                <a class="p-2 text-dark" href="{{ route('login') }}">Войти</a>
            @else
                <a
                    class="p-2 text-dark"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit()"
                >
                    Выйти
                </a>
                <form id="logout-form" action="{{ 'logout' }}" method="POST" style="display: none">
                    @csrf
                </form>
            @endguest
        </nav>
    </div>
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>
