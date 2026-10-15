@extends('layouts.app')

@section('title', 'Головна')

@section('content')
    <div class="container">
        <section class="hero">
            <div>
                <h1>Усе для <span>3D-друку</span> в одному місці</h1>
                <p>3D-принтери, філамент, фотополімерні смоли та запчастини з доставкою по всій Україні.</p>
                <a href="{{ route('catalog', \App\Enums\CategoryEnum::Printers->value) }}" class="btn btn-orange">Перейти до каталогу</a>
                <a href="{{ route('catalog', \App\Enums\CategoryEnum::Filament->value) }}" class="btn btn-outline">Філамент</a>
            </div>
            <div class="spool"></div>
        </section>

        <h2 class="section-title">Популярні <span>категорії</span></h2>
        <div class="categories">
            @foreach (\App\Enums\CategoryEnum::cases() as $item)
                <a href="{{ route('catalog', $item->value) }}" class="card">
                    <div class="card-icon">{{ $item->icon() }}</div>
                    <h3>{{ $item->title() }}</h3>
                    <p>{{ $item->description() }}</p>
                    <div class="price">{{ $item->price() }}</div>
                </a>
            @endforeach
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
        </div>
    </div>
@endsection