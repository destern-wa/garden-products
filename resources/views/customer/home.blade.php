@extends('customer.layout')

@section('title', 'Home')

@section('main')
    <div class="grid-x grid-padding-x">
        <!-- Carousel -->
        <div id="carousel-container" class="cell small-12 medium-9">
            <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
                <div class="orbit-wrapper">
                    <div class="orbit-controls">
                        <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span>&#9664;&#xFE0E;
                        </button>
                        <button class="orbit-next"><span class="show-for-sr">Next Slide</span>&#9654;&#xFE0E;</button>
                    </div>
                    <ul class="orbit-container">
                        <li class="is-active orbit-slide">
                            <figure class="orbit-figure">
                                <img class="orbit-image" src="images/pexels-stitch-dias-2116478.jpg"
                                     alt="Man skating on street with many fallen brown leaves">
                                <figcaption class="orbit-caption">
                                    <em>Awesome <strong>autumn ideas</strong></em> in-store now!
                                </figcaption>
                            </figure>
                        </li>
                        <li class="orbit-slide">
                            <figure class="orbit-figure">
                                <img class="orbit-image" src="images/pexels-rodnae-productions-7363097.jpg"
                                     alt="Greeting card with message 'Thank you so much'">
                                <figcaption class="orbit-caption">
                                    Thank you for supporting your <em><strong>local</strong> garden shop</em>
                                </figcaption>
                            </figure>
                        </li>
                        <li class="orbit-slide">
                            <figure class="orbit-figure">
                                <img class="orbit-image" src="images/pexels-cottonbro-4503273.jpg"
                                     alt="Several small potted plants on a wooden table: pepper, mint, tomato, basil, and oregano">
                                <figcaption class="orbit-caption">Small potted plants: <em>Buy 2 get 1
                                        <strong>free!</strong></em></figcaption>
                            </figure>
                        </li>
                        <li class="orbit-slide">
                            <figure class="orbit-figure">
                                <img class="orbit-image" src="images/pexels-edu-carvalho-2050994.jpg"
                                     alt="Close up of older woman smiling, with her eyes closed, near a yellow-petaled flower.">
                                <figcaption class="orbit-caption">Seniors <em>save <strong>5%</strong></em> every Tuesday</figcaption>
                            </figure>
                        </li>
                    </ul>
                </div>
                <nav class="orbit-bullets">
                    <button class="is-active" data-slide="0">
                        <span class="show-for-sr">First slide details.</span>
                        <span class="show-for-sr" data-slide-active-label>Current Slide</span>
                    </button>
                    <button data-slide="1"><span class="show-for-sr">Second slide details.</span></button>
                    <button data-slide="2"><span class="show-for-sr">Third slide details.</span></button>
                    <button data-slide="3"><span class="show-for-sr">Fourth slide details.</span></button>
                </nav>
            </div>
        </div>

        <!-- News headlines -->
        <div class="cell small-12 medium-3">
            <h2>Latest news</h2>
            <ul id="news-list" class="vertical menu" data-accordion-menu>
                <li class="callout">
                    <a href="#0">Top autumn tips</a>
                    <ul class="menu vertical nested">
                        <li>Spruce up your garden this autumn</li>
                        <li><a href="{{route('blog')}}#top-autumn-tips">Read more...</a></li>
                    </ul>
                </li>
                <li class="callout">
                    <a href="#0">Make the most of your compost</a>
                    <ul class="menu vertical nested">
                        <li>How to get by with a limited supply</li>
                        <li><a href="{{route('blog')}}#make-the-most-of-your-compost">Read more...</a></li>
                    </ul>
                </li>
                <li class="callout">
                    <a href="#0">Are you fertilising the correct way?</a>
                    <ul class="menu vertical nested">
                        <li>Find out how, when, and why</li>
                        <li><a href="{{route('blog')}}#are-you-fertilising-the-correct-way">Read more...</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Product categories grid -->
        <div id="productCategories" class="cell auto">
            <h2>Product categories</h2>
            <div class="gallery grid-x grid-padding-x small-up-2 medium-up-3 large-up-4">
                @foreach($categories as $category)
                    <div class="cell">
                        <a href="{{url('products').'?category='.$category->slug}}" class="gallery-item callout">
                            <img src="images/{{$category->picture}}" alt="Photo of {{$category->name}}">
                            <div class="gallery-item-details">
                                <span class="category-title">{{$category->name}}</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
