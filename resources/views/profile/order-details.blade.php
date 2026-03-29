@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Szczegóły zamówienia #{{ $order->order_number }}</h2>
            <a href="{{ route('profile.orders') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-1"></i> Powrót
            </a>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Informacje o zamówieniu</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless mb-0">
                            <tr>
                                <th>Status:</th>
                                <td>
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
                                </td>
                            </tr>
                            <tr>
                                <th>Data zamówienia:</th>
                                <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Łączna kwota:</th>
                                <td><strong class="text-primary">{{ number_format($order->total_amount, 2) }} zł</strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Dane dostawy</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless mb-0">
                            <tr>
                                <th>Telefon:</th>
                                <td>{{ $order->phone }}</td>
                            </tr>
                            <tr>
                                <th>Adres:</th>
                                <td>{{ $order->full_shipping_address }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Produkty</h5>
            </div>
            <div class="card-body">
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
            </div>
        </div>
    </div>
@endsection
