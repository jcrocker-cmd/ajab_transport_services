<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Welcome | AJAB</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Styles -->
    <link rel="stylesheet" href="/css/db_forgotpassword.css">
    <link rel="stylesheet" href="/css/verification.css">
    <link rel="stylesheet" href="/css/db_resetpassword.css">
    <link rel="stylesheet" href="/css/reset-pm.css">

</head>
<body>
        <main style="
        margin: 0;
        padding: 0;
        ">
            @yield('content')
        </main>
    </div>
</body>
</html>
