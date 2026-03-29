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
                <h2 class="mb-4">Dane do zamówienia</h2>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($shippingAddress)
                    <!-- Wyświetlanie istniejących danych -->
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-white py-3">
                            <h5 class="mb-0">Twoje dane adresowe</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Imię i nazwisko:</strong></p>
                                    <p class="text-muted">{{ $shippingAddress->first_name }} {{ $shippingAddress->last_name }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1"><strong>Telefon:</strong></p>
                                    <p class="text-muted">{{ $shippingAddress->phone }}</p>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <p class="mb-1"><strong>Adres:</strong></p>
                                    <p class="text-muted">
                                        {{ $shippingAddress->street }} {{ $shippingAddress->building_number }}{{ $shippingAddress->apartment_number ? '/' . $shippingAddress->apartment_number : '' }}<br>
                                        {{ $shippingAddress->postal_code }} {{ $shippingAddress->city }}
                                    </p>
                                </div>
                            </div>

                            <div class="d-flex gap-2">
                                <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#editForm">
                                    <i class="bi bi-pencil me-1"></i>Edytuj
                                </button>
                                <form action="{{ route('profile.shipping-details.delete') }}" method="POST" onsubmit="return confirm('Czy na pewno chcesz usunąć dane adresowe?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash me-1"></i>Usuń
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Formularz edycji (ukryty domyślnie) -->
                    <div class="collapse" id="editForm">
                        @endif

                        @if(!$shippingAddress || true)
                            <div class="card shadow-sm">
                                <div class="card-header bg-white py-3">
                                    <h5 class="mb-0">{{ $shippingAddress ? 'Edytuj dane' : 'Dodaj dane adresowe' }}</h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('profile.shipping-details.store') }}" method="POST">
                                        @csrf

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="first_name" class="form-label">Imię <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                                       id="first_name" name="first_name"
                                                       value="{{ old('first_name', $shippingAddress->first_name ?? '') }}" required>
                                                @error('first_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <label for="last_name" class="form-label">Nazwisko <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                                       id="last_name" name="last_name"
                                                       value="{{ old('last_name', $shippingAddress->last_name ?? '') }}" required>
                                                @error('last_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Numer telefonu <span class="text-danger">*</span></label>
                                            <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                                   id="phone" name="phone"
                                                   value="{{ old('phone', $shippingAddress->phone ?? '') }}"
                                                   placeholder="np. 123 456 789" required>
                                            @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <label for="street" class="form-label">Ulica <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('street') is-invalid @enderror"
                                                       id="street" name="street"
                                                       value="{{ old('street', $shippingAddress->street ?? '') }}" required>
                                                @error('street')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="building_number" class="form-label">Nr budynku <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('building_number') is-invalid @enderror"
                                                       id="building_number" name="building_number"
                                                       value="{{ old('building_number', $shippingAddress->building_number ?? '') }}" required>
                                                @error('building_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <label for="apartment_number" class="form-label">Nr mieszkania</label>
                                                <input type="text" class="form-control @error('apartment_number') is-invalid @enderror"
                                                       id="apartment_number" name="apartment_number"
                                                       value="{{ old('apartment_number', $shippingAddress->apartment_number ?? '') }}">
                                                @error('apartment_number')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <label for="postal_code" class="form-label">Kod pocztowy <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('postal_code') is-invalid @enderror"
                                                       id="postal_code" name="postal_code"
                                                       value="{{ old('postal_code', $shippingAddress->postal_code ?? '') }}"
                                                       placeholder="00-000" required>
                                                @error('postal_code')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-8">
                                                <label for="city" class="form-label">Miasto <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('city') is-invalid @enderror"
                                                       id="city" name="city"
                                                       value="{{ old('city', $shippingAddress->city ?? '') }}" required>
                                                @error('city')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="bi bi-save me-1"></i>Zapisz
                                            </button>
                                            @if($shippingAddress)
                                                <button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#editForm">
                                                    Anuluj
                                                </button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif

                        @if($shippingAddress)
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
