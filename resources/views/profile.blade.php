@extends('welcome')

@section('title', 'Профиль')


@section('content')
    <style>
        .logout_button {
            width: 40%;
            border: none;
            cursor: pointer;
            padding: 6px;
            margin-top: 12px;
            background: #7F7FD5;
            color: #FFF;
            font-size: 18px;
            font-weight: 800;
            border-radius: 10px;
        }
    </style>
    <section id="carousel_fc23">
        <div class="w-2/5 m-auto p-6 mt-24 rounded-lg shadow-2xl backdrop-blur-lg text-xl"
             style="background-color: rgba(255, 255, 255, 0.2);">
            <p class="text-2xl">
                Здравствуйте, {{ $user->login }}!<br>
            </p>
            <ul>
                <li>ФИО: {{ $user->middle_name }} {{ $user->first_name }} {{ $user->last_name }}</li>
                @php
                    use App\Enums\Roles;
                @endphp
                @if($role === Roles::CLIENT)
                    <li class="mb-2">Вы клиент</li>
                    <li>Электронная почта: {{ $payload->email }}</li>
                    <li>Номер телефона: {{ $payload->phone }}</li>
                @endif
                @if($role === Roles::AGENT)
                    <li>Вы агент</li>
                    <li>Комиссия агента: {{ $payload->deal_share }}</li>
                @endif
                @if($role === Roles::ADMIN)
                    <li>Вы aдминистратор</li>
                @endif
                <a href="{{ route('logout') }}">
                    <button class="logout_button">Выход</button>
                </a>
            </ul>
        </div>
    </section>
@endsection
