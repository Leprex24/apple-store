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
                <h2 class="mb-4">Panel użytkownika</h2>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Zamówienia</h5>
                                <p class="display-6">{{ auth()->user()->orders()->count() }}</p>
                                <a href="{{ route('profile.orders') }}" class="btn btn-primary">Zobacz</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Opinie</h5>
                                <p class="display-6">{{ auth()->user()->reviews()->count() }}</p>
                                <a href="{{ route('profile.reviews') }}" class="btn btn-primary">Zobacz</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Dane do zamówienia</h5>
                                @if(auth()->user()->shippingAddress)
                                    <p class="text-muted">Aktualizuj dane</p>
                                    <a href="{{ route('profile.shipping-details') }}" class="btn btn-primary">Edytuj</a>
                                @else
                                    <p class="text-muted">Dodaj dane</p>
                                    <a href="{{ route('profile.shipping-details') }}" class="btn btn-primary">Dodaj</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
