<li class="nav-item @if(str_contains(Route::currentRouteName(), 'countries')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#countries" aria-controls="countries" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-earth-asia mx-2"></i>
        </span>
        <span class="text">{{ __('trans.Countries') }}</span>
    </a>
    <ul id="countries" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.countries.index') }}">{{ __('trans.viewAll') }}</a></li>
    </ul>
</li>