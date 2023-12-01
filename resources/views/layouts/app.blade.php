<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description " content="@yield('meta-description'),'dafault meta description">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
    @vite(['resources/css/app.scss','resources/js/app.js'])
</head>
<body class="antialiased bg-slate-100 dark:bg-slate-900">

    @include('partials.navigation')
    @if(session('status'))
    <div class="max-w-screen-xl px-3 py-2 mx-auto font-bold text-white sm:px-6 lg:px-8 bg-emerald-500 dark:bg-emerald-700">
        {{ session('status') }}
    </div>
@endif

    @yield('content')
</body>
</html>