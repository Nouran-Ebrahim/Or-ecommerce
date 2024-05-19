<li class="nav-item @if(str_contains(Route::currentRouteName(), 'banner')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#banner" aria-controls="banner" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa fa-images mx-2"></i>
        </span>
        <span class="text">{{ __('trans.banner') }}</span>
    </a>
    <ul id="banner" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.banner.index') }}">{{ __('trans.viewAll') }}</a></li>
        <li><a href="{{ route('admin.banner.create') }}">{{ __('trans.add') }}</a></li>
    </ul>
</li>
