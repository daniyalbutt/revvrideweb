<ul class="sidebar">
    <li>
        <a href="{{ route('vendor.dashboard') }}" class="{{ request()->routeIs('vendor.dashboard') ? 'active' : '' }}"><i class="fa-solid fa-display"></i> Dashboard</a>
    </li>
    <li>
        <a href="{{ route('vendor.rental.index') }}" class="{{ request()->routeIs('vendor.rental.*') ? 'active' : '' }}"><i class="fa-solid fa-money-bill"></i> Rental</a>
    </li>
    <li>
        <a href="{{ route('vendor.tour.index') }}" class="{{ request()->routeIs('vendor.tour.*') ? 'active' : '' }}"><i class="fa-solid fa-plane-circle-check"></i> Tours</a>
    </li>
    <li>
        <a href="{{ route('vendor.reservations') }}" class="{{ request()->routeIs('vendor.reservations') ? 'active' : '' }}"><i class="fa-solid fa-calendar-days"></i> Reservations</a>
    </li>
    <li>
        <a href="{{ route('vendor.payment') }}" class="{{ request()->routeIs('vendor.payment') ? 'active' : '' }}"><i class="fa-solid fa-credit-card"></i> Payment</a>
    </li>
    <li>
        <a href="{{ route('vendor.withdraw') }}" class="{{ request()->routeIs('vendor.withdraw') || request()->routeIs('vendor.withdraw.*') ? 'active' : '' }}"><i class="fa-solid fa-money-check-dollar"></i> Withdraw a Request</a>
    </li>
</ul>
