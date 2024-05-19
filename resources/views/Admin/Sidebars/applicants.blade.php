<li class="nav-item @if(str_contains(Route::currentRouteName(), 'applicants')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#applicants" aria-controls="applicants" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-users mx-2"></i>
        </span>
        <span class="text">{{ __('trans.applicants') }}</span>
    </a>
    <ul id="applicants" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.applicants.index') }}">{{ __('trans.viewAll') }}</a></li>
    </ul>
</li>