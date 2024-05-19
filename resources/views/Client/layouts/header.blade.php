{{-- <nav class=" bg-white shadow-sm py-2 w-100 position-fixed" style="z-index: 999;">
    <div class="container nav d-block  navbar-expand-lg bg-body-tertiary ">
        <div class="row align-items-center">
            <div class="col-lg-4 col-2 d-flex justify-content-lg-start justify-content-center">
                <a class=" d-flex align-items-center icon-menu" role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="fa-solid fa-bars text-dark fs-3"></i>
                </a>
            </div>
            <div class="col-lg-4 col-8 d-flex justify-content-center">
                <a class="navbar-brand  py-2 text-center m-0" href="{{ route('client.home') }}">
                    <img class="m-0" style="width: 250px;" src="{{ setting('logo') }}" />
                </a>
            </div>
            <div class="col-lg-4 col-2 d-flex justify-content-lg-end justify-content-center">

                <div class="d-flex justify-content-end" id="navbarSupportedContent">

                    <form class="d-flex">
                        <div class="px-2 d-flex  d-lg-flex d-none" role="button">
                            <span class="px-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <mask id="mask0_184_672" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="24" height="24">
                                        <rect width="24" height="24" fill="#D9D9D9" />
                                    </mask>
                                    <g mask="url(#mask0_184_672)">
                                        <path d="M12 22C10.6167 22 9.31667 21.7375 8.1 21.2125C6.88333 20.6875 5.825 19.975 4.925 19.075C4.025 18.175 3.3125 17.1167 2.7875 15.9C2.2625 14.6833 2 13.3833 2 12C2 10.6167 2.2625 9.31667 2.7875 8.1C3.3125 6.88333 4.025 5.825 4.925 4.925C5.825 4.025 6.88333 3.3125 8.1 2.7875C9.31667 2.2625 10.6167 2 12 2C13.3833 2 14.6833 2.2625 15.9 2.7875C17.1167 3.3125 18.175 4.025 19.075 4.925C19.975 5.825 20.6875 6.88333 21.2125 8.1C21.7375 9.31667 22 10.6167 22 12C22 13.3833 21.7375 14.6833 21.2125 15.9C20.6875 17.1167 19.975 18.175 19.075 19.075C18.175 19.975 17.1167 20.6875 15.9 21.2125C14.6833 21.7375 13.3833 22 12 22ZM12 20C14.2333 20 16.125 19.225 17.675 17.675C19.225 16.125 20 14.2333 20 12C20 11.8833 19.9958 11.7625 19.9875 11.6375C19.9792 11.5125 19.975 11.4083 19.975 11.325C19.8917 11.8083 19.6667 12.2083 19.3 12.525C18.9333 12.8417 18.5 13 18 13H16C15.45 13 14.9792 12.8042 14.5875 12.4125C14.1958 12.0208 14 11.55 14 11V10H10V8C10 7.45 10.1958 6.97917 10.5875 6.5875C10.9792 6.19583 11.45 6 12 6H13C13 5.61667 13.1042 5.27917 13.3125 4.9875C13.5208 4.69583 13.775 4.45833 14.075 4.275C13.7417 4.19167 13.4042 4.125 13.0625 4.075C12.7208 4.025 12.3667 4 12 4C9.76667 4 7.875 4.775 6.325 6.325C4.775 7.875 4 9.76667 4 12H9C10.1 12 11.0417 12.3917 11.825 13.175C12.6083 13.9583 13 14.9 13 16V17H10V19.75C10.3333 19.8333 10.6625 19.8958 10.9875 19.9375C11.3125 19.9792 11.65 20 12 20Z" fill="#0C0C0C" />
                                    </g>
                                </svg>
                            </span>
                            <a href="{{ route('lang',lang('ar') ? 'en' : 'ar') }}">
                                <span class="text-black">{{ lang('ar') ? 'English' : 'العربية' }}</span>
                            </a>
                        </div>
                        <div class="px-2 search-input-icon d-lg-flex d-none" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21" fill="none">
                                <circle cx="9" cy="8.99994" r="8" stroke="#0C0C0C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M14.5 14.9579L19.5 19.9579" stroke="#0C0C0C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg> </div>
                        <div class="px-2  d-lg-flex d-none">
                            <a href="{{ !auth('client')->check() ?  route('client.login') : route('client.profile') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="19" viewBox="0 0 16 19" fill="none">
                                    <circle cx="4" cy="4" r="4" transform="matrix(-1 0 0 1 12 1)" stroke="#0C0C0C" stroke-width="1.5" />
                                    <path d="M1 14.9347C1 14.0743 1.54085 13.3068 2.35109 13.0175V13.0175C6.00404 11.7128 9.99596 11.7128 13.6489 13.0175V13.0175C14.4591 13.3068 15 14.0743 15 14.9347V16.2502C15 17.4376 13.9483 18.3498 12.7728 18.1818L11.8184 18.0455C9.28565 17.6837 6.71435 17.6837 4.18162 18.0455L3.22721 18.1818C2.0517 18.3498 1 17.4376 1 16.2502V14.9347Z" stroke="#0C0C0C" stroke-width="1.5" />
                                </svg>
                            </a> 
                        </div>
                        
                        <div class="px-2  d-lg-flex d-none" onclick="document.location='{{ route('client.washList') }}'" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M3.66275 13.2136L9.82377 19.7066C11.0068 20.9533 12.9932 20.9534 14.1762 19.7066L20.3372 13.2136C22.5542 10.8771 22.5543 7.08895 20.3373 4.75248C18.1203 2.416 14.5258 2.416 12.3088 4.75248V4.75248C12.1409 4.92938 11.8591 4.92938 11.6912 4.75248V4.75248C9.47421 2.416 5.87975 2.416 3.66275 4.75248C1.44575 7.08895 1.44575 10.8771 3.66275 13.2136Z" stroke="#0C0C0C" stroke-width="1.5" />
                            </svg>
                        </div>
                       
                        <div class="px-2 ">
                            <a href="{{ route('client.cart') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="22" viewBox="0 0 20 22" fill="none">
                                    <path d="M2.53715 9.47134C2.80212 7.48412 4.49726 6 6.50207 6H13.4979C15.5027 6 17.1979 7.48412 17.4628 9.47135L18.3962 16.4713C18.7159 18.8693 16.8504 21 14.4313 21H5.56873C3.14958 21 1.2841 18.8693 1.60382 16.4713L2.53715 9.47134Z" stroke="#0C0C0C" stroke-width="1.5" />
                                    <path d="M14 8V5C14 2.79086 12.2091 1 10 1V1C7.79086 1 6 2.79086 6 5L6 8" stroke="#0C0C0C" stroke-width="1.5" stroke-linecap="round" />
                                </svg>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="search-container position-fixed top-0 start-0 end-0 bottom-0 bg-white">
    <a type="button" class="close-div position-absolute">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </a>
    <form action="{{ route('client.shop') }}" class="h-100 w-100 d-flex justify-content-center align-items-center">
        <input type="search" name="search" class="nosubmit search-input border rounded-2 border-1 border-black" placeholder="@lang('trans.searchByName')....">
    </form>
</div>
<div class="offcanvas offcanvas-{{ lang('en') ? 'start' : 'end' }}" tabindex="-1" id="offcanvasRight">
    <div class="offcanvas-header justify-content-between">
        <a href="{{ route('client.home') }}">
            <img class="m-0" width="181" src="{{ setting('logo') }}" />
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>
    <div class="offcanvas-body h-100 d-flex flex-column">

        <ul class="navbar-nav  mb-2 mb-lg-0 p-3 text-uppercase">
            <li class="nav-item ">
                <form action="{{ route('client.shop') }}"  class="input-group" style="background: #cacaca;    border-radius: 50px;">
                   <input type="search" class="form-control border-3">
                   <div class="input-group-append">
                      <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i class="fa fa-search"></i></button>
                   </div>
                </form>
            </li>
            <li class="nav-item ">
                <a class="nav-link " aria-current="page" href="{{ route('client.home') }}">
                    <span>
                        @lang('trans.Home')
                    </span>
                </a>
            </li>
            @foreach (Categories() as $Category)
                <li class="nav-item ">
                    <a class="nav-link " aria-current="page" href="{{ route('client.shop',$Category) }}">
                        <span>{{ $Category->title() }}</span>
                    </a>
                </li>
            @endforeach
            <li class="nav-item ">
                <a class="nav-link " aria-current="page" href="{{ route('client.shop') }}">
                    <span>
                        @lang('trans.viewAll')
                    </span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav  mb-2 mb-lg-0 p-3 text-uppercase">
            <li class="nav-item ">
                <a class="nav-link " aria-current="page" href="{{ route('client.our_story') }}">
                    <span>@lang('trans.OurStory')</span>
                </a>
                <a class="nav-link " aria-current="page" href="{{ route('client.contact') }}">
                    <span>@lang('trans.contact_us')</span>
                </a>
            </li>
            
            <li class="nav-item ">
                <a class="nav-link " aria-current="page" href="{{ route('client.washList') }}"><span>@lang('trans.wishlist')</span></a>
            </li>
           
            @if (auth('client')->check())
                <li class="nav-item ">
                    <a class="nav-link " aria-current="page" href="{{ route('client.profile') }}"><span>@lang('trans.profile')</span></a>
                </li>
            @else
                <li class="nav-item ">
                    <a class="nav-link " aria-current="page" href="{{ route('client.login') }}"><span>@lang('trans.login')</span></a>
                </li>
            @endif
            <li class="nav-item ">
                <a class="nav-link " aria-current="page" href="{{ route('lang',lang('ar') ? 'en' : 'ar') }}">
                    <span>{{ lang('ar') ? 'English' : 'العربية'  }}</span>
                </a>
            </li>
        </ul>
        @if (auth('client')->check())
            <div class="mt-auto m-auto">
                <a href="{{ route('client.logout') }}" class="text-danger text-decoration-underline">@lang('trans.logout')</a>
            </div>
        @endif
    </div>
</div>

<div id="backTop" style="top: 85%;left: 50%;transform: translate(-50%, 100%);position: fixed;z-index: 99;display: none;">
    <span class="btn bg-white border border-1 border-dark rounded-3 gap-2 my-2 px-5 py-2 text-dark explore">@lang('trans.backToTop')</span>
</div> --}}
@php
    $Categories = \App\Models\Category::where('status', 1)->where('is_parent', 1)->get();
@endphp

<body>

    <div class="hoverPage position-fixed  start-0 end-0 bottom-0" id="Abayas">
        <span class="close-icon">
            <i class="fa-solid fa-xmark"></i>
        </span>
        <div id="SaudiArabia">
            <section class="best-selling container my-5">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <div class="col-6 py-2" id="mainSub">

                            </div>

                        </div>

                    </div>
                    <div class="col-lg-6 ">
                        <div class="row justify-content-center align-items-center" id="mainSubSubImage">

                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="offcanvas offcanvas-start p-4" tabindex="-1" id="offcanvasExample3"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel"></h5>
            <button type="button" class="btn-close text-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('client.changeWebsiteSettings') }}" class="offcanvas-body">
            @csrf
            <div>
                <h2 class="my-5 fw-uppercase">@lang('trans.Where fashion meets modesty')</h2>
                <p class="my-5 fs-4">
                    @lang('trans.Select your location')
                </p>
                <h5 class="my-5 fs-4">@lang('trans.Where are you shipping to?')</h5>
                <select name="country_id" class="form-select border-0 border-bottom rounded-0 fs-4 my-5"
                    aria-label="Default select example">
                    @foreach (Countries() as $country)
                        <option @if ($country->id == Country()->id) selected @endif value="{{ $country->id }}">
                            {{ $country->title() }}</option>
                    @endforeach


                </select>
                <h5 class="my-5">@lang('trans.Language')</h5>
                <select name="language" class="form-select border-0 border-bottom rounded-0 fs-4 my-5 "
                    aria-label="Default select example">
                    <option value="en" @if (lang() == 'en') selected @endif>@lang('trans.English')</option>
                    <option @if (lang() == 'ar') selected @endif value="ar">@lang('trans.Arabic')</option>
                </select>
            </div>
            <div class="text-box my-5">
                <button type="submit" class="btn w-100 py-2">@lang('trans.confirm')</button>

            </div>

        </form>
    </div>

    <nav class="navbar  navbar-expand-lg fixed-top px-5">
        <div class="container-fluid nav-container">
            <a class="navbar-brand" href="{{ route('client.home') }}"><img class="icon-white"
                    src="{{ asset(setting('logo')) }}" alt />
                <img width="74" height="74" class="icon-black" src="{{ asset(setting('logo_dark')) }}"
                    alt="logo" />

            </a>
            <button class="navbar-toggler py-2" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars fs-3"></i> </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body header">
                    <button class="btn country-btn" data-bs-toggle="offcanvas" href="#offcanvasExample3" role="button"
                        aria-controls="offcanvasExample">{{ Country()->title() }}</button>
                    <ul class="navbar-nav me-lg-auto flex-grow-1 ">
                        @foreach ($Categories as $key => $cat)
                            <li class="nav-item">
                                <a class="nav-link Abayas" aria-current="page" data-cat_id="{{ $cat->id }}"
                                    href="javascript:;">
                                    {{ $cat->title() }}
                                </a>

                            </li>
                        @endforeach


                    </ul>
                    <ul class="header-icons">
                        <li>
                            <a href="{{ route('client.search') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path
                                        d="M14 23C18.9706 23 23 18.9706 23 14C23 9.02944 18.9706 5 14 5C9.02944 5 5 9.02944 5 14C5 18.9706 9.02944 23 14 23Z"
                                        stroke="white" stroke-width="1.2" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M27.0002 27.0012L20.3662 20.3672" stroke="white" stroke-width="1.2"
                                        stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                </svg></a>
                        </li>
                        <li>
                            <a href="{{ route('client.washList') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="32" height="32" viewBox="0 0 32 32" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.5482 29.7596L16 30L15.4518 29.7596C8.40591 25.433 1 15.5848 1 10.1149C1.02386 5.63608 4.68455 2 9.18182 2C12.0243 2 14.5334 3.45334 16 5.65315C17.4666 3.45334 19.9757 2 22.8182 2C27.3155 2 30.9761 5.63608 31 10.1149C31 15.5848 23.5941 25.433 16.5482 29.7596ZM22.8182 3.35977C20.5314 3.35977 18.4075 4.49827 17.1352 6.40578L16 8.1084L14.8648 6.40509C13.5925 4.49827 11.4686 3.35977 9.18182 3.35977C5.44273 3.35977 2.38341 6.39348 2.36364 10.1149C2.36364 14.9394 9.34136 24.326 16 28.4982C22.6586 24.326 29.6364 14.94 29.6364 10.1218C29.6166 6.39348 26.5573 3.35977 22.8182 3.35977Z"
                                        fill="white" />
                                </svg></a>
                        </li>
                        <li>
                            <a
                                href="{{ !auth('client')->check() ? route('client.login') : route('client.profile') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 32 32" fill="none">
                                    <g clip-path="url(#clip0_390_10350)">
                                        <path
                                            d="M16.1166 17.4998C22.4346 17.535 28.3861 21.691 30.4229 28.2438C30.4921 28.4663 30.5924 28.6973 30.5229 28.9068C30.3626 29.3918 29.6916 29.2768 29.4819 28.5858C28.0711 24.0088 24.4364 20.0855 19.6824 18.92C15.4681 17.887 10.7504 18.73 7.51138 21.5285C5.38063 23.3695 3.79163 25.8943 3.04838 28.5648C3.04838 28.5648 2.68988 29.259 2.23288 28.8878C1.76788 28.5098 2.26288 27.6495 2.58788 26.8513C4.72063 21.6128 9.68888 17.6055 15.7869 17.5018C15.8969 17.5003 16.0066 17.4998 16.1166 17.4998ZM16.0904 3.00004C19.0599 3.02829 21.8636 5.30629 22.4319 8.27029C22.9869 11.1648 21.3009 14.336 18.5776 15.4885C15.5609 16.7653 11.6661 15.3315 10.2071 12.3528C8.70063 9.27679 10.1246 5.09179 13.3021 3.60754C14.1709 3.20179 15.1266 2.99679 16.0904 3.00004ZM16.0126 3.99979C13.5226 4.02354 11.1849 5.90729 10.6671 8.35804C10.1449 10.8305 11.5694 13.5775 13.9086 14.5675C16.9519 15.8555 20.9859 13.749 21.4899 10.3033C21.9344 7.26529 19.4916 4.09579 16.1904 4.00154C16.1311 4.00029 16.0719 3.99979 16.0126 3.99979Z"
                                            fill="white" />
                                    </g>
                                    <defs>
                                        <clippath id="clip0_390_10350">
                                            <rect width="32" height="32" fill="white" />
                                        </clippath>
                                    </defs>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a style="text-decoration: none" href="{{ route('client.cart') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 32 32" fill="none">
                                    <path d="M29.6004 29.6004H2.40039L4.92772 9.92578H27.0731L29.6004 29.6004Z"
                                        stroke-width="1.13333" stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M9.35938 14.5491V7.1258C9.38421 6.49175 9.55578 5.87211 9.86059 5.31559C10.1654 4.75906 10.5951 4.28082 11.116 3.91847C12.5387 2.90033 14.2516 2.36779 16.0007 2.3998C17.6691 2.37151 19.3063 2.85396 20.6927 3.78247C21.27 4.14758 21.7493 4.64817 22.089 5.24072C22.4288 5.83327 22.6186 6.49984 22.642 7.18247V14.6058"
                                        stroke-width="1.13333" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <span id="cartCount">({{\App\Models\Cart::where('client_id',client_id())->count()}})</span>
                            </a>

                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="floatwhatsapp ">
        <i class="fa-brands fa-whatsapp "></i>

    </div>

    <div class="back-to-top" id="backTop">
        <i class="fa fa-arrow-up "></i>
    </div>


    </script>
</body>
@push('js')
    <script src="{{ asset('frontEnd/js/navbar.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".Abayas").hover(
                function() {
                    var parentCategoryId = $(this).data('cat_id');

                    $.ajax({
                        url: "{{ route('client.get-subcategories') }}",
                        type: 'GET',
                        data: {
                            parentCategoryId: parentCategoryId
                        },
                        success: function(response) {
                            var subcategoryHtml = '';
                            var firstSubSubImageHtml = ''
                            $.each(response.firstSubSub, function(index,
                                firstSubSubImage) {

                                firstSubSubImageHtml +=
                                    '<div class="col-lg-4 col-6 p-2 ">' +
                                    '<a href="' +
                                    "{{ route('client.shop', ':category_id') }}".replace(
                                        ':category_id', firstSubSubImage[0].id) +
                                    '" style="text-decoration: none;">' +
                                    '<div class="card" >' +
                                    '<div class="img-card-container">' +
                                    '<img src="' + firstSubSubImage[0].image +
                                    '" class="card-img-top" alt="...">' +
                                    '</div>' +
                                    '<div class="card-body">' +
                                    '<h5 class="card-title text-center">' +
                                    firstSubSubImage[0]['title_{{ lang() }}'] +
                                    '</h5>' +
                                    '</div>' +
                                    '</div>' +
                                    '</a>' +
                                    '</div>';

                            });
                            $.each(response.subcategories, function(index, subcategory) {
                                var subSubCategoryHtml = '';
                                $.each(response.subSubcategories, function(index,
                                    subSubcategory) {
                                    if (subSubcategory.parent_id === subcategory
                                        .id) {
                                        subSubCategoryHtml +=
                                            '<li class="fs-3"><a class="nav-link"  href="' +
                                            "{{ route('client.shop', ':category_id') }}"
                                            .replace(':category_id', subSubcategory
                                                .id) + '">' +
                                            subSubcategory[
                                                'title_{{ lang() }}'] +
                                            '</a></li>';
                                    }
                                });
                                subcategoryHtml +=
                                    `<h3 class="fs-2 my-4 fw-bold" >
                                    ${subcategory['title_{{ lang() }}']}
                                </h3>
                                <nav>
                                    <ul class="p-0 abaya nav flex-column nav-pills" style="list-style: none;"
                                        id="nav-tab" role="tablist">
                                        
                                        ${subSubCategoryHtml}
                                    </ul>
                                </nav>`;
                            });

                            $('#mainSubSubImage').html(firstSubSubImageHtml);
                            $('#mainSub').html(subcategoryHtml);
                            $(".hoverPage").fadeIn(400);
                            $("body").css("overflow-y", "hidden");
                        }
                    });

                }
            );
            $(".close-icon").click(function() {
                $(".hoverPage").fadeOut(400, function() {
                    $("body").css("overflow-y", "auto");
                });
            });
        });
    </script>
@endpush
