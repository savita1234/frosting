<div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white sidebar" id="sidebar">
    <a href="{{ route('dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">My App</span>
    </a>
    <hr>

    @if(auth()->user()->shop)
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link text-white">
                    <i class="bi bi-house-door"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('daily-sales') }}" class="nav-link text-white">
                    <i class="bi bi-house-door"></i> Daily Sales
                </a>
            </li>
            <li>
                <a href="{{ route('orders') }}" class="nav-link text-white">
                    <i class="bi bi-cart"></i> Orders
                </a>
            </li>
            <li>
                <a href="{{ route('products') }}" class="nav-link text-white">
                    <i class="bi bi-box"></i> Products
                </a>
            </li>
        </ul>
    @else
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <a href="{{ route('user.shopDetails') }}" class="nav-link text-warning">
                    <i class="bi bi-shop"></i> Register Your Shop
                </a>
            </li>
        </ul>
    @endif

    <hr>
    <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</div>
