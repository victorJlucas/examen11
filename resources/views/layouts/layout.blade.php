<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Zendero</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/framework.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
</head>
<body>
<div class="preload"></div>
<header class="space-inter">
    <div class="container container-flex space-between">
        <figure class="logo"><img src="/img/logo.png" alt=""></figure>
        <nav class="custom-wrapper" id="menu">
            <div class="pure-menu"></div>
            <ul class="container-flex list-unstyled">
                <li><a href="{{ route('home') }}" class="text-uppercase">Home</a></li>
                <li><a href="#" class="text-uppercase">About</a></li>
                <li><a href="#" class="text-uppercase">Archive</a></li>
                <li><a href="#" class="text-uppercase">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>

@yield('content')

<section class="footer">
    <footer>
        <div class="container">
            <figure class="logo"><img src="/img/logo.png" alt=""></figure>
            <nav>
                <ul class="container-flex space-center list-unstyled">
                    <li><a href="{{ route('home') }}" class="text-uppercase c-white">home</a></li>
                    <li><a href="#" class="text-uppercase c-white">about</a></li>
                    <li><a href="#" class="text-uppercase c-white">archive</a></li>
                    <li><a href="#" class="text-uppercase c-white">contact</a></li>
                </ul>
            </nav>
            <div class="divider-2"></div>
            <p>© 2017 - Zendero. All Rights Reserved. Designed & Developed by <span class="c-white">Agencia De La Web</span></p>
        </div>
    </footer>
</section>

</body>
</html>
