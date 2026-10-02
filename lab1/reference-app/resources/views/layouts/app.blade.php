<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Магазин 3D-принтерів')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; }
        nav { background: #222; padding: 12px 20px; }
        nav a { color: #db5f06; text-decoration: none; margin-right: 20px; }
        nav a:hover { color: #ff7a1a; }
        main { padding: 20px; min-height: 300px; }
        footer { background: #222; color: #db5f06; padding: 15px 20px; text-align: center; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ url('/') }}">Головна</a>
        <a href="{{ url('/printers') }}">3D-принтери</a>
        <a href="{{ url('/materials') }}">Витратні матеріали</a>
        <a href="{{ url('/about') }}">Про магазин</a>
        <a href="{{ url('/contact') }}">Контакти</a>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        Магазин 3D-принтерів та витратних матеріалів<br>
        &copy; {{ date('Y') }} КПІ ім. Ігоря Сікорського
    </footer>
</body>
</html>