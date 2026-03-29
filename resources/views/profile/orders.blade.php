@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <!-- Nawigacja -->
            <div class="col-md-3 mb-4">
                @include('profile.partials.sidebar')
            </div>

            <div class="col-md-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2>Moje zamówienia</h2>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($orders->isEmpty())
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        Nie masz jeszcze żadnych zamówień.
                    </div>
                @else
                    <div class="row">
                        @foreach($orders as $order)
                            <div class="col-12 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-header bg-white py-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-4">
                                                <strong>Zamówienie #{{ $order->order_number }}</strong>
                                            </div>
                                            <div class="col-md-4 text-center">
                                                @php
                                                    $statusColors = [
                                                        'pending' => 'warning',
                                                        'paid' => 'info',
                                                        'processing' => 'primary',
                                                        'shipped' => 'secondary',
                                                        'delivered' => 'success',
                                                        'completed' => 'success',
                                                        'cancelled' => 'danger',
                                                        'refunded' => 'dark'
                                                    ];
                                                    $color = $statusColors[$order->status] ?? 'secondary';
                                                @endphp
                                                <span class="badge bg-{{ $color }}">{{ $order->status_name }}</span>
                                            </div>
                                            <div class="col-md-4 text-md-end">
                                                <small class="text-muted">{{ $order->created_at->format('d.m.Y H:i') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <p class="mb-1"><strong>Łączna kwota:</strong> {{ number_format($order->total_amount, 2) }} zł</p>
                                                <p class="mb-0"><strong>Produkty:</strong> {{ $order->items->count() }}</p>
                                            </div>
                                            <div class="col-md-6 text-md-end">
                                                <p class="mb-0"><strong>Adres dostawy:</strong><br>
                                                    {{ $order->full_shipping_address }}
                                                </p>
                                            </div>
                                        </div>

                                        <hr>

                                        <h6 class="mb-3">Produkty:</h6>
                                        @foreach($order->items as $item)
                                            <div class="d-flex align-items-center mb-3 p-3 bg-light rounded">
                                                @if($item->product->primaryImage)
                                                    <img src="{{ asset('images/' . $item->product->primaryImage->image_path) }}"
                                                         alt="{{ $item->product->name }}"
                                                         class="rounded me-3"
                                                         style="width: 80px; height: 80px; object-fit: cover;">
                                                @endif
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-1">{{ $item->product->name }}</h6>
                                                    <small class="text-muted">Ilość: {{ $item->quantity }} × {{ number_format($item->price, 2) }} zł</small>
                                                </div>
                                                <strong>{{ number_format($item->price * $item->quantity, 2) }} zł</strong>
                                            </div>
                                        @endforeach

                                        <div class="text-end mt-3">
                                            <a href="{{ route('profile.order.details', $order) }}" class="btn btn-outline-primary">
                                                <i class="bi bi-eye me-1"></i> Szczegóły zamówienia
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $orders->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
