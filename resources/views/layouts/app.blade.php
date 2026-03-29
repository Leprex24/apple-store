<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Strona główna sklepu z produktami Apple" />
    <meta name="author" content="Kacper Sawicki" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Apple Store</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo/apple_logo.png') }}" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="{{ route('home') }}">Apple Store</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('home') }}">Strona główna</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">O nas</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sklep</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('shop.featured') }}">Polecane produkty</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="{{ route('category', 'iphone') }}">iPhone</a></li>
                        <li><a class="dropdown-item" href="{{ route('category', 'ipad') }}">iPad</a></li>
                        <li><a class="dropdown-item" href="{{ route('category', 'mac') }}">Mac</a></li>
                        <li><a class="dropdown-item" href="{{ route('category', 'apple-watch') }}">Apple Watch</a></li>
                        <li><a class="dropdown-item" href="{{ route('category', 'airpods') }}">AirPods</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.dashboard') }}">
                            <i class="bi bi-person-circle"></i> Mój panel
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Zaloguj się</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Zarejestruj się</a>
                    </li>
                @endauth
                    <li class="nav-item">
                        <div class="text-center">
                            <a class="btn btn-outline-dark mt-auto" href="{{ route('cart.index') }}">
                                <i class="bi-cart-fill me-1"></i> Koszyk
                                <span class="badge bg-dark text-white ms-1 rounded-pill">{{ app(\App\Services\CartService::class)->getCount() }}</span>
                            </a>
                        </div>
                    </li>

            </ul>
                        {{--            <form class="d-flex">--}}
{{--                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('cart.index') }}"><i--}}
{{--                            class="bi-cart-fill me-1"></i> Koszyk <span--}}
{{--                            class="badge bg-dark text-white ms-1 rounded-pill">0</span></a></div>--}}
{{--            </form>--}}
        </div>
    </div>
</nav>


<!-- Główna treść -->
<main class="flex-grow-1">
    @yield('content')
</main>

<!-- Footer-->
<footer class="py-5 bg-black">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Projekt Kacper Sawicki 2025</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('js/scripts.js') }}"></script>
@stack('scripts')
</body>
</html>
