@extends('layouts.app')

@section('title', 'Головна')

@section('content')
    <div class="container">
        <section class="hero">
            <div>
                <h1>Усе для <span>3D-друку</span> в одному місці</h1>
                <p>3D-принтери, філамент, фотополімерні смоли та запчастини з доставкою по всій Україні.</p>
                <a href="{{ route('catalog', 'printers') }}" class="btn btn-orange">Перейти до каталогу</a>
                <a href="{{ route('catalog', 'filament') }}" class="btn btn-outline">Філамент</a>
            </div>
            <div class="spool"></div>
        </section>

        <h2 class="section-title">Популярні <span>категорії</span></h2>
        <div class="categories">
            <a href="{{ route('catalog', 'printers') }}" class="card">
                <div class="card-icon">🖨️</div>
                <h3>3D-принтери</h3>
                <p>FDM та SLA-принтери для дому, навчання й виробництва.</p>
                <div class="price">від 7 999 грн</div>
            </a>
            <a href="{{ route('catalog', 'filament') }}" class="card">
                <div class="card-icon">🧵</div>
                <h3>Філамент</h3>
                <p>PLA, PETG, ABS, TPU та інженерні пластики різних кольорів.</p>
                <div class="price">від 450 грн</div>
            </a>
            <a href="{{ route('catalog', 'resin') }}" class="card">
                <div class="card-icon">🧪</div>
                <h3>Смоли</h3>
                <p>Фотополімерні смоли для деталізованого друку.</p>
                <div class="price">від 890 грн</div>
            </a>
            <a href="{{ route('catalog', 'parts') }}" class="card">
                <div class="card-icon">⚙️</div>
                <h3>Запчастини</h3>
                <p>Сопла, столи, хотенди, ремені та інші комплектуючі.</p>
                <div class="price">від 99 грн</div>
            </a>
        </div>

        <h2 class="section-title">Чому <span>обирають нас</span></h2>
        <div class="features">
            <div class="feature">
                <div class="feature-icon">🚚</div>
                <div><b>Швидка доставка</b><p>Відправка в день замовлення</p></div>
            </div>
            <div class="feature">
                <div class="feature-icon">🛡️</div>
                <div><b>Гарантія 12 місяців</b><p>На всі 3D-принтери</p></div>
            </div>
            <div class="feature">
                <div class="feature-icon">💬</div>
                <div><b>Консультація</b><p>Допоможемо обрати принтер</p></div>
            </div>
            <div class="feature">
                <div class="feature-icon">🏷️</div>
                <div><b>Знижки</b><p>Для постійних клієнтів</p></div>
            </div>
        </div>
        <section class="hero" style="margin-top: 50px; padding: 40px 50px;">
            <div>
                <h2 style="font-size: 30px; margin-bottom: 10px;">Потрібна деталь? <span style="color: var(--orange);">Надрукуємо!</span></h2>
                <p style="margin-bottom: 0;">Друк на замовлення з PLA, PETG, ABS, TPU та смоли за вашою моделлю або кресленням.</p>
            </div>
            <a href="{{ route('print.form') }}" class="btn btn-orange">Залишити заявку</a>
        </section>
        <div class="lab-info">
            Лабораторні роботи з Laravel · Тема ДКР: реляційна база даних магазину 3D-принтерів та витратних матеріалів.<br>
            Виконав: Фурса Данило Валерійович, група РС-31.