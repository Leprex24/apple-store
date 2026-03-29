@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/item.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <section class="h-100 h-custom bg-black">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <!-- Koszyk -->
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0">Koszyk</h1>
                                            <h6 class="mb-0 text-muted" id="items-count">
                                                {{ $items->sum('quantity') }} {{ Str::plural('produkt', $items->sum('quantity')) }}
                                            </h6>
                                        </div>

                                        <div id="cart-items">
                                            @forelse($items as $item)
                                                <div class="row mb-4 d-flex justify-content-between align-items-center border-bottom pb-3">
                                                    <!-- Zdjęcie -->
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        @if($item->product->primaryImage)
                                                            <img src="{{ asset('images/' . $item->product->primaryImage->image_path) }}"
                                                                 class="img-fluid rounded-3" alt="{{ $item->product->name }}">
                                                        @endif
                                                    </div>

                                                    <!-- Nazwa produktu -->
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-muted mb-1">Produkt</h6>
                                                        <h6 class="mb-0">{{ $item->product->name }}</h6>
                                                    </div>

                                                    <!-- Ilość -->
                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex align-items-center">
                                                        <button class="btn btn-link px-2" onclick="changeQuantity({{ $item->id }}, -1)">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <input type="number" min="1" value="{{ $item->quantity }}"
                                                               class="form-control form-control-sm text-center quantity-input"
                                                               data-cart-item-id="{{ $item->id }}" />
                                                        <button class="btn btn-link px-2" onclick="changeQuantity({{ $item->id }}, 1)">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>

                                                    <!-- Cena -->
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h6 class="mb-0">{{ number_format($item->product->price * $item->quantity, 2) }} zł</h6>
                                                    </div>

                                                    <!-- Usuń -->
                                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                        <button class="btn btn-danger btn-sm remove-item" data-cart-item-id="{{ $item->id }}">
                                                            <i class="bi-trash-fill"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            @empty
                                                <div class="empty-cart-message text-center py-5">
                                                    <i class="bi bi-cart-x display-1 text-muted"></i>
                                                    <h4 class="mt-3">Koszyk jest pusty</h4>
                                                    <p>Dodaj produkty, aby kontynuować zakupy.</p>
                                                    <a href="{{ route('shop.featured') }}" class="btn btn-primary">Przejdź do sklepu</a>
                                                </div>
                                            @endforelse
                                        </div>

                                        <div class="pt-5">
                                            <h6 class="mb-0">
                                                <a href="{{ route('shop.featured') }}" class="text-body">
                                                    <i class="fas fa-long-arrow-alt-left me-2"></i>Kontynuuj zakupy
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>

                                <!-- Podsumowanie -->
                                <div class="col-lg-4 bg-body-tertiary">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Podsumowanie</h3>

                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">Produkty</h5>
                                            <h5 id="subtotal">{{ number_format($subtotal, 2) }} zł</h5>
                                        </div>

                                        <h5 class="text-uppercase mb-3">Dostawa</h5>
                                        <div class="mb-4 pb-2">
                                            <p class="mb-0"><strong>Standardowa:</strong> 10.00 zł</p>
                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Razem</h5>
                                            <h5 id="total">{{ number_format($subtotal + 10, 2) }} zł</h5>
                                        </div>

                                        @if($items->isNotEmpty())
                                            <button type="button" class="btn btn-primary btn-block btn-lg"
                                                    data-bs-toggle="modal" data-bs-target="#checkoutModal">
                                                Przejdź do kasy
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal dane do wysyłki -->
    <div class="modal fade" id="checkoutModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Dane do dostawy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="checkoutForm" action="{{ route('checkout.process') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ auth()->user()->email ?? '' }}" required>
                            <small class="text-muted">Na ten adres otrzymasz potwierdzenie zamówienia</small>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">Imię <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                       value="{{ $shippingAddress->first_name ?? '' }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Nazwisko <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                       value="{{ $shippingAddress->last_name ?? '' }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefon <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                   value="{{ $shippingAddress->phone ?? '' }}" placeholder="123 456 789" required>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="street" class="form-label">Ulica <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="street" name="street"
                                       value="{{ $shippingAddress->street ?? '' }}" required>
                            </div>
                            <div class="col-md-3">
                                <label for="building_number" class="form-label">Nr budynku <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="building_number" name="building_number"
                                       value="{{ $shippingAddress->building_number ?? '' }}" required>
                            </div>
                            <div class="col-md-3">
                                <label for="apartment_number" class="form-label">Nr mieszkania</label>
                                <input type="text" class="form-control" id="apartment_number" name="apartment_number"
                                       value="{{ $shippingAddress->apartment_number ?? '' }}" placeholder="opcjonalnie">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="postal_code" class="form-label">Kod pocztowy <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code"
                                       value="{{ $shippingAddress->postal_code ?? '' }}" placeholder="00-000" required>
                            </div>
                            <div class="col-md-8">
                                <label for="city" class="form-label">Miasto <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="city" name="city"
                                       value="{{ $shippingAddress->city ?? '' }}" required>
                            </div>
                        </div>

                        @auth
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="save_address" name="save_address" value="1">
                                <label class="form-check-label" for="save_address">
                                    Zapisz dane do przyszłych zamówień
                                </label>
                            </div>
                        @endauth
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                        <button type="submit" class="btn btn-primary">Złóż zamówienie</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        async function changeQuantity(cartItemId, change) {
            const input = document.querySelector(`input[data-cart-item-id="${cartItemId}"]`);
            let newQuantity = parseInt(input.value) + change;

            if (newQuantity < 1) newQuantity = 1;

            await updateQuantity(cartItemId, newQuantity);
        }

        async function updateQuantity(cartItemId, quantity) {
            try {
                const response = await fetch(`/koszyk/aktualizuj/${cartItemId}`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ quantity })
                });

                if (response.ok) {
                    location.reload();
                }
            } catch (error) {
                alert('Wystąpił błąd podczas aktualizacji');
            }
        }

        document.querySelectorAll('.remove-item').forEach(btn => {
            btn.addEventListener('click', async function() {
                const cartItemId = this.dataset.cartItemId;

                if (!confirm('Czy na pewno chcesz usunąć ten produkt?')) return;

                try {
                    const response = await fetch(`/koszyk/usun/${cartItemId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    });

                    if (response.ok) {
                        location.reload();
                    }
                } catch (error) {
                    alert('Wystąpił błąd podczas usuwania produktu');
                }
            });
        });
    </script>
@endpush
