<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storage of Things</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <div class="nav-links">
                <a href="/" class="nav-link">Главная</a>
                <a href="{{ route('things.index') }}" class="nav-link">Мои вещи</a>
                <a href="/places" class="nav-link">Места хранения</a>
                @auth
                    <a href="/auth/logout" class="nav-link">Выйти</a>
                @endauth
                
                @guest
                    <a href="/auth/signin" class="nav-link">Регистрация</a>
                    <a href="/auth/login" class="nav-link">Вход</a>
                @endguest
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="main-content">
            <h1>Система хранения вещей</h1>
            
            @auth
                <div class="alert alert-success">
                    <p>Вы авторизованы как <strong>{{ auth()->user()->name }}</strong></p>
                </div>
            @else
                <div class="alert alert-warning">
                    <p>Для работы с системой необходимо <a href="/auth/login">войти</a> 
                       или <a href="/auth/signin">зарегистрироваться</a>.</p>
                </div>
            @endauth
            @yield('content')
        </div>
    </main>
</body>
</html>