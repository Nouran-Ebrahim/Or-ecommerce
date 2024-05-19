{{-- <div class="py-5 container-lg" style="background: #686868;max-width: 100% !important;">
    <div class="row justify-content-between" >
        <div class="col-md-2 col-12 d-flex ">
            <ul class="p-0 fs-6 ">
                <li class="py-1">
                    <a href="{{ route('client.home') }}" class="text-white">
                        @lang('trans.Home')
                    </a>
                </li>
                <li class="py-1">
                    <a href="{{ route('client.about') }}" class="text-white">
                        @lang('trans.about_us')
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-2 col-12 ">
            <ul class="p-0 fs-6 ">
                <li class="py-1">
                    <a href="{{ route('client.product_care') }}" class="text-white">
                        @lang('trans.product_care')
                    </a>
                </li>
                <li class="py-1">
                    <a href="{{ route('client.terms') }}" class="text-white">
                        @lang('trans.terms')
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-2 col-12 d-flex ">
            <ul class="p-0 fs-6 ">
                <li class="py-1">
                    <a role="button" data-bs-toggle="modal" data-bs-target="#filter" class="text-white">
                        @lang('trans.SizeGuide')
                    </a>
                </li>
                <li class="py-1">
                    <a href="{{ route('client.privacy') }}" class="text-white">
                        @lang('trans.privacy')
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-2 col-12 d-flex ">
            <ul class="p-0 fs-6 ">
                <li class="py-1">
                    <a href="{{ route('client.contact') }}" class="text-white">
                        @lang('trans.contact_us')
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-3 col-12">
            <h4 class="p-lg-2 py-2 text-white fs-6">
                @lang('trans.Get_in_Touch')
            </h4>
            <ul class="social d-flex p-0">
                @foreach (SocialMediaIcons()->sortBy('icon') as $item)
                    <li>
                        <a href="{{ $item->link }}" class="main_link mx-2" aria-hidden="true">
                            <span>
                                @if (str_contains($item->icon, 'emcan'))
                                    <img style="width: 20px;border-radius: 50%;" alt="{{ str_replace('fa-brands', '', str_replace('fa-solid', '', str_replace('fa-regular', '', str_replace(' ', '-', $item->name)))) }}" class="h4 mx-2 point" src='{{ $item->icon }}'/>
                                @else
                                    <i class="h4 mx-2 point pt-2 {{ $item->icon }} icon"></i>
                                @endif
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-7 col-12 text-center fs-6 border-top py-2 text-uppercase">
            @Bymariams
        </div>
        <div class="col-md-7 col-12 text-center  emcan">
            @lang('trans.copyrights') <span class=""> <a class="text-white" href="https://www.instagram.com/by.mariams">Mariams</a> </span>
        </div>

    </div>

</div>
<div class="modal fade " id="filter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

                    <div class="row fs-6">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Size (uS)</th>
                                    <th scope="col">Size # (uS)</th>
                                    <th scope="col">Bust (in)</th>
                                    <th scope="col">Waist (in)</th>
                                    <th scope="col">Hips (in)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>XS</td>
                                    <td>2-4</td>
                                    <td>30-33</td>
                                    <td>22-25</td>
                                    <td>@32-35</td>

                                </tr>
                                <tr>
                                    <td>S</td>
                                    <td>2-4</td>
                                    <td>30-33</td>
                                    <td>22-25</td>
                                    <td>@32-35</td>

                                </tr>
                                <tr>
                                    <td>M</td>
                                    <td>2-4</td>
                                    <td>30-33</td>
                                    <td>22-25</td>
                                    <td>@32-35</td>
                                </tr>
                                <tr>
                                    <td>l</td>
                                    <td>2-4</td>
                                    <td>30-33</td>
                                    <td>22-25</td>
                                    <td>@32-35</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<body>
    <footer class="container" id="footer">

        {{-- <h2 class="mt-5">NEWSLETTER</h2>
    <form>
        <input type="email" class="newsletter-input" placeholder="Enter your email address " />
        <button class="btn arrow-btn">
            <img src="./assets/footer/arrow-right.png" alt />
        </button>
    </form> --}}
        {{-- <p class="note">
        You may unsubscribe at any time. To find out more, please visit our
        <a href>Privacy Policy.</a>
    </p> --}}
        <div class="footer-grid container">
            <div class="row">
                <div class="col-lg col-12">
                    <h4>@lang('trans.CUSTOMER CARE')</h4>
                    <ul>
                        <li><a href="{{ route('client.faq') }}">@lang('trans.FAQ')</a></li>
                        <li><a href="{{ route('client.return_refund_policy') }}">@lang('trans.Exchange and return')</a></li>
                        <li><a href="{{ route('client.shipping_policy') }}">@lang('trans.Shipping policies')</a></li>
                        {{-- <li><a href="{{ route('client.profile') }}">@lang('trans.My account')</a></li> --}}
                    </ul>
                </div>
                <div class="col-lg col-12">
                    <h4>@lang('trans.THE COMPANY')</h4>
                    <ul>
                        <li><a href="{{ route('client.vacancy') }}">@lang('trans.careers')</a></li>
                        <li><a href="{{ route('client.terms') }}">@lang('trans.Terms of services')</a></li>
                    </ul>
                </div>
                <div class="col-lg col-12">
                    <h4>@lang('trans.My account')</h4>
                    <ul>
                        <li><a href="{{ route('client.profile') }}">@lang('trans.My Profile')</a></li>
                        <li><a href="{{ route('client.cart') }}">@lang('trans.orders')</a></li>
                        <li><a href="{{ route('client.address.index') }}">@lang('trans.address')</a></li>
                        {{-- <li><a href="profile.html">Edit Profile</a></li> --}}
                    </ul>
                </div>
                <div class="col-lg col-12">
                    <h4>@lang('trans.about_us')</h4>
                    <ul>
                        <li><a href="{{ route('client.about') }}">@lang('trans.about_us')</a></li>
                        <li><a href="{{ route('client.contactUs') }}">@lang('trans.contact_us')</a></li>
                    </ul>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{ route('client.home') }}"> <img src="{{ asset(setting('logo_dark')) }}"
                            alt="logo" /></a>
                </div>
            </div>
            {{-- <div class>
            <h4>EXPPLORE</h4>
            <ul>
                <li><a href>Classic Abayas</a></li>
                <li><a href>Modern Abayas</a></li>
                <li><a href>Casual Abayas</a></li>
                <li><a href>Occasion Wear</a></li>
            </ul>
        </div> --}}



        </div>
        {{-- <div class="logo-img-box text-center my-5">
        <img src="{{asset(setting('logo_dark'))}}" alt="logo" />
    </div> --}}
        <div class="hr-line"></div>
        <div class="footer-nav d-flex justify-content-between my-5">
            <ul class="navbar">
                <li><a href="{{ route('client.vacancy') }}">@lang('trans.careers')</a></li>
                <li><a href="{{ route('client.contactUs') }}">@lang('trans.contact_us')</a></li>
                <li><a href="{{ route('client.terms') }}">@lang('trans.Terms of services')</a></li>
                <li><a href="{{ route('client.privacy') }}">@lang('trans.Privacy Policy')</a></li>
            </ul>
            <ul class="social-media">
                @foreach(SocialMediaIcons() as $data)
                <li>
                    <a href="{{$data->link}}">
                        <div style="font-size: 25px" class="social-icon-image-box">
                            <i class="{{$data->icon}}" ></i>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </footer>
</body>
