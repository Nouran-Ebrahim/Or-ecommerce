<li class="nav-item">
    <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#products" aria-controls="products" aria-expanded="true" aria-label="Toggle navigation">
        <span class="icon text-center">
            <i style="width: 20px;" class="fa-brands fa-palfed mx-2"></i>
        </span>
        <span class="text">{{ __('trans.Products') }}</span>
    </a>
    <ul id="products" class="dropdown-nav mx-4 collapse" style="">
        <li class="@if(str_contains(Route::currentRouteName(), 'products')) active @endif"><a href="{{ route('admin.products.index') }}">{{ __('trans.viewAll') }}</a></li>
        <li><a href="{{ route('admin.products.create') }}">{{ __('trans.add') }}</a></li>
        <li class="nav-item @if(str_contains(Route::currentRouteName(), 'sizes')) active @endif">
            <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#sizes" aria-controls="sizes" aria-expanded="true" aria-label="Toggle navigation">
                <span class="icon text-center">
                    <i style="width: 20px;" class="fa-solid fa-ruler-vertical mx-2"></i>
                </span>
                <span class="text">{{ __('trans.sizes') }}</span>
            </a>
            <ul id="sizes" class="dropdown-nav mx-4 collapse" style="">
                <li><a href="{{ route('admin.sizes.index') }}">{{ __('trans.viewAll') }}</a></li>
                <li><a href="{{ route('admin.sizes.create') }}">{{ __('trans.add') }}</a></li>
            </ul>
        </li>
        <li class="nav-item @if(str_contains(Route::currentRouteName(), 'colors')) active @endif">
            <a class="collapsed" href="#0" class="" data-bs-toggle="collapse" data-bs-target="#colors" aria-controls="colors" aria-expanded="true" aria-label="Toggle navigation">
                <span class="icon text-center">
                    <i style="width: 20px;" class="fa-solid fa-palette mx-2"></i>
                </span>
                <span class="text">{{ __('trans.colors') }}</span>
            </a>
            <ul id="colors" class="dropdown-nav mx-4 collapse" style="">
                <li><a href="{{ route('admin.colors.index') }}">{{ __('trans.viewAll') }}</a></li>
                <li><a href="{{ route('admin.colors.create') }}">{{ __('trans.add') }}</a></li>
            </ul>
        </li>
       
    </ul>
</li>
