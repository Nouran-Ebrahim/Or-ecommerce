<li class="nav-item @if(str_contains(Route::currentRouteName(), 'vacancy')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#vacancy" aria-controls="vacancy" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa fa-images mx-2"></i>
        </span>
        <span class="text">{{ __('trans.vacancy') }}</span>
    </a>
    <ul id="vacancy" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.vacancy.index') }}">{{ __('trans.viewAll') }}</a></li>
        <li><a href="{{ route('admin.vacancy.create') }}">{{ __('trans.add') }}</a></li>
    </ul>
</li>
