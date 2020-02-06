<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('meta-title', config('app.name'))</title>
    <meta name="description" content="@yield('meta-description', 'Este es el Blog del IES Ingeniero de la Cierva')">
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/framework.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
    @stack('styles')
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
</head>
<body>
<div class="preload"></div>
<header class="space-inter">
    <div class="container container-flex space-between">
        <figure class="logo"><img src="/img/logo.png" alt=""></figure>
        @include('partials.nav')
    </div>
</header>

@yield('content')

<section class="footer">
    <footer>
        <div class="container">
            <figure class="logo"><img src="/img/logo.png" alt=""></figure>
            <div class="divider-2"></div>
            <p>© 2017 - Zendero. All Rights Reserved. Designed & Developed by <span class="c-white">Agencia De La Web</span></p>
        </div>
    </footer>
</section>
@stack('scripts')
</body>
</html>
