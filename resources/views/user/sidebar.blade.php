<ul class="sidebar">
    <li>
        <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}"><i class="fa-solid fa-display"></i> Dashboard</a>
    </li>
    <li>
        <a href="{{ route('user.profile') }}" class="{{ request()->routeIs('user.profile') ? 'active' : '' }}"><i class="fa-solid fa-money-bill"></i> Profile</a>
    </li>
    <li>
        <a href="{{ route('user.booking') }}" class="{{ request()->routeIs('user.booking') ? 'active' : '' }}"><i class="fa-solid fa-calendar-days"></i> My Booking</a>
    </li>
    <li>
        <a href=""><i class="fa-solid fa-credit-card"></i> Payment</a>
    </li>
</ul>