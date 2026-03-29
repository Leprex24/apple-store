@extends('layouts.app')

@section('content')
    <!-- Header-->
    <header class="bg-black py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">{{ $category->name }}</h1>
                <p class="lead fw-normal text-white-50 mb-0">{{ $category->description }}</p>
            </div>
        </div>
    </header>

    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-4 row-cols-xl-4 justify-content-center">
                @foreach($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            {{-- "Nowość" lub "Promocja" --}}
                            @if($product->is_new)
                                <div class="badge bg-primary text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Nowość</div>
                            @elseif($product->is_on_sale)
                                <div class="badge bg-primary text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Promocja</div>
                            @endif

                            {{-- zdjęcie produktu --}}
                            <img class="card-img-top" src="{{ asset('images/' . $product->primaryImage->image_path) }}" alt="{{ $product->name }}" />

                            <div class="card-body p-4">
                                <div class="text-center">
                                    {{-- nazwa produktu --}}
                                    <h5 class="fw-bolder">{{ $product->name }}</h5>

                                    {{-- oceny produktu --}}
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $product->fullStars())
                                                <div class="bi-star-fill"></div>
                                            @elseif($i == $product->fullStars() + 1 && $product->hasHalfStar())
                                                <div class="bi-star-half"></div>
                                            @else
                                                <div class="bi-star"></div>
                                            @endif
                                        @endfor
                                    </div>
                                    {{-- cena produktu --}}
                                    @if($product->is_on_sale && $product->original_price)
                                        <span class="text-muted text-decoration-line-through">{{ number_format($product->original_price, 2) }} zł</span>
                                        @if($product->discount_percentage)
                                            <span class="badge bg-danger ms-2">-{{$product->discount_percentage}}%</span>
                                        @endif
                                        <br>
                                        <span class="price-highlight fs-5">{{ number_format($product->price, 2) }} zł </span>
                                    @else
                                        {{ number_format($product->price, 2) }} zł
                                    @endif
                                </div>
                            </div>
                            {{-- przyciski akcji --}}
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-primary mt-auto" href="{{ route('products.show', $product->slug) }}">Kup teraz</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
