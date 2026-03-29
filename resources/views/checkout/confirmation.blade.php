@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-check-circle text-success" style="font-size: 5rem;"></i>
                        <h2 class="mt-4">Dziękujemy za zamówienie!</h2>
                        <p class="text-muted">Numer zamówienia: <strong>{{ $order->order_number }}</strong></p>

                        <div class="alert alert-info mt-4">
                            <i class="bi bi-info-circle me-2"></i>
                            Potwierdzenie zamówienia zostało wysłane na adres email
                        </div>

                        <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                            Wróć do strony głównej
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
