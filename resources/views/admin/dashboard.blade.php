@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4"><i class="bi bi-speedometer2 me-2"></i>Panel Administratora</h1>
            </div>
        </div>

        <!-- Statystyki -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title text-uppercase mb-0">Użytkownicy</h6>
                                <h2 class="mb-0">{{ $usersCount }}</h2>
                            </div>
                            <i class="bi bi-people fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title text-uppercase mb-0">Zamówienia</h6>
                                <h2 class="mb-0">{{ $ordersCount }}</h2>
                            </div>
                            <i class="bi bi-cart-check fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-info mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title text-uppercase mb-0">Produkty</h6>
                                <h2 class="mb-0">{{ $productsCount }}</h2>
                            </div>
                            <i class="bi bi-box-seam fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title text-uppercase mb-0">Opinie</h6>
                                <h2 class="mb-0">{{ $reviewsCount }}</h2>
                            </div>
                            <i class="bi bi-star fs-1 opacity-50"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Zakładki -->
        <ul class="nav nav-tabs mb-4" id="adminTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button">
                    <i class="bi bi-bag-check me-1"></i> Zamówienia
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button">
                    <i class="bi bi-star me-1"></i> Opinie
                </button>
            </li>
        </ul>

        <div class="tab-content" id="adminTabsContent">
            <!-- Zakładka Zamówienia -->
            <div class="tab-pane fade show active" id="orders" role="tabpanel">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-list-ul me-2"></i>Lista zamówień</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                <tr>
                                    <th>Numer</th>
                                    <th>Klient</th>
                                    <th>Data</th>
                                    <th>Kwota</th>
                                    <th>Status</th>
                                    <th class="text-center">Akcje</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td><strong>#{{ $order->order_number }}</strong></td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                                        <td><strong>{{ number_format($order->total_amount, 2) }} zł</strong></td>
                                        <td>
                                            <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status" class="form-select form-select-sm status-select" data-order-id="{{ $order->id }}" onchange="this.form.submit()">
                                                    @foreach(\App\Models\Order::getStatuses() as $key => $label)
                                                        <option value="{{ $key }}" {{ $order->status === $key ? 'selected' : '' }}>
                                                            {{ $label }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary" title="Szczegóły">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted py-4">Brak zamówień</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Zakładka Opinie -->
            <div class="tab-pane fade" id="reviews" role="tabpanel">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0"><i class="bi bi-chat-square-text me-2"></i>Lista opinii</h5>
                    </div>
                    <div class="card-body">
                        @forelse($reviews as $review)
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div class="flex-grow-1">
                                            <div class="d-flex align-items-center mb-2">
                                                <strong class="me-2">{{ $review->user->name }}</strong>
                                                <span class="text-warning">
                                                @for($i = 1; $i <= 5; $i++)
                                                        <i class="bi bi-star{{ $i <= $review->rating ? '-fill' : '' }}"></i>
                                                    @endfor
                                            </span>
                                                <small class="text-muted ms-2">{{ $review->created_at->diffForHumans() }}</small>
                                            </div>
                                            <p class="mb-2"><strong>Produkt:</strong>
                                                <a href="{{ route('products.show', $review->product->slug) }}" target="_blank">
                                                    {{ $review->product->name }}
                                                </a>
                                            </p>
                                            <p class="mb-0">{{ $review->comment }}</p>

                                            @if($review->images->count() > 0)
                                                <div class="mt-2">
                                                    @foreach($review->images as $image)
                                                        <img src="{{ asset('storage/' . $image->image_path) }}"
                                                             alt="Zdjęcie opinii"
                                                             class="rounded me-2"
                                                             style="width: 60px; height: 60px; object-fit: cover;">
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>

                                        <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST"
                                              onsubmit="return confirm('Czy na pewno chcesz usunąć tę opinię?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i> Usuń
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-muted py-4">Brak opinii</p>
                        @endforelse

                        <div class="mt-3">
                            {{ $reviews->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const statusSelects = document.querySelectorAll('.status-select');

            statusSelects.forEach(select => {
                const originalValue = select.value;

                select.addEventListener('change', function() {
                    if (!confirm('Czy na pewno chcesz zmienić status zamówienia?')) {
                        this.value = originalValue;
                        return false;
                    }
                });
            });
        });
    </script>
@endpush
