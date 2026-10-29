<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Головна') | potuzhnoprint.ua</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --orange: #ff6a00;
            --orange-dark: #e05a00;
            --dark: #1b1e24;
            --dark-2: #262a32;
            --gray: #6b7280;
            --light: #f4f5f7;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Montserrat', Arial, sans-serif; color: var(--dark); background: var(--light); min-height: 100vh; display: flex; flex-direction: column; }
        a { color: inherit; text-decoration: none; }
        .container { width: 100%; max-width: 1200px; margin: 0 auto; padding: 0 20px; }

        .topbar { background: var(--dark); color: #c9ced6; font-size: 13px; }
        .topbar .container { display: flex; justify-content: space-between; padding-top: 8px; padding-bottom: 8px; }
        .topbar b { color: var(--orange); }

        .header { background: #fff; box-shadow: 0 2px 10px rgba(0, 0, 0, .06); }
        .header .container { display: flex; align-items: center; gap: 30px; padding-top: 18px; padding-bottom: 18px; }
        .logo { display: flex; align-items: center; gap: 10px; font-size: 24px; font-weight: 800; }
        .logo span { color: var(--orange); }
        .logo-icon { width: 42px; height: 42px; border-radius: 10px; background: var(--orange); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 22px; }
        .search { flex: 1; display: flex; }
        .search input { flex: 1; padding: 12px 16px; border: 2px solid #e5e7eb; border-right: none; border-radius: 8px 0 0 8px; font: inherit; outline: none; }
        .search input:focus { border-color: var(--orange); }
        .search button { padding: 0 22px; border: none; background: var(--orange); color: #fff; font: inherit; font-weight: 600; border-radius: 0 8px 8px 0; cursor: pointer; }
        .cart { display: flex; align-items: center; gap: 8px; font-weight: 600; }
        .cart-count { background: var(--orange); color: #fff; border-radius: 50%; width: 22px; height: 22px; font-size: 12px; display: flex; align-items: center; justify-content: center; }

        .menu { background: var(--orange); }
        .menu .container { display: flex; flex-wrap: wrap; }
        .menu a { color: #fff; font-weight: 600; padding: 14px 18px; transition: background .2s; }
        .menu a:hover { background: var(--orange-dark); }
        .menu a.catalog { background: var(--dark); }

        main { flex: 1; padding: 40px 0; }

        .hero { background: linear-gradient(120deg, var(--dark) 0%, var(--dark-2) 60%, #3a2a1f 100%); color: #fff; border-radius: 20px; padding: 60px; display: flex; align-items: center; justify-content: space-between; gap: 40px; }
        .hero h1 { font-size: 42px; line-height: 1.15; margin-bottom: 16px; }
        .hero h1 span { color: var(--orange); }
        .hero p { color: #c9ced6; font-size: 17px; line-height: 1.6; max-width: 520px; margin-bottom: 28px; }
        .btn { display: inline-block; padding: 14px 28px; border-radius: 8px; font-weight: 700; transition: .2s; }
        .btn-orange { background: var(--orange); color: #fff; }
        .btn-orange:hover { background: var(--orange-dark); }
        .btn-outline { border: 2px solid #fff; color: #fff; margin-left: 12px; }
        .btn-outline:hover { background: #fff; color: var(--dark); }
        .spool { width: 220px; height: 220px; flex-shrink: 0; border-radius: 50%; background: repeating-radial-gradient(circle, var(--orange) 0 6px, #ff8a3d 6px 12px); border: 18px solid #2f343d; position: relative; box-shadow: 0 20px 50px rgba(0, 0, 0, .4); }
        .spool::after { content: ""; position: absolute; inset: 55px; border-radius: 50%; background: #2f343d; border: 6px solid #444a55; }

        .section-title { font-size: 28px; margin: 50px 0 24px; }
        .section-title span { color: var(--orange); }

        .categories { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; }
        .card { background: #fff; border-radius: 14px; padding: 28px; box-shadow: 0 4px 14px rgba(0, 0, 0, .05); border-bottom: 4px solid transparent; transition: .25s; }
        .card:hover { transform: translateY(-6px); border-bottom-color: var(--orange); box-shadow: 0 12px 24px rgba(0, 0, 0, .1); }
        .card-icon { width: 56px; height: 56px; border-radius: 12px; background: #fff1e6; font-size: 28px; display: flex; align-items: center; justify-content: center; margin-bottom: 16px; }
        .card h3 { margin-bottom: 8px; }
        .card p { color: var(--gray); font-size: 14px; line-height: 1.5; margin-bottom: 14px; }
        .card .price { color: var(--orange); font-weight: 700; }

        .features { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; background: #fff; border-radius: 14px; padding: 30px; }
        .feature { display: flex; gap: 14px; align-items: flex-start; }
        .feature-icon { font-size: 30px; }
        .feature b { display: block; margin-bottom: 4px; }
        .feature p { color: var(--gray); font-size: 14px; }

        .lab-info { margin-top: 40px; padding: 18px 24px; background: #fff; border-left: 5px solid var(--orange); border-radius: 8px; color: var(--gray); font-size: 14px; line-height: 1.6; }

        .page-title { font-size: 34px; margin-bottom: 10px; }
        .page-title span { color: var(--orange); }
        .page-lead { color: var(--gray); font-size: 17px; line-height: 1.6; max-width: 760px; margin-bottom: 30px; }
        .white-box { background: #fff; border-radius: 14px; padding: 30px; box-shadow: 0 4px 14px rgba(0, 0, 0, .05); }

        .chips { display: flex; flex-wrap: wrap; gap: 10px; }
        .chip { background: #fff1e6; color: var(--orange-dark); font-weight: 600; padding: 8px 16px; border-radius: 30px; }

        .steps { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; }
        .step { background: #fff; border-radius: 14px; padding: 24px; }
        .step-num { width: 36px; height: 36px; border-radius: 50%; background: var(--orange); color: #fff; font-weight: 700; display: flex; align-items: center; justify-content: center; margin-bottom: 12px; }
        .step p { color: var(--gray); font-size: 14px; line-height: 1.5; }

        .form-wrap { display: grid; grid-template-columns: 1fr 1.4fr; gap: 30px; align-items: start; }
        .form-info { background: var(--dark); color: #c9ced6; border-radius: 14px; padding: 30px; line-height: 1.7; }
        .form-info h3 { color: #fff; margin-bottom: 12px; }
        .form-info b { color: var(--orange); }
        .form-group { margin-bottom: 18px; }
        .form-group label { display: block; font-weight: 600; margin-bottom: 6px; }
        .form-group input, .form-group select, .form-group textarea { width: 100%; padding: 12px 14px; border: 2px solid #e5e7eb; border-radius: 8px; font: inherit; outline: none; background: #fff; }
        .form-group textarea { min-height: 130px; resize: vertical; }
        .form-group input:focus, .form-group select:focus, .form-group textarea:focus { border-color: var(--orange); }
        .form-group .is-invalid { border-color: #dc2626; }
        .error { color: #dc2626; font-size: 13px; margin-top: 6px; }
        button.btn { border: none; font: inherit; font-weight: 700; cursor: pointer; }

        .confirm { max-width: 700px; margin: 0 auto; text-align: center; }
        .confirm-icon { width: 80px; height: 80px; border-radius: 50%; background: #e8f8ee; color: #16a34a; font-size: 40px; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; }
        .confirm table { width: 100%; border-collapse: collapse; margin: 24px 0; text-align: left; }
        .confirm td { padding: 12px 14px; border-bottom: 1px solid #eee; vertical-align: top; }
        .confirm td:first-child { font-weight: 600; width: 35%; color: var(--gray); }
        .toolbar { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px; margin-bottom: 20px; }
        .toolbar .page-title { margin-bottom: 0; }
        .data-table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 14px; overflow: hidden; box-shadow: 0 4px 14px rgba(0, 0, 0, .05); }
        .data-table th { background: var(--dark); color: #fff; text-align: left; padding: 12px 14px; font-size: 14px; }
        .data-table td { padding: 12px 14px; border-bottom: 1px solid #eee; font-size: 14px; vertical-align: middle; }
        .data-table tr:hover td { background: #fff7f0; }
        .data-table td a:not(.btn) { color: var(--orange-dark); font-weight: 600; }
        .btn-sm { padding: 8px 14px; font-size: 13px; }
        .btn-light { background: #fff; color: var(--orange-dark); border: 2px solid var(--orange); }
        .btn-danger { background: #dc2626; color: #fff; }
        .btn-danger:hover { background: #b91c1c; }
        .actions { display: flex; gap: 8px; flex-wrap: wrap; align-items: center; margin-top: 16px; }
        .data-table .actions { margin-top: 0; }
        .filter { display: flex; gap: 10px; align-items: center; flex-wrap: wrap; margin-bottom: 20px; }
        .filter select { padding: 9px 12px; border: 2px solid #e5e7eb; border-radius: 8px; font: inherit; background: #fff; }
        .alert-success { background: #e8f8ee; color: #166534; padding: 12px 16px; border-radius: 8px; margin-bottom: 20px; }
        .details p { margin-bottom: 10px; line-height: 1.6; }
        .pagination { display: flex; gap: 6px; list-style: none; margin-top: 20px; flex-wrap: wrap; }
        .pagination a, .pagination span { display: block; padding: 8px 14px; border-radius: 8px; background: #fff; border: 1px solid #e5e7eb; }
        .pagination .active span { background: var(--orange); color: #fff; border-color: var(--orange); }
        .pagination .disabled span { color: #aaa; }
        .footer { background: var(--dark); color: #aab1bc; padding-top: 50px; }
        .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1.3fr; gap: 40px; padding-bottom: 40px; }
        .footer .logo { color: #fff; margin-bottom: 16px; }
        .footer h4 { color: #fff; font-size: 16px; margin-bottom: 16px; }
        .footer ul { list-style: none; }
        .footer li { margin-bottom: 10px; font-size: 14px; }
        .footer a:hover { color: var(--orange); }
        .footer p { font-size: 14px; line-height: 1.6; }
        .footer-bottom { border-top: 1px solid #2f343d; padding: 18px 0; font-size: 13px; }
        .footer-bottom .container { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 10px; }

        @@media (max-width: 900px) {
            .topbar .container { flex-direction: column; gap: 4px; text-align: center; }
            .header .container { flex-wrap: wrap; }
            .search { order: 3; flex-basis: 100%; }
            .hero { flex-direction: column; padding: 36px; text-align: center; }
            .hero h1 { font-size: 30px; }
            .footer-grid { grid-template-columns: 1fr 1fr; }
            .form-wrap { grid-template-columns: 1fr; }
        }
        @@media (max-width: 560px) {
            .footer-grid { grid-template-columns: 1fr; }
            .btn-outline { margin: 12px 0 0; }
        }
    </style>
</head>
<body>
    <div class="topbar">
        <div class="container">
            <div>Доставка по всій Україні · <b>Безкоштовно від 3000 грн</b></div>
            <div>Пн–Пт 9:00–18:00 · +380 (44) 000-00-00</div>
        </div>
    </div>

    <header class="header">
        <div class="container">
            <a href="{{ route('home') }}" class="logo">
                <div class="logo-icon">P</div>
                <div>potuzhno<span>print</span>.ua</div>
            </a>
            <form class="search">
                <input type="text" placeholder="Пошук принтерів, філаменту, смол...">
                <button type="button">Знайти</button>
            </form>
            <a href="#" class="cart">🛒 Кошик <span class="cart-count">0</span></a>
        </div>
    </header>

    <nav class="menu">
        <div class="container">
            <a href="{{ route('home') }}" class="catalog">☰ Головна</a>
             @foreach (\App\Enums\CategoryEnum::cases() as $item)
            <a href="{{ route('catalog', $item->value) }}">{{ $item->title() }}</a>
            @endforeach
            <a href="{{ route('print.form') }}">Друк на замовлення</a>
            <a href="{{ route('printers.index') }}">Склад</a>
            <a href="{{ route('country.index') }}">Країни</a>
            <a href="{{ route('stats.pages') }}">Статистика</a>
            <a href="{{ route('site.about') }}">Про магазин</a>
            <a href="{{ route('site.contact') }}">Контакти</a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container footer-grid">
            <div>
                <a href="{{ route('home') }}" class="logo">
                    <div class="logo-icon">P</div>
                    <div>potuzhno<span>print</span>.ua</div>
                </a>
                <p>Інтернет-магазин 3D-принтерів та витратних матеріалів. Допомагаємо втілювати ідеї в реальні моделі.</p>
            </div>
            <div>
                <h4>Каталог</h4>
                <ul>
                    @foreach (\App\Enums\CategoryEnum::cases() as $item)
                    <li><a href="{{ route('catalog', $item->value) }}">{{ $item->title() }}</a></li>
                    @endforeach
                    <li><a href="{{ route('print.form') }}">Друк на замовлення</a></li>
                </ul>
            </div>
            <div>
                <h4>Покупцям</h4>
                <ul>
                    <li><a href="{{ route('site.about') }}">Про магазин</a></li>
                    <li><a href="#">Оплата і доставка</a></li>
                    <li><a href="#">Обмін та повернення</a></li>
                    <li><a href="{{ route('site.contact') }}">Контакти</a></li>
                </ul>
            </div>
            <div>
                <h4>Контакти</h4>
                <ul>
                    <li>📞 +380 (44) 000-00-00</li>
                    <li>✉️ info@potuzhnoprint.ua</li>
                    <li>📍 м. Київ</li>
                    <li>🕘 Пн–Пт 9:00–18:00</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <span>&copy; {{ date('Y') }} potuzhnoprint.ua. Усі права захищено.</span>
                <span>КПІ ім. Ігоря Сікорського · Фурса Д. В., РС-31</span>
            </div>
        </div>
    </footer>
</body>
</html>