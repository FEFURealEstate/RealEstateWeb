<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full m-0 p-0">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
</head>
<body class="h-full">
@yield('content')
</body>
</html>
