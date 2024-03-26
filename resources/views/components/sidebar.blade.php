<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Nadilla's Resto POS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Menu</li>
            <li>
                <a href="{{ route('user.index') }}" class="nav-link"><i class="fas fa-users"></i><span>Users</span></a>
            </li>

            <li>
                <a href="{{ route('category.index') }}" class="nav-link"><i class="fas fa-box"></i><span>Categories</span></a>
            </li>

            <li>
                <a href="{{ route('product.index') }}" class="nav-link"><i class="fas fa-shopping-cart"></i><span>Products</span></a>
            </li>

            {{-- <li>
                <a href="{{ route('customer.index') }}" class="nav-link"><i class="fas fa-user"></i><span>Customers</span></a>
            </li>

            <li>
                <a href="{{ route('reservation.index')}}" class="nav-link"><i class="fas fa-calendar-alt"></i><span>Reservations</span></a>
            </li> --}}


    </aside>
</div>
