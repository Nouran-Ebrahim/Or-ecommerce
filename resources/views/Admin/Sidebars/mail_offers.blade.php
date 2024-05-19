<li class="nav-item @if(str_contains(Route::currentRouteName(), 'offers')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#offers" aria-controls="offers" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-percent   mx-2"></i>
        </span>
        <span class="text">{{ __('trans.offers') }}</span>
    </a>
    <ul id="offers" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.mail_offer.create') }}">{{ __('trans.add') }}</a></li>
    </ul>
</li>