<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Авторизация</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style_login.css') }}">
    <link rel="icon" href="{{ asset('logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/Login.css') }}" media="screen">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"/>


    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>

</head>
<body class="u-body bg_gradient">
<section class="h-full w-full" id="sec-325b">
    <article class="w-4/12 mx-auto mt-36 card">
        <div class="form-box">
            <form action="{{route('sign_in')}}" method="post" class="form">
                @csrf
                <h2 class="form__title">Вход</h2>
                <div class="form__input">
                    <p>Логин<span style="color: #BA1313; ">*</span></p>
                    <input tabindex="1" type="text" name="login" required placeholder="ivanov.ii"
                           class="form__input-name text-center text-md">
                    <p class="mt-4">Пароль<span style="color: #BA1313; ">*</span></p>
                    <input tabindex="2" type="password" name="password" required placeholder="••••••••"
                           class="form__input-password text-center text-md">
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger mt-4">
                        <ul class="text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button tabindex="3" type="submit" class="w-4/6 primary_button bg-blue-700 mt-4">Войти</button>
                <p class="mt-4">
                    Ещё нет аккаунта?
                    <a href="{{ route('sign_up') }}" tabindex="-1" class="form__reg">Зарегистрироваться</a>
                </p>
            </form>

        </div>
    </article>
</section>

</body>
</html>
