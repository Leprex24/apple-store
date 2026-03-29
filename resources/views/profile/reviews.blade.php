@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <!-- Menu boczne -->
            <div class="col-md-3">
                @include('profile.partials.sidebar')
            </div>

            <!-- Główna zawartość -->
            <div class="col-md-9">
                <h2 class="mb-4">Moje opinie</h2>

                <!-- Produkty do oceny -->
                @if($productsToReview->isNotEmpty())
                    <div class="mb-5">
                        <h4 class="mb-3">Produkty oczekujące na opinię</h4>
                        @foreach($productsToReview as $product)
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            @if($product->images->first())
                                                <img src="{{ asset('images/' . $product->images->first()->image_path) }}"
                                                     alt="{{ $product->name }}"
                                                     class="img-fluid rounded"
                                                     style="max-height: 80px; object-fit: cover;">
                                            @endif
                                        </div>
                                        <div class="col-md-7">
                                            <h5 class="mb-1">{{ $product->name }}</h5>
                                            <p class="text-muted mb-0">{{ $product->category->name }}</p>
                                        </div>
                                        <div class="col-md-3 text-end">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewModal{{ $product->id }}">
                                                <i class="bi bi-star me-1"></i>
                                                Wystaw opinię
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal do dodawania opinii -->
                            <div class="modal fade" id="reviewModal{{ $product->id }}" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Dodaj opinię dla: {{ $product->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="{{ route('profile.review.store', $product->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <!-- Ocena gwiazdkowa -->
                                                <div class="mb-4 text-center">
                                                    <label class="form-label d-block mb-3">Ocena:</label>
                                                    <div class="star-rating" data-product-id="{{ $product->id }}">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <i class="bi bi-star star-icon" data-rating="{{ $i }}"></i>
                                                        @endfor
                                                    </div>
                                                    <input type="hidden" name="rating" id="rating{{ $product->id }}" required>
                                                </div>

                                                <!-- Treść opinii -->
                                                <div class="mb-3">
                                                    <label for="comment{{ $product->id }}" class="form-label">Twoja opinia:</label>
                                                    <textarea class="form-control" id="comment{{ $product->id }}" name="comment" rows="4" required placeholder="Podziel się swoją opinią o produkcie..."></textarea>
                                                </div>

                                                <!-- Zdjęcia -->
                                                <div class="mb-3">
                                                    <label for="images{{ $product->id }}" class="form-label">
                                                        Dodaj zdjęcia (opcjonalnie):
                                                        <small class="text-muted">Max 5 zdjęć</small>
                                                    </label>
                                                    <input type="file" class="form-control" id="images{{ $product->id }}" name="images[]" multiple accept="image/*">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="bi bi-check-lg me-1"></i>
                                                    Dodaj opinię
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Istniejące opinie -->
                <h4 class="mb-3">Moje opinie</h4>
                @if($reviews->isEmpty())
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        Nie wystawiłeś jeszcze żadnych opinii.
                    </div>
                @else
                    @foreach($reviews as $review)
                        <div class="card mb-4 shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        @if($review->product->images->first())
                                            <img src="{{ asset('images/' . $review->product->images->first()->image_path) }}"
                                                 alt="{{ $review->product->name }}"
                                                 class="img-fluid rounded"
                                                 style="max-height: 100px; object-fit: cover;">
                                        @endif
                                    </div>
                                    <div class="col-md-10">
                                        <div class="d-flex justify-content-between align-items-start mb-2">
                                            <div>
                                                <h5 class="mb-1">{{ $review->product->name }}</h5>
                                                <div class="text-warning mb-2">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        @if($i <= floor($review->rating))
                                                            <i class="bi bi-star-fill"></i>
                                                        @elseif($i - 0.5 == $review->rating)
                                                            <i class="bi bi-star-half"></i>
                                                        @else
                                                            <i class="bi bi-star"></i>
                                                        @endif
                                                    @endfor
                                                    <span class="text-muted ms-1">({{ $review->rating }}/5)</span>
                                                </div>
                                            </div>
                                            <small class="text-muted">{{ $review->created_at->format('d.m.Y') }}</small>
                                        </div>

                                        <p class="mb-3">{{ $review->comment }}</p>

                                        @if($review->images->isNotEmpty())
                                            <div class="d-flex gap-2 flex-wrap">
                                                @foreach($review->images as $image)
                                                    <img src="{{ asset('storage/' . $image->image_path) }}"
                                                         alt="Zdjęcie opinii"
                                                         class="rounded"
                                                         style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;"
                                                         data-bs-toggle="modal"
                                                         data-bs-target="#imageModal{{ $image->id }}">

                                                    <!-- Modal do wyświetlania pełnego zdjęcia -->
                                                    <div class="modal fade" id="imageModal{{ $image->id }}" tabindex="-1">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-body p-0">
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
                            </div>
                        </div>
                    @endforeach

                    <!-- Paginacja -->
                    <div class="d-flex justify-content-center">
                        {{ $reviews->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .star-rating {
            font-size: 2rem;
            cursor: pointer;
        }
        .star-icon {
            color: #ddd;
            transition: color 0.2s;
        }
        .star-icon:hover,
        .star-icon.active {
            color: #ffc107;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.querySelectorAll('.star-rating').forEach(ratingDiv => {
            const productId = ratingDiv.dataset.productId;
            const stars = ratingDiv.querySelectorAll('.star-icon');
            const input = document.getElementById('rating' + productId);

            stars.forEach((star, index) => {
                star.addEventListener('click', () => {
                    const rating = index + 1;
                    input.value = rating;

                    stars.forEach((s, i) => {
                        if (i < rating) {
                            s.classList.add('active');
                            s.classList.remove('bi-star');
                            s.classList.add('bi-star-fill');
                        } else {
                            s.classList.remove('active');
                            s.classList.remove('bi-star-fill');
                            s.classList.add('bi-star');
                        }
                    });
                });

                star.addEventListener('mouseenter', () => {
                    stars.forEach((s, i) => {
                        if (i <= index) {
                            s.classList.remove('bi-star');
                            s.classList.add('bi-star-fill');
                        }
                    });
                });
            });

            ratingDiv.addEventListener('mouseleave', () => {
                const currentRating = input.value;
                stars.forEach((s, i) => {
                    if (i < currentRating) {
                        s.classList.add('bi-star-fill');
                        s.classList.remove('bi-star');
                    } else {
                        s.classList.remove('bi-star-fill');
                        s.classList.add('bi-star');
                    }
                });
            });
        });
    </script>
@endpush
