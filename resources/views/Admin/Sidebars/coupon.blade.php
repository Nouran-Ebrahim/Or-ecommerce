<li class="nav-item @if (str_contains(Route::currentRouteName(), 'coupons')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#coupons"
        aria-controls="coupons" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-tags mx-2"></i>
        </span>
        <span class="text">{{ __('trans.coupons') }}</span>
    </a>
    <ul id="coupons" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.coupons.index') }}">{{ __('trans.viewAll') }}</a></li>
        <li><a href="{{ route('admin.coupons.create') }}">{{ __('trans.add') }}</a></li>
    </ul>
</li>