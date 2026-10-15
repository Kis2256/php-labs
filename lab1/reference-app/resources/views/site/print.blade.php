@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="container">
        <section class="hero">
            <div>
                <h1>{{ $title }} <span>на 3D-принтері</span></h1>
                <p>Надрукуємо деталь, прототип чи сувенір за вашою моделлю. Підберемо матеріал, розрахуємо вартість і відправимо готовий виріб по всій Україні.</p>
                <a href="#order" class="btn btn-orange">Залишити заявку</a>
            </div>
            <div class="spool"></div>
        </section>

        <h2 class="section-title">Що ми <span>друкуємо</span></h2>
        <div class="categories">
            @foreach ($services as $service)
                <div class="card">
                    <div class="card-icon">{{ $service['icon'] }}</div>
                    <h3>{{ $service['name'] }}</h3>
                    <p>{{ $service['text'] }}</p>
                    <div class="price">{{ $service['price'] }}</div>
                </div>
            @endforeach
        </div>

        <h2 class="section-title">Матеріали <span>для друку</span></h2>
        <div class="chips">
            @foreach ($materials as $material)
                <span class="chip">{{ $material }}</span>
            @endforeach
        </div>

        <h2 class="section-title">Як це <span>працює</span></h2>
        <div class="steps">
            <div class="step"><div class="step-num">1</div><b>Заявка</b><p>Заповніть форму та опишіть, що потрібно надрукувати.</p></div>
            <div class="step"><div class="step-num">2</div><b>Розрахунок</b><p>Менеджер уточнить деталі та назве вартість і терміни.</p></div>
            <div class="step"><div class="step-num">3</div><b>Друк</b><p>Друкуємо виріб і перевіряємо якість.</p></div>
            <div class="step"><div class="step-num">4</div><b>Доставка</b><p>Відправляємо Новою поштою або видаємо самовивозом.</p></div>
        </div>

        <h2 class="section-title" id="order">Залишити <span>заявку</span></h2>
        <div class="form-wrap">
            <div class="form-info">
                <h3>Зворотний зв'язок</h3>
                <p>Опишіть деталь, розміри, бажаний матеріал і кількість. Ми відповімо на вказаний email протягом <b>одного робочого дня</b>.</p>
                <p style="margin-top: 14px;">Поля, позначені <b>*</b>, обов'язкові.</p>
            </div>

            <div class="white-box">
                <form method="POST" action="{{ route('print.store') }}">
                    @csrf

                    <div class="form-group">
                        <label for="name">Ім'я *</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="@error('name') is-invalid @enderror">
                        @error('name')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="text" id="email" name="email" value="{{ old('email') }}" class="@error('email') is-invalid @enderror">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="topic">Тема звернення *</label>
                        <select id="topic" name="topic" class="@error('topic') is-invalid @enderror">
                            <option value="">— оберіть тему —</option>
                            @foreach ($topics as $topic)
                         <option value="{{ $topic->value }}" @selected(old('topic') === $topic->value)>{{ $topic->label() }}</option>
                            @endforeach
                        </select>
                        @error('topic')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="message">Повідомлення *</label>
                        <textarea id="message" name="message" class="@error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                        @error('message')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-orange">Надіслати заявку</button>
                </form>
            </div>
        </div>
    </div>
@endsection