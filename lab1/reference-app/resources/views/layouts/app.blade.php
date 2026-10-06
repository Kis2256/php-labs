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
            <a href="{{ url('/') }}" class="logo">
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
            <a href="{{ url('/') }}" class="catalog">☰ Головна</a>
            <a href="{{ url('/printers') }}">3D-принтери</a>
            <a href="{{ url('/filament') }}">Філамент</a>
            <a href="{{ url('/resin') }}">Смоли</a>
            <a href="{{ url('/parts') }}">Запчастини</a>
            <a href="{{ url('/about') }}">Про магазин</a>
            <a href="{{ url('/contact') }}">Контакти</a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="container footer-grid">
            <div>
                <a href="{{ url('/') }}" class="logo">
                    <div class="logo-icon">P</div>
                    <div>potuzhno<span>print</span>.ua</div>
                </a>
                <p>Інтернет-магазин 3D-принтерів та витратних матеріалів. Допомагаємо втілювати ідеї в реальні моделі.</p>
            </div>
            <div>
                <h4>Каталог</h4>
                <ul>
                    <li><a href="{{ url('/printers') }}">3D-принтери</a></li>
                    <li><a href="{{ url('/filament') }}">Філамент</a></li>
                    <li><a href="{{ url('/resin') }}">Смоли</a></li>
                    <li><a href="{{ url('/parts') }}">Запчастини</a></li>
                </ul>
            </div>
            <div>
                <h4>Покупцям</h4>
                <ul>
                    <li><a href="{{ url('/about') }}">Про магазин</a></li>
                    <li><a href="#">Оплата і доставка</a></li>
                    <li><a href="#">Обмін та повернення</a></li>
                    <li><a href="{{ url('/contact') }}">Контакти</a></li>
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