@extends('layouts.app')

@section('title', 'Про магазин')

@section('content')
    <div class="container">
        <h1 class="page-title">Про <span>магазин</span></h1>
        <p class="page-lead">potuzhnoprint.ua — інтернет-магазин 3D-принтерів, філаменту, фотополімерних смол та запчастин. Допомагаємо обрати обладнання, підібрати матеріали та надрукувати деталі на замовлення.</p>

        <div class="features">
            <div class="feature">
                <div class="feature-icon">🖨️</div>
                <div><b>Обладнання</b><p>FDM та SLA-принтери для дому й виробництва</p></div>
            </div>
            <div class="feature">
                <div class="feature-icon">🧵</div>
                <div><b>Матеріали</b><p>Філамент і смоли різних типів та кольорів</p></div>
            </div>
            <div class="feature">
                <div class="feature-icon">🧩</div>
                <div><b>Друк на замовлення</b><p>Деталі за вашою моделлю</p></div>
            </div>
        </div>

        <div class="lab-info">
            Навчальний веб-застосунок створено під час виконання лабораторних робіт.<br>
            Тема ДКР: реляційна база даних магазину 3D-принтерів та витратних матеріалів.
        </div>
    </div>
@endsection