<div class="list-group">
    <a href="{{ route('profile.dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.dashboard') ? 'active' : '' }}">
        <i class="bi bi-house-door me-2"></i> Panel główny
    </a>
    <a href="{{ route('profile.orders') }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.orders') ? 'active' : '' }}">
        <i class="bi bi-bag me-2"></i> Moje zamówienia
    </a>
    <a href="{{ route('profile.reviews') }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.reviews') ? 'active' : '' }}">
        <i class="bi bi-star me-2"></i> Moje opinie
    </a>
    <a href="{{ route('profile.shipping-details') }}" class="list-group-item list-group-item-action {{ request()->routeIs('profile.shipping-details') ? 'active' : '' }}">
        <i class="bi bi-truck me-2"></i> Dane do zamówienia
    </a>

    @if(auth()->user()->is_admin)
        <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action {{ request()->routeIs('admin.dashboard') ? 'active' : '' }} bg-danger text-white">
            <i class="bi bi-shield-lock me-2"></i> Panel admina
        </a>
    @endif

    <form method="POST" action="{{ route('logout') }}" class="d-inline">
        @csrf
        <button type="submit" class="list-group-item list-group-item-action text-danger">
            <i class="bi bi-box-arrow-right me-2"></i> Wyloguj się
        </button>
    </form>
</div>
