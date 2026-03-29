@extends('layouts.app')

@section('content')
    <!-- Header-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Witamy w naszym sklepie!</div>
            <div class="masthead-heading text-uppercase">Tutaj znajdziesz najnowsze produkty marki Apple w świetnych cenach</div>
        </div>
    </header>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Nasza oferta</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    {{-- polecane produkty --}}
                    <div class="portfolio-item">
                        <a class="portfolio-link" href="{{ route('shop.featured') }}">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-arrow-right fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="{{ asset('images/Portfolio/1.jpeg') }}" alt="Polecane produkty" />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Polecane produkty</div>
                        </div>
                    </div>
                </div>
                {{-- kategorie --}}
                @php
                    $categories = [
                        ['slug' => 'iphone', 'name' => 'iPhone', 'image' => '2.webp'],
                        ['slug' => 'ipad', 'name' => 'iPad', 'image' => '3.png'],
                        ['slug' => 'mac', 'name' => 'Mac', 'image' => '4.webp'],
                        ['slug' => 'apple-watch', 'name' => 'Apple Watch', 'image' => '5.webp'],
                        ['slug' => 'airpods', 'name' => 'AirPods', 'image' => '6.png'],
                    ];
                @endphp
                @foreach($categories as $cat)
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="portfolio-item">
                            <a class="portfolio-link" href="{{ route('category', $cat['slug']) }}">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-arrow-right fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="{{ asset('images/portfolio/' . $cat['image']) }}" alt="{{ $cat['name'] }}" />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">{{ $cat['name'] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
