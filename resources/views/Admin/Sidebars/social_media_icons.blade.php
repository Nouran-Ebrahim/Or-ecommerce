<li class="nav-item @if(str_contains(Route::currentRouteName(), 'social_media_icons')) active @endif">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#social_media_icons" aria-controls="social_media_icons" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-solid fa-circle-info mx-2"></i>
        </span>
        <span class="text">{{ __('trans.SocialMediaIcon') }}</span>
    </a>
    <ul id="social_media_icons" class="dropdown-nav mx-4 collapse" style="">
        <li><a href="{{ route('admin.social_media_icons.index') }}">{{ __('trans.viewAll') }}</a></li>
        <li><a href="{{ route('admin.social_media_icons.create') }}">{{ __('trans.add') }}</a></li>
    </ul>
</li>