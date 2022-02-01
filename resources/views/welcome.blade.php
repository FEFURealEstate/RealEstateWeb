<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: 100%;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Недвижимость в России">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>@yield('title', "Главная страница")</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('logo.png')  }}">

    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Main">
    <meta property="og:type" content="website">
    <script src="{{ asset('js/easy_background.min.js') }}"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="antialiased" style="height: 100%;">
@php
    use App\Enums\Roles;

    $user = \Illuminate\Support\Facades\Auth::user();
    if(Auth::check())
    {
        $user_id = $user->id;

        if (\App\Models\PersonSet_Admin::whereId($user_id)->first() !== null)
            $role = Roles::ADMIN;
        elseif (\App\Models\PersonSet_Agent::whereId($user_id)->first() !== null)
            $role = Roles::AGENT;
        elseif (\App\Models\PersonSet_Client::whereId($user_id)->first() !== null)
            $role = Roles::CLIENT;
    }

@endphp
<div style="min-height: 100vh;" class="bg_gradient">
    @if(\Illuminate\Support\Facades\Auth::check() === false)
        <div class="flex flex-col justify-end items-center" style="min-height: 100vh;">
            @include("rights.no_auth")
        </div>
    @else
        <div class="flex">
            <div class="min-h-screen sidebar_bg text-white p-2 sticky">
                <a href="{{ route('welcome') }}"> <img src="{{ asset('images/logo.png') }}" alt="logo"
                                                       class="m-auto"></a>
                @if(\Illuminate\Support\Facades\Auth::check() === false)
                    @include("rights.no_auth")
                @else
                    @if($role === Roles::CLIENT)
                        @include("rights.client")
                    @endif
                    @if($role === Roles::AGENT)
                        @include("rights.agent")
                    @endif
                    @if($role === Roles::ADMIN)
                        @include("rights.admin")
                    @endif
                @endif
            </div>
            <div class="flex-1">
                @yield('content')
            </div>
        </div>
    @endif
</div>
</body>
</html>
