<ul class="sidebar">
    <li>
        <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}"><i class="fa-solid fa-display"></i> Dashboard</a>
    </li>
    <li>
        <a href="{{ route('user.profile') }}" class="{{ request()->routeIs('user.profile') ? 'active' : '' }}"><i class="fa-solid fa-money-bill"></i> Profile</a>
    </li>
    <li>
        <a href="{{ route('user.booking.get') }}" class="{{ request()->routeIs('user.booking.get') ? 'active' : '' }}"><i class="fa-solid fa-calendar-days"></i> My Booking</a>
    </li>
    <li>
        <a href="javascript:;" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
    </li>
</ul>