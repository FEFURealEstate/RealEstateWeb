<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Registration</title>
    <link rel="stylesheet" href="{{ asset('css/page.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('css/Registration.css') }}" media="screen">
    <script class="u-script" type="text/javascript" src="{{ asset('js/jquery.js') }}" defer=""></script>
    <script class="u-script" type="text/javascript" src="{{ asset('js/page.js') }}" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"/>


    <script type="application/ld+json">{
		"@type": "Organization",
		"name": "coursework",
		"logo": "{{ asset('images/default-logo.png') }}"}
    </script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Registration">
    <meta property="og:type" content="website">

    <title>Форма регистрации</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *, :after, :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg, video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns:repeat(1, minmax(0, 1fr))
        }

        @media (min-width: 640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width: 768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns:repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        p {
            margin: 0 !important;
            padding: 0 !important;
            text-align: center !important;
        }

        .fu {
            margin: 20px 0px !important;
            border: solid 1px rgba(200, 200, 200); !important;
            border-radius:10px; !important;
            background-color: white; !important;
            solid-color: #3E5C9A; !important;
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
<body class="u-body">
@include("partials.navbar")
<section class="h-full w-full" id="sec-325b">
        <article class="w-4/12 m-auto">
            <div class="form-box">
                <form action="{{route('sign_up')}}" method="post" class="form">
                    @csrf
                    <h2 class="form__title fu2">Регистрация</h2>
                    <p>Фамилия<span style="color: #BA1313; ">*</span></p>
                    <input tabindex="1" name="middlename" type="text" placeholder="Иванов" required
                           class="form__input-next text-center text-md mt-5 mb-5 fu" value="{{ old('middlename') }}"
                           style="color: black">
                    <p>Имя<span style="color: #BA1313; ">*</span></p>
                    <input tabindex="2" name="firstname" type="text" placeholder="Иван" required
                           class="form__input-next text-center text-md mt-5 mb-5 fu" value="{{ old('firstname') }}"
                           style="color: black"/>
                    <p>Отчество<span style="color: #BA1313; ">*</span></p>
                    <input tabindex="3" name="lastname" type="text" placeholder="Иванович" required
                           class="form__input-next text-center text-md mt-5 mb-5 fu" value="{{ old('lastname') }}"
                           style="color: black">
                    <p>Номер телефона</p>
                    <input tabindex="4" name="phone" type="tel" placeholder="8xxx-xxx-xx-xx" value="{{ old('phone') }}"
                           class="form__input-next text-center text-md mt-5 mb-5 fu3" style="color: black"/>
                    <p>Эл. почта</p>
                    <input tabindex="5" name="email" type="email" placeholder="ivanov.ii@google.com"
                           value="{{ old('email') }}" class="form__input-next text-center text-md mt-5 mb-5 fu3"
                           style="color: black"/>
                    <p>Логин<span style="color: #BA1313; ">*</span></p>
                    <input tabindex="6" name="login" type="text" placeholder="ivanov.ii" value="{{ old('login') }}"
                           required class="form__input-next text-center text-md mt-5 mb-5 fu" style="color: black">
                    <p>Пароль<span style="color: #BA1313; ">*</span></p>
                    <input tabindex="7" name="password" type="password" placeholder="••••••••" required
                           class="form__input-next text-center text-md mt-5 mb-5 fu" style="color: black">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="text-red-700">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <button tabindex="8" type="submit" class="form__bth font-bold bg-blue-700 mt-2 mb-5">Зарегистрироваться</button>
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
