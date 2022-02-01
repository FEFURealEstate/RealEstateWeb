<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Регистрация</title>
    <link rel="icon" href="{{ asset('logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Registration.css') }}" media="screen">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"/>

    <title>Форма регистрации</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        p {
            margin-top: 1rem !important;
            padding: 0 !important;
            text-align: center !important;
        }

        .fu {
            margin: 20px 0px !important;
            border: solid 1px rgba(200, 200, 200);
        !important;
            border-radius: 10px;
        !important;
            background-color: white;
        !important;
            solid-color: #3E5C9A;
        !important;
        }

        .fu2 {
            margin: 20px 0px 40px 0px !important;
        }

        .fu3 {
            padding: 16px !important;
        }
    </style>

    <link rel="stylesheet" href="{{ asset('css/style_reg.css') }}">

    <script type="text/javascript">
        function validation() {
            valid = true;
            if ((document.contact_form.phone1.value == '') && (document.contact_form.email1.value == '')) {
                alert('Введите хотя бы один контакт');
                valid = false;
            }
            return valid;
            validation();
        }
    </script>
</head>
<body class="u-body bg_gradient">
<section class="h-full w-full" id="sec-325b">
    <article class="w-8/12 mx-auto mt-32 card">
        <div class="form-box">
            <form action="{{route('sign_up')}}" method="post" class="form">
                @csrf
                <h2 class="form__title">Регистрация</h2>
                <div class="grid grid-cols-3">
                    <div>
                        <p class="m-0">Фамилия<span style="color: #BA1313; ">*</span></p>
                        <input tabindex="1" name="middlename" type="text" placeholder="Иванов" required
                               class="form__input-next text-center text-md" value="{{ old('middlename') }}"
                               style="color: black">
                    </div>
                    <div>
                        <p>Имя<span style="color: #BA1313; ">*</span></p>
                        <input tabindex="2" name="firstname" type="text" placeholder="Иван" required
                               class="form__input-next text-center text-md" value="{{ old('firstname') }}"
                               style="color: black"/>
                    </div>
                    <div>
                        <p class>Отчество<span style="color: #BA1313; ">*</span></p>
                        <input tabindex="3" name="lastname" type="text" placeholder="Иванович" required
                               class="form__input-next text-center text-md" value="{{ old('lastname') }}"
                               style="color: black">
                    </div>
                    <div>
                        <p>Номер телефона</p>
                        <input tabindex="4" name="phone" type="tel" placeholder="8xxx-xxx-xx-xx"
                               value="{{ old('phone') }}"
                               class="form__input-next text-center text-md fu3" style="color: black"/>
                    </div>
                    <div>
                        <p>Эл. почта</p>
                        <input tabindex="5" name="email" type="email" placeholder="ivanov.ii@google.com"
                               value="{{ old('email') }}" class="form__input-next text-center text-md fu3"
                               style="color: black"/>
                    </div>
                    <div>
                        <p>Логин<span style="color: #BA1313; ">*</span></p>
                        <input tabindex="6" name="login" type="text" placeholder="ivanov.ii" value="{{ old('login') }}"
                               required class="form__input-next text-center text-md" style="color: black">
                    </div>
                    <div>
                        <p>Пароль<span style="color: #BA1313; ">*</span></p>
                        <input tabindex="7" name="password" type="password" placeholder="••••••••" required
                               class="form__input-next text-center text-md" style="color: black">
                    </div>
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
                <button tabindex="8" type="submit" class="w-2/6 primary_button bg-blue-700 mt-4 mb-4">
                    Зарегистрироваться
                </button>
                <br>
                <span text-align="center">
                 Уже есть аккаунт?
                 <a href="{{ route('sign_in') }}" tabindex="-1" class="form__reg pb-20">Войти</a>
              </span>
            </form>
        </div>
    </article>
</section>

</body>
</html>
