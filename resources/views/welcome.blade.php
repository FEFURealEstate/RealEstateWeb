<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="Недвижимость в России">
        <meta name="description" content="">
        <meta name="page_type" content="np-template-header-footer-from-plugin">
        <title>Main</title>
        <link rel="stylesheet" href="{{ asset('css/page.css') }}" media="screen">
        <link rel="stylesheet" href="{{ asset('css/Main.css') }}" media="screen">
        <script class="u-script" type="text/javascript" src="{{ asset('js/jquery.js') }}" defer=""></script>
        <script class="u-script" type="text/javascript" src="{{ asset('js/page.js') }}" defer=""></script>
        <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
        <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i">

        <script type="application/ld+json">{
		"@type": "Organization",
		"name": "coursework",
		"logo": "{{ asset('images/default-logo.png') }}"}</script>

        <meta name="theme-color" content="#478ac9">
        <meta property="og:title" content="Main">
        <meta property="og:type" content="website">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        @include("partials.navbar")
        <section class="u-align-left u-clearfix u-image u-section-1" data-image-width="150" data-image-height="99">
            <div class="u-clearfix u-sheet u-sheet-1">
                <div class="u-border-1 u-border-custom-color-2 u-container-style u-custom-color-8 u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-opacity u-opacity-90 u-radius-20 u-shape-round u-group-1">
                    <div class="u-container-layout u-valign-bottom-xl u-container-layout-1">
                        <h1 class="u-align-center u-text u-text-custom-color-6 u-title u-text-1">Недвижимость в России</h1>
                        <a href="Property.html" class="u-align-left u-border-none u-btn u-btn-round u-button-style u-custom-color-9 u-custom-font u-heading-font u-hover-custom-color-2 u-radius-3 u-text-custom-color-8 u-btn-1">Купить</a>
                        <a href="Sell.html" class="u-align-right u-border-none u-btn u-btn-round u-button-style u-custom-color-9 u-custom-font u-heading-font u-hover-custom-color-2 u-radius-3 u-text-custom-color-8 u-btn-2">Продать</a>
                    </div>
                </div><span class="u-file-icon u-icon u-icon-rectangle u-opacity u-opacity-95 u-text-custom-color-10 u-icon-1"><img src="{{ asset('images/arrow.png') }}" alt=""></span>
            </div>
        </section>

        <section class="u-align-center u-clearfix u-custom-color-8 u-section-2">
            <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
                <h1 class="u-text u-text-default u-text-1"> Преимущества<span class="u-text-custom-color-6"></span></h1>
                <p class="u-custom-font u-heading-font u-text u-text-custom-color-6 u-text-default u-text-2">Сделки с помощью агентства</p>
                <div class="u-expanded-width u-list u-list-1">
                    <div class="u-repeater u-repeater-1">
                        <div class="u-align-center u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-1">
                            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-1"><span class="u-file-icon u-icon u-icon-circle u-text-custom-color-6 u-icon-1"><img src="{{ asset('images/safe.png') }}" alt=""></span>
                                <h4 class="u-text u-text-default u-text-3">Безопастность<span class="u-text-custom-color-6"></span></h4>
                                <p class="u-text u-text-custom-color-6 u-text-4">Каждый объект и документы проверяются нашими сотрудниками. Обеспечение законности процесса проведения сделки.&nbsp;</p>
                            </div>
                        </div>

                        <div class="u-align-center u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-2">
                            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-2"><span class="u-file-icon u-icon u-icon-circle u-text-custom-color-6 u-icon-2"><img src="{{ asset('images/money.png') }}" alt=""></span>
                                <h4 class="u-text u-text-default u-text-5">Выгода<span class="u-text-custom-color-6"></span></h4>
                                <p class="u-text u-text-custom-color-6 u-text-6">Находить самые выгодные и "горячие" предложения - наша специальность. Торгуемся в пользу нашего клиента.</p>
                            </div>
                        </div>

                        <div class="u-align-center u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-3">
                            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-3">

                <span class="u-icon u-icon-circle u-text-custom-color-6 u-icon-3">
                  <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 128 128" style="">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-bb16"></use>
                  </svg>
                  <svg class="u-svg-content" viewBox="0 0 128 128" id="svg-bb16">
                    <path d="m44.1 63.9h39.8c4.6 0 8.4-3.9 8.4-8.8v-1.8c0-5.6-2.8-10.7-7.3-13.3-2.4-1.4-5.4-2.9-8.8-4.1 2.8-3 4.6-6.9 4.6-11.3-0.1-9.2-7.6-16.6-16.8-16.6s-16.7 7.4-16.7 16.5c0 4.4 1.7 8.4 4.6 11.3-3.4 1.2-6.5 2.7-8.8 4.1-4.5 2.7-7.3 7.7-7.3 13.3v1.8c-0.1 4.9 3.7 8.9 8.3 8.9zm19.9-48c4.8 0 8.7 3.9 8.7 8.6 0 4.8-3.9 8.6-8.7 8.6s-8.7-3.9-8.7-8.6 3.9-8.6 8.7-8.6zm-20.3 37.3c0-2.7 1.3-5.3 3.4-6.5 4-2.3 10.2-5.1 16.9-5.1s12.9 2.8 16.9 5.1c2.1 1.2 3.4 3.8 3.4 6.5v1.8c0 0.6-0.3 0.9-0.4 0.9h-39.8c-0.1 0-0.4-0.3-0.4-0.9v-1.8zm5.5 40.9c-2.4-1.4-5.4-2.9-8.8-4.1 2.8-3 4.6-7 4.6-11.3 0-9.1-7.5-16.5-16.7-16.5s-16.7 7.4-16.7 16.5c0 4.4 1.7 8.4 4.6 11.3-3.4 1.2-6.5 2.7-8.8 4.1-4.6 2.6-7.4 7.7-7.4 13.3v1.8c0 4.9 3.8 8.8 8.4 8.8h39.8c4.6 0 8.4-3.9 8.4-8.8v-1.8c0-5.6-2.8-10.7-7.4-13.3zm-20.9-24.1c4.8 0 8.7 3.9 8.7 8.6 0 4.8-3.9 8.6-8.7 8.6s-8.7-3.9-8.7-8.6 3.9-8.6 8.7-8.6zm20.3 39.2c0 0.6-0.3 0.9-0.4 0.9h-39.8c-0.1 0-0.4-0.3-0.4-0.9v-1.8c0-2.7 1.3-5.3 3.4-6.5 4-2.3 10.2-5.1 16.9-5.1s12.9 2.8 16.9 5.1c2.1 1.2 3.4 3.8 3.4 6.5v1.8zm72.1-15.1c-2.4-1.4-5.4-2.9-8.8-4.1 2.8-3 4.6-6.9 4.6-11.3 0-9.1-7.5-16.5-16.7-16.5s-16.7 7.4-16.7 16.5c-0.1 4.3 1.7 8.3 4.5 11.3-3.4 1.2-6.5 2.7-8.8 4.1-4.5 2.7-7.3 7.7-7.3 13.3v1.8c0 4.9 3.8 8.8 8.4 8.8h39.8c4.6 0 8.4-3.9 8.4-8.8v-1.8c-0.1-5.6-2.9-10.7-7.4-13.3zm-21-24.1c4.8 0 8.7 3.9 8.7 8.6 0 4.8-3.9 8.6-8.7 8.6s-8.7-3.9-8.7-8.6 3.9-8.6 8.7-8.6zm20.3 39.2c0 0.6-0.3 0.9-0.4 0.9h-39.8c-0.1 0-0.4-0.3-0.4-0.9v-1.8c0-2.7 1.3-5.3 3.4-6.5 4-2.3 10.2-5.1 16.9-5.1s12.9 2.8 16.9 5.1c2.1 1.2 3.4 3.8 3.4 6.5v1.8z">
                    </path>
                  </svg>
                </span>

                                <h4 class="u-text u-text-default u-text-7">Меньше стресса</h4>
                                <p class="u-text u-text-custom-color-6 u-text-8">Работая с профессионалами Вам не нужно беспокоиться о множестве "подводных камней" по ходу сделки - мы поможем обратить внимание на все факторы.</p>
                            </div>
                        </div>

                        <div class="u-align-center u-container-style u-list-item u-repeater-item u-video-cover u-white u-list-item-4">
                            <div class="u-container-layout u-similar-container u-valign-top u-container-layout-4">

                <span class="u-icon u-icon-circle u-text-custom-color-6 u-icon-4">
                  <svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 128 128" style="">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-439e"></use>
                  </svg>
                  <svg class="u-svg-content" viewBox="0 0 128 128" id="svg-439e">
                    <path d="m93.8 13.5 18.4 25.2h-5.7c-2 0-3.6 1.6-3.6 3.6v77.7h-18.3v-77.7c0-2-1.6-3.6-3.6-3.6h-5.7l18.5-25.2m-22.4 55.6c3.3 0 6 2.7 6 6.1v44.8h-18.4v-44.8c0-3.3 2.7-6.1 6-6.1h6.4m-25.5 19.4c3.3 0 6 2.7 6 6.1v25.4h-18.4v-25.5c0-3.3 2.7-6.1 6-6.1h6.4m-25.6 19.4c3.3 0 6 2.7 6 6.1v6.1h-18.4v-6.1c0-3.3 2.7-6.1 6-6.1h6.4m73.5-107.8-6.4 8.7-18.4 25.2-9.4 12.8h17.1v15.4c-1.6-0.7-3.4-1-5.2-1h-6.5c-7.7 0-13.9 6.3-13.9 14.1v6.3c-1.6-0.7-3.4-1-5.2-1h-6.4c-7.7 0-13.9 6.3-13.9 14.1v6.3c-1.6-0.7-3.4-1-5.2-1h-6.4c-7.7-0.1-14 6.2-14 14v14.1h110.9v-81.3h17.1l-9.4-12.8-18.4-25.2-6.4-8.7z"></path>
                  </svg>
                </span>

                                <h4 class="u-text u-text-default u-text-9">Скорость<span class="u-text-custom-color-6"></span></h4>
                                <p class="u-text u-text-custom-color-6 u-text-10">Имея в базе множество актуальных объектов мы поможем быстро найти то что Вам подойдёт.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="u-align-center u-clearfix u-custom-color-5 u-section-3" id="sec-8397">
            <div class="u-clearfix u-sheet u-sheet-1">
                <h2 class="u-text u-text-custom-color-8 u-text-default u-text-1">Esoft</h2>
                <p class="u-text u-text-custom-color-8 u-text-2"> Команда профессионалов в сфере недвижимости</p>
                <div class="u-list u-list-1">
                    <div class="u-repeater u-repeater-1">
                        <div class="u-align-center u-container-style u-list-item u-repeater-item">
                            <div class="u-container-layout u-similar-container u-valign-bottom u-container-layout-1">
                                <img alt="" class="u-expanded-width u-image u-image-default u-image-1" data-image-width="150" data-image-height="150" src="{{ asset('images/woman.svg') }}">
                                <h5 class="u-text u-text-custom-color-8 u-text-3">Здесь мог быть&nbsp;</h5>
                                <p class="u-text u-text-4">Ваш сотрудник</p>
                                <a href="tel:" class="u-active-none u-btn u-button-style u-hover-none u-none u-text-custom-color-8 u-text-hover-custom-color-15 u-btn-1">
                  <span class="u-icon u-text-custom-color-15">
                    <svg class="u-svg-content" viewBox="0 0 405.333 405.333" x="0px" y="0px" style="width: 1em; height: 1em;">
                      <path d="M373.333,266.88c-25.003,0-49.493-3.904-72.704-11.563c-11.328-3.904-24.192-0.896-31.637,6.699l-46.016,34.752
                      c-52.8-28.181-86.592-61.952-114.389-114.368l33.813-44.928c8.512-8.512,11.563-20.971,7.915-32.64
                      C142.592,81.472,138.667,56.96,138.667,32c0-17.643-14.357-32-32-32H32C14.357,0,0,14.357,0,32
                      c0,205.845,167.488,373.333,373.333,373.333c17.643,0,32-14.357,32-32V298.88C405.333,281.237,390.976,266.88,373.333,266.88z">
                      </path>
                    </svg><img>
                  </span>&nbsp;+1 (234) 567-****
                                </a>
                            </div>
                        </div>

                        <div class="u-align-center u-container-style u-list-item u-repeater-item">
                            <div class="u-container-layout u-similar-container u-valign-bottom u-container-layout-2">
                                <img alt="" class="u-expanded-width u-image u-image-default u-image-2" data-image-width="150" data-image-height="150" src="{{ asset('images/woman.svg') }}">
                                <h5 class="u-text u-text-custom-color-8 u-text-5"> Здесь мог быть&nbsp;</h5>
                                <p class="u-text u-text-6"> Ваш сотрудник</p>
                                <a href="tel:" class="u-active-none u-btn u-button-style u-hover-none u-none u-text-custom-color-8 u-text-hover-custom-color-15 u-btn-2">
                  <span class="u-icon u-text-custom-color-15">
                    <svg class="u-svg-content" viewBox="0 0 405.333 405.333" x="0px" y="0px" style="width: 1em; height: 1em;">
                      <path d="M373.333,266.88c-25.003,0-49.493-3.904-72.704-11.563c-11.328-3.904-24.192-0.896-31.637,6.699l-46.016,34.752
                      c-52.8-28.181-86.592-61.952-114.389-114.368l33.813-44.928c8.512-8.512,11.563-20.971,7.915-32.64
                      C142.592,81.472,138.667,56.96,138.667,32c0-17.643-14.357-32-32-32H32C14.357,0,0,14.357,0,32
                      c0,205.845,167.488,373.333,373.333,373.333c17.643,0,32-14.357,32-32V298.88C405.333,281.237,390.976,266.88,373.333,266.88z">
                      </path>
                    </svg><img>
                  </span>&nbsp;+1 (234) 567-****
                                </a>
                            </div>
                        </div>

                        <div class="u-align-center u-container-style u-list-item u-repeater-item">
                            <div class="u-container-layout u-similar-container u-valign-bottom u-container-layout-3">
                                <img alt="" class="u-expanded-width u-image u-image-default u-image-3" data-image-width="150" data-image-height="150" src="{{ asset('images/man.svg') }}">
                                <h5 class="u-text u-text-custom-color-8 u-text-7"> Здесь мог быть&nbsp;</h5>
                                <p class="u-text u-text-8"> Ваш сотрудник</p>
                                <a href="tel:" class="u-active-none u-btn u-button-style u-hover-none u-none u-text-custom-color-8 u-text-hover-custom-color-15 u-btn-3">
                  <span class="u-icon u-text-custom-color-15">
                    <svg class="u-svg-content" viewBox="0 0 405.333 405.333" x="0px" y="0px" style="width: 1em; height: 1em;">
                      <path d="M373.333,266.88c-25.003,0-49.493-3.904-72.704-11.563c-11.328-3.904-24.192-0.896-31.637,6.699l-46.016,34.752
                      c-52.8-28.181-86.592-61.952-114.389-114.368l33.813-44.928c8.512-8.512,11.563-20.971,7.915-32.64
                      C142.592,81.472,138.667,56.96,138.667,32c0-17.643-14.357-32-32-32H32C14.357,0,0,14.357,0,32
                      c0,205.845,167.488,373.333,373.333,373.333c17.643,0,32-14.357,32-32V298.88C405.333,281.237,390.976,266.88,373.333,266.88z">
                      </path>
                    </svg><img>
                  </span>&nbsp;+1 (234) 567-****
                                </a>
                            </div>
                        </div>

                        <div class="u-align-center u-container-style u-list-item u-repeater-item">
                            <div class="u-container-layout u-similar-container u-valign-bottom u-container-layout-4">
                                <img alt="" class="u-expanded-width u-image u-image-default u-image-4" data-image-width="150" data-image-height="150" src="{{ asset('images/man.svg') }}">
                                <h5 class="u-text u-text-custom-color-8 u-text-9">Боб</h5>
                                <p class="u-text u-text-10">Это просто Боб</p>
                                <a href="tel:" class="u-active-none u-btn u-button-style u-hover-none u-none u-text-custom-color-8 u-text-hover-custom-color-15 u-btn-4">
                  <span class="u-icon u-text-custom-color-15">
                    <svg class="u-svg-content" viewBox="0 0 405.333 405.333" x="0px" y="0px" style="width: 1em; height: 1em;">
                      <path d="M373.333,266.88c-25.003,0-49.493-3.904-72.704-11.563c-11.328-3.904-24.192-0.896-31.637,6.699l-46.016,34.752
                      c-52.8-28.181-86.592-61.952-114.389-114.368l33.813-44.928c8.512-8.512,11.563-20.971,7.915-32.64
                      C142.592,81.472,138.667,56.96,138.667,32c0-17.643-14.357-32-32-32H32C14.357,0,0,14.357,0,32
                      c0,205.845,167.488,373.333,373.333,373.333c17.643,0,32-14.357,32-32V298.88C405.333,281.237,390.976,266.88,373.333,266.88z">
                      </path>
                    </svg><img>
                  </span>&nbsp;+1 (234) 567-****
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="u-align-center u-clearfix u-custom-color-10 u-section-4" id="sec-d75f">
            <div class="u-clearfix u-sheet u-sheet-1">
                <h1 class="u-text u-text-custom-color-8 u-text-default u-text-1">Сделки с недвижимостью в России</h1>
                <p class="u-custom-font u-heading-font u-text u-text-2">Esoft специализируется на обеспечении комфорта и выгоды при совершении сделок с недвижимостью для всех её сторон. Опыт и квалификация наших специалистов помогут подобрать нужный объект, либо продать собственность выгодно и в сжатые сроки.&nbsp;</p>
            </div>
        </section>
        <style class="u-overlap-style">.u-overlap:not(.u-sticky-scroll) .u-header {background-color: #263238 !important; background-image: linear-gradient(#263238, rgba(55,71,79,0.39)) !important}</style>


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
