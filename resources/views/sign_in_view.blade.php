<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Форма авторизации</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style_login.css') }}">
        <link rel="stylesheet" href="{{ asset('css/page.css') }}" media="screen">
        <link rel="stylesheet" href="{{ asset('css/Login.css') }}" media="screen">
        <script class="u-script" type="text/javascript" src="{{ asset('js/jquery.js') }}" defer=""></script>
        <script class="u-script" type="text/javascript" src="{{ asset('js/page.js') }}" defer=""></script>
        <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
        <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">


        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

        </style>

        <script type="application/ld+json">{
		"@type": "Organization",
		"name": "coursework",
		"logo": "{{ asset('images/default-logo.png') }}"}</script>

        <meta name="theme-color" content="#478ac9">
        <meta property="og:title" content="Login">
        <meta property="og:type" content="website">
    </head>
    <body class="u-body">
    <header class="u-clearfix u-custom-color-6 u-header u-sticky u-sticky-c736 u-header" id="sec-2df4">
        <div class="u-clearfix u-sheet u-sheet-1">
            <nav class="u-align-right-md u-align-right-sm u-align-right-xs u-menu u-menu-dropdown u-offcanvas u-menu-1">
                <div class="menu-collapse u-custom-font u-font-roboto" style="font-size: 1.125rem; letter-spacing: 0px; text-transform: uppercase; font-weight: 700;">
                    <a class="u-button-style u-custom-active-border-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-file-icon u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base u-file-icon-1" href="#">
                        <img src="{{ asset('images/menu.png') }}" alt="">
                    </a>
                </div>
                <div class="u-custom-menu u-nav-container">
                    <ul class="u-custom-font u-font-roboto u-nav u-spacing-30 u-unstyled u-nav-1">
                        <li class="u-nav-item">
                            <a class="u-border-3 u-border-active-custom-color-2 u-border-hover-custom-color-10 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-2 u-text-custom-color-5 u-text-hover-custom-color-10" href="{{ route('welcome') }}" style="padding: 10px 0px;">Главная</a>
                        </li>
                        <li class="u-nav-item">
                            <a class="u-border-3 u-border-active-custom-color-2 u-border-hover-custom-color-10 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-2 u-text-custom-color-5 u-text-hover-custom-color-10" href="{{ route('sign_in') }}" style="padding: 10px 0px;">Вход</a>
                        </li>
                        <li class="u-nav-item">
                            <a class="u-border-3 u-border-active-custom-color-2 u-border-hover-custom-color-10 u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-custom-color-2 u-text-custom-color-5 u-text-hover-custom-color-10" href="{{ route('sign_up') }}" style="padding: 10px 0px; color: white;">Регистрация</a>
                        </li>
                    </ul>
                </div>
                <div class="u-custom-menu u-nav-container-collapse">
                    <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
                        <div class="u-inner-container-layout u-sidenav-overflow">
                            <div class="u-menu-close"></div>
                            <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2">
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="{{ route('welcome') }}" style="padding: 10px 0px;">Главная</a>
                                </li>
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="{{ route('sign_in') }}" style="padding: 10px 0px;">Вход</a>
                                </li>
                                <li class="u-nav-item">
                                    <a class="u-button-style u-nav-link" href="{{ route('sign_up') }}" style="padding: 10px 0px;">Регистрация</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
                </div>
            </nav>
            <a href="" class="u-image u-logo u-image-1">
                <img src="{{ asset('images/default-logo.png') }}" class="u-logo-image u-logo-image-1" alt="">
            </a>
        </div>
    </header>
    <section class="u-clearfix u-image u-shading u-section-1" id="sec-325b" data-image-width="150" data-image-height="100">
        <div class="u-clearfix u-sheet u-valign-top u-sheet-1 body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('error'))
                <div>
                    <p>{{ session('error') }}</p>
                </div>
            @endif
            <article class="container">
                <div class="form-box">

                    <form action="{{route('sign_in')}}" method="post" class="form">
                        @csrf
                        <h2 class="form__title">Вход в систему</h2>
                        <div class="form__input">
                            <p>Имя пользователя<font color="BA1313">*</font></p>
                            <p style="color: black;">
                                <input tabindex="1" type="text" name="login" required placeholder="..." class="form__input-name">
                            </p>
                            <p>Пароль<font color="BA1313">*</font></p>
                            <p style="color: black;">
                                <input tabindex="2" type="password" name="password" required placeholder="..." class="form__input-password">
                            </p>
                        </div>
                        <button tabindex="3" type="submit" class="form__bth">Войти</button>
                        <p>
                            Ещё нет аккаунта?
                            <a href="{{ route('sign_up') }}" tabindex="-1" class="form__reg">Зарегистрироваться</a>
                        </p>
                    </form>

                </div>
            </article>
        </div>
    </section>

    <footer class="u-clearfix u-footer u-grey-80" id="sec-8702"><div class="u-clearfix u-sheet u-sheet-1">
            <a href="" class="u-image u-logo u-image-1">
                <img src="{{ asset('images/default-logo.png') }}" class="u-logo-image u-logo-image-1">
            </a>
            <div class="u-align-left u-border-1 u-border-custom-color-8 u-expanded-width u-line u-line-horizontal u-opacity u-opacity-30 u-line-1"></div>
            <p class="u-heading-font u-large-text u-text u-text-custom-color-8 u-text-default u-text-variant u-text-1">Данный сайт создан студентами ДВФУ в целях сдачи курсовой</p>
        </div>
    </footer>
    </body>
</html>
