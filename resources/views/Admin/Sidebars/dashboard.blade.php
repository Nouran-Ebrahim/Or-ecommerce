<li class="nav-item @if(str_contains(Route::currentRouteName(), 'home')) active @endif">
    <a href="{{ route('admin.home') }}">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-chart-simple mx-2"></i>
        </span>
        <span class="text">{{ __('trans.dashboardTitle') }}</span>
    </a>
</li>
