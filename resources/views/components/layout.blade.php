<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description " content="@yield('meta-description'),'dafault meta description">
</head>
<body>

{{-- es una forma diferente que extends el slot --}}

    {{$slot}}
</body>
</html>