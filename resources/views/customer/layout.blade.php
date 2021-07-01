<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Georges Garden Shop :: @yield('title')</title>
    <!-- Compressed CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/css/foundation.min.css"
          integrity="sha256-ogmFxjqiTMnZhxCqVmcqTvjfe1Y/ec4WaRj/aQPvn+I=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/motion-ui@1.2.3/dist/motion-ui.min.css"/>
    <!-- Compressed JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/foundation-sites@6.6.3/dist/js/foundation.min.js"
            integrity="sha256-pRF3zifJRA9jXGv++b06qwtSqX1byFQOLjqa2PTEb2o=" crossorigin="anonymous"></script>
    <!-- My custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
</head>
<body>

<!-- Top bar/menu -->
<header>
    <div class="title-bar" data-responsive-toggle="main-menu">
        <button class="menu-icon" type="button" data-toggle data-hide-for="medium"></button>
        <div class="title-bar-title">
            <h1>Georges Garden Shop</h1>
        </div>
    </div>
    <div class="top-bar" id="main-menu">
        <div class="top-bar-left">
            <ul class="dropdown menu grid-x" data-dropdown-menu>
                <li class="cell medium-12 large-shrink visual-h1 menu-text show-for-medium">Georges&nbsp;Garden&nbsp;Shop</li>
                <li class="cell small-3 large-shrink"><a href="{{route('home')}}">Home</a></li>
                <li class="cell small-3 large-shrink"><a href="{{route('products')}}">Products</a></li>
                <li class="cell small-3 large-shrink"><a href="{{route('blog')}}">Blog</a></li>
                <li class="cell small-3 large-shrink"><a href="{{route('contact')}}">Contact</a></li>
            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="menu grid-x">
                <li class="cell auto"><input type="search" placeholder="Search"></li>
                <li class="cell shrink">
                    <button type="button" class="button">🔍</button>
                </li>
            </ul>
        </div>
    </div>
</header>

<!-- Main Grid -->
<main class="grid-container">
    @yield('main')
</main>

<!-- Footer section -->
<footer class="grid-container">
    <ul class="grid-x grid-padding-x small-up-1 medium-up-2 large-up-3">
        <li class="cell">&copy; Georges Garden Shop 2021</li>
        <li class="cell"><span class="show-for-sr">Address:</span> 123 Main Street, Mount Lawley</li>
        <li class="cell">Open 8am &ndash; 7pm everyday</li>
        <li class="cell"><span class="show-for-sr">Phone:</span> (08)&nbsp;7010&nbsp;5270</li>
        <li class="cell"><span class="show-for-sr">Email:</span> shop@georgesgarden.com.au</li>
        <li class="cell attribution">Web design by D Stern</li>
        <li class="cell"><a href="{{route('dashboard')}}">Admin portal</a></li>
    </ul>
</footer>

<!-- Foundation initialisation -->
<script>$(document).foundation();</script>
</body>
</html>
