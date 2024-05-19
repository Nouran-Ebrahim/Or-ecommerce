@if (lang('en'))
<li class="nav-item">
    <a href="{{ route('lang', 'ar') }}">
        <span class="icon text-center">
            <img src="{{ asset(Country()->image) }}" style="width: 20px;" class="mx-2">
        </span>
        <span class="text">Arabic</span>
    </a>
</li>
@else
<li class="nav-item">
    <a href="{{ route('lang', 'en') }}">
        <span class="icon text-center">
            <img src="{{ asset('language/en.png') }}" style="border-radius: 50%;width: 20px;" class="mx-2">
        </span>
        <span class="text">English</span>
    </a>
</li>
@endif
<li class="nav-item">
    <a href="{{ route('admin.logout') }}">
        <span class="icon text-center">
            <i class="lni lni-exit mx-2"></i>
        </span>
        <span class="text">{{ __('trans.logout') }}</span>
    </a>
</li>