@extends('layouts.app')

{{-- Dodatkowe CSS dla strony produktu --}}
@push('styles')
    <link href="{{ asset('css/item.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet" />
    <style>
        .reaction-btn.active {
            border-width: 2px;
            font-weight: bold;
        }
        .reaction-btn.active.btn-outline-success {
            color: #198754;
            border-color: #198754;
        }
        .reaction-btn.active.btn-outline-danger {
            color: #dc3545;
            border-color: #dc3545;
        }
    </style>

@endpush

@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                {{-- galeria --}}
                <div class="col-md-6">
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach($product->images as $index => $image)
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $index }}"
                                        @if($index === 0) class="active" aria-current="true" @endif
                                        aria-label="Slide {{ $index + 1 }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach($product->images as $index => $image)
                                <div class="carousel-item @if($index === 0) active @endif">
                                    <img src="{{ asset('images/' . $image->image_path) }}" class="d-block w-100" alt="{{ $product->name }} {{ $index + 1 }}">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

                {{-- szczegóły produtku --}}
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">{{ $product->name }}</h1>

                    {{-- Ocena --}}
                    <div class="d-flex justify-content-left small text-warning mb-2">
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

                    {{-- cena --}}
                    <div class="fs-5 mb-5">
                        @if($product->is_on_sale && $product->original_price)
                            <span class="text-muted text-decoration-line-through">{{ number_format($product->original_price, 2) }} zł</span>
                            @if($product->discount_percentage)
                                <span class="badge bg-danger ms-2">-{{$product->discount_percentage}}%</span>
                            @endif
                            <br>
                            <span class="price-highlight fs-4">{{ number_format($product->price, 2) }} zł</span>
                        @else
                            <span>{{ number_format($product->price, 2) }} zł</span>
                        @endif
                    </div>

                    <hr>

                    {{-- specyfikacja z pola description --}}
                    <p class="lead">
                        {!! $product->formattedDescription() !!}
                    </p>

                    {{-- dodaj do koszyka --}}
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="number" value="1" min="1" style="max-width: 3rem" />
                        <button class="btn btn-outline-primary flex-shrink-0"
                                type="button"
                                data-product-id="{{ $product->id }}">
                            <i class="bi-cart-fill me-1"></i>
                            Dodaj do koszyka
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- opis produktu dlugi --}}
    <section class="hero-section py-5">
        <div class="sticky-nav">
            <div class="container">
                <nav class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-gradient">Opis produktu</h5>
                    <ul class="nav nav-pills mb-0">
                        @foreach($product->features as $index => $feature)
                            <li class="nav-item">
                                <a class="nav-link @if($index === 0) active @endif" href="#feature-{{ $feature->id }}">
                                    {{ $feature->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>

        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="section-title floating-element">Poznaj {{ $product->name }}</h2>

            @foreach($product->features as $feature)
                <div id="feature-{{ $feature->id }}" class="content-section">
                    <div class="feature-card">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <div class="feature-icon floating-element">
                                    @if($feature->icon)
                                        <i class="bi bi-{{ $feature->icon }}"></i>
                                    @else
                                        <i class="bi bi-check-circle"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-10">
                                <h4 class="mb-3">
                                    <span class="feature-highlight">{{ $feature->subtitle }}</span>
                                </h4>
                                <p class="mb-0 text-light">
                                    {{-- Konwersja ** na <strong> i renderowanie jako HTML --}}
                                    {!! \Illuminate\Support\Str::markdown($feature->description) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Powiązane produkty --}}
    <section class="py-5 bg-white">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Powiązane produkty</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach($relatedProducts as $related)
                    <div class="col mb-5">
                        <div class="card h-100">
                            {{-- oznaczenie jak potrzebne --}}
                            @if($related->is_new)
                                <div class="badge bg-primary text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Nowość</div>
                            @elseif($related->is_on_sale)
                                <div class="badge bg-primary text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Promocja</div>
                            @endif

                            {{-- zdjęcie --}}
                            @if($related->primaryImage)
                                <img class="card-img-top" src="{{ asset('images/' . $related->primaryImage->image_path) }}" alt="{{ $related->name }}" />
                            @endif

                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">{{ $related->name }}</h5>

                                    {{-- gwiazdki --}}
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $related->fullStars())
                                                <div class="bi-star-fill"></div>
                                            @elseif($i == $related->fullStars() + 1 && $related->hasHalfStar())
                                                <div class="bi-star-half"></div>
                                            @else
                                                <div class="bi-star"></div>
                                            @endif
                                        @endfor
                                    </div>

                                    {{-- cena --}}
                                    @if($related->is_on_sale && $related->original_price)
                                        <span class="text-muted text-decoration-line-through">{{ number_format($related->original_price, 2) }} zł</span><br>
                                        <span class="price-highlight fs-5">{{ number_format($related->price, 2) }} zł</span>
                                    @else
                                        {{ number_format($related->price, 2) }} zł
                                    @endif
                                </div>
                            </div>

                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-primary mt-auto" href="{{ route('products.show', $related->slug) }}">
                                        Kup teraz
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Opinie --}}
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Opinie klientów</h2>

            @if($product->reviews->isEmpty())
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                    Ten produkt nie ma jeszcze żadnych opinii. Bądź pierwszym który go oceni!
                </div>
            @else
                {{-- Statystyki opinii --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center">
                                <h1 class="display-4 fw-bold">{{ number_format($product->averageRating(), 1) }}</h1>
                                <div class="text-warning mb-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $product->fullStars())
                                            <i class="bi-star-fill"></i>
                                        @elseif($i == $product->fullStars() + 1 && $product->hasHalfStar())
                                            <i class="bi-star-half"></i>
                                        @else
                                            <i class="bi-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <p class="text-muted mb-0">{{ $product->reviews->count() }} {{ Str::plural('opinia', $product->reviews->count()) }}</p>
                            </div>
                            <div class="col-md-9">
                                @for($rating = 5; $rating >= 1; $rating--)
                                    @php
                                        $count = $product->reviews->where('rating', $rating)->count();
                                        $percentage = $product->reviews->count() > 0 ? ($count / $product->reviews->count()) * 100 : 0;
                                    @endphp
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="me-2" style="min-width: 60px;">{{ $rating }} <i class="bi bi-star-fill text-warning"></i></span>
                                        <div class="progress flex-grow-1" style="height: 20px;">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $percentage }}%"></div>
                                        </div>
                                        <span class="ms-2 text-muted" style="min-width: 40px;">{{ $count }}</span>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Lista opinii --}}
                @foreach($product->reviews()->with(['user', 'images'])->latest()->paginate(5) as $review)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div>
                                    <h5 class="mb-1">{{ $review->user->name }}</h5>
                                    <div class="text-warning mb-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= floor($review->rating))
                                                <i class="bi-star-fill"></i>
                                            @elseif($i - 0.5 == $review->rating)
                                                <i class="bi-star-half"></i>
                                            @else
                                                <i class="bi-star"></i>
                                            @endif
                                        @endfor
                                        <span class="text-muted ms-1">({{ $review->rating }}/5)</span>
                                    </div>
                                </div>
                                <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                            </div>

                            <p class="mb-3">{{ $review->comment }}</p>

                            {{-- Zdjęcia do opinii --}}
                            @if($review->images->isNotEmpty())
                                <div class="d-flex gap-2 flex-wrap mb-3">
                                    @foreach($review->images as $image)
                                        <img src="{{ asset('storage/' . $image->image_path) }}"
                                             alt="Zdjęcie opinii"
                                             class="rounded"
                                             style="width: 100px; height: 100px; object-fit: cover; cursor: pointer;"
                                             data-bs-toggle="modal"
                                             data-bs-target="#imageModal{{ $image->id }}">

                                        {{-- Modal do wyświetlania pełnego zdjęcia --}}
                                        <div class="modal fade" id="imageModal{{ $image->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-body p-0">
                                                        <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" style="z-index: 1;"></button>
                                                        <img src="{{ asset('storage/' . $image->image_path) }}"
                                                             alt="Zdjęcie opinii"
                                                             class="img-fluid w-100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                        </div>
                    </div>
                @endforeach

                {{-- Paginacja --}}
                <div class="d-flex justify-content-center mt-4">
                    {{ $product->reviews()->latest()->paginate(5)->links() }}
                </div>
            @endif
        </div>
    </section>

@endsection


@push('scripts')
    <script src="{{ asset('js/lightbox.js') }}"></script>
    <script src="{{ asset('js/opis.js') }}"></script>
@endpush
