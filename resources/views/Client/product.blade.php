@extends('Client.layouts.layout')

@section('content')
    {{-- <div class="container  section-top">
    <div class="row align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-5">
                <li class="breadcrumb-item">
                    <a href="{{ route('client.home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                            <path d="M1.5 9.93841C1.5 8.71422 2.06058 7.55744 3.02142 6.79888L8.52142 2.45677C9.97466 1.30948 12.0253 1.30948 13.4786 2.45677L18.9786 6.79888C19.9394 7.55744 20.5 8.71422 20.5 9.93841V16.5C20.5 18.7091 18.7091 20.5 16.5 20.5H15C14.4477 20.5 14 20.0523 14 19.5V16.5C14 15.3954 13.1046 14.5 12 14.5H10C8.89543 14.5 8 15.3954 8 16.5V19.5C8 20.0523 7.55228 20.5 7 20.5H5.5C3.29086 20.5 1.5 18.7091 1.5 16.5L1.5 9.93841Z" fill="#9D9D9D" stroke="#9D9D9D" stroke-width="1.5" />
                        </svg>
                        @lang('trans.home')
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('client.shop') }}">
                        @lang('trans.products')
                    </a>
                </li>
                <li class="breadcrumb-item fw-semibold" aria-current="page">
                    {{ $Product->code ? $Product->code . ' - ' : '' }} {{ $Product->title() }}
                </li>
            </ol>
        </nav>
    </div>
</div> --}}

    {{-- <form action="{{ route('client.addToCart',$Product) }}" method="POST" class=" p-0 my-2">
    @csrf
    <div class="container section-top">
        <div class="row gap-5 py-5 scrolling">
            <div class="col-lg-5  col-12">
                <div class="row row-res py-2">
                    <div class="col-12 d-flex justify-content-center">
                        <img class=" img-big" data-fancybox="sm-gallery" data-src="{{ $Product->Images->first()->image }}" src="{{ $Product->Images->first()->image }}" />
                    </div>
                </div>
                @if ($Product->Images->count() == 1)
                    <div class="row gy-5 justify-content-lg-between justify-content-start row-small">
                        @foreach ($Product->Images as $Item)
                        <div class="col-md-12 row-res-img  zoom">
                            <img class="w-100 img-big" data-fancybox="md-gallery" data-src="{{ $Item->image }}" src="{{ $Item->image }}" />
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="row gy-5 justify-content-lg-between justify-content-start row-small">
                        @foreach ($Product->Images as $Item)
                        <div class="col-md-6 row-res-img  zoom">
                            <img class="w-100 img-big" data-fancybox="md-gallery" data-src="{{ $Item->image }}" src="{{ $Item->image }}" />
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="col-lg-5  col-12">
                <div class="row py-2 border-bottom">
                    <div class="header-card p-0 mb-0 fw-bolder py-3 h5 d-flex justify-content-between">
                        <div>
                            {{ $Product->code ? $Product->code . ' - ' : '' }} {{ $Product->title() }}
                        </div>

                        <div>
                            {{ Country()->currancy_code }} {{ $Product->CalcPrice() }}
                            @if ($Product->HasDiscount())
                                <span class="text-decoration-line-through fs-6 fw-light">{{ $Product->Price() }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                
                
                <div class="row  my-3">
                    <div class="col-12 d-flex justify-content-between align-items-center">
                        <h6 class="p-0 fw-bold">
                            @lang('trans.size')
                        </h6>
                        <h6 class="text-secondary" role="button" data-bs-toggle="modal" data-bs-target="#filter">
                            <span class="text-decoration-underline px-2">@lang('trans.SizeGuide')</span><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                    <mask id="mask0_47_2690" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="16" height="16">
                                        <rect y="3.05176e-05" width="16" height="16" fill="#D9D9D9" />
                                    </mask>
                                    <g mask="url(#mask0_47_2690)">
                                        <path d="M2.66683 12C2.30016 12 1.98627 11.8695 1.72516 11.6084C1.46405 11.3473 1.3335 11.0334 1.3335 10.6667V5.33336C1.3335 4.9667 1.46405 4.65281 1.72516 4.3917C1.98627 4.13059 2.30016 4.00003 2.66683 4.00003H13.3335C13.7002 4.00003 14.0141 4.13059 14.2752 4.3917C14.5363 4.65281 14.6668 4.9667 14.6668 5.33336V10.6667C14.6668 11.0334 14.5363 11.3473 14.2752 11.6084C14.0141 11.8695 13.7002 12 13.3335 12H2.66683ZM2.66683 10.6667H13.3335V5.33336H11.3335V8.00003H10.0002V5.33336H8.66683V8.00003H7.3335V5.33336H6.00016V8.00003H4.66683V5.33336H2.66683V10.6667Z" fill="#9D9D9D" />
                                    </g>
                                </svg>
                            </span>
                        </h6>
                    </div>
                    <select class="form-select border border-1 rounded-0 w-auto px-5 border-black" style="width:100% !important" name="size_id">
                        @foreach ($Product->Sizes as $Size)
                        <option value="{{ $Size->id }}">{{ $Size->title() }}</option>
                        @endforeach
                    </select>
                </div>
                
                @if ($Product->Colors->count())
                <div class="row gap-2  my-3">
                    <h6 class="p-0">
                        @lang('trans.color')
                    </h6>
                    <div class="my-2">
                        @foreach ($Product->Colors as $Color)
                            <i data-id="{{ $Color->id }}" class="fa-solid fa-circle mx-1 h2 p-1 rounded-circle @if (old('color_id') == $Color->id) active @endif" style="color: {{ $Color->hexa }}"></i>
                        @endforeach
                    </div>
                </div>
                <input type="hidden" name="color_id" id="color_id" value="{{ old('color_id') }}">
                @endif



                <div class="row  my-3">
                    <h6 class="p-0">
                        @lang('trans.ADDITIONALINFORMATION')
                    </h6>
                    <input type="text" rows="3" name="note" class="form-control py-2 rounded-3">
                </div>
                <input type="hidden" name="quantity" id="quantity" value="1">
                <div class="row my-3 d-flex">
                    <div class="w-100">
                        <button type="submit" class="btn btn-dark rounded-5 w-100 py-2 mt-4">@lang('trans.addToCart')</button>
                    </div>
                </div>
                
                
                <p class="card-text body-card text-secondary fs-6 px-0 mb-0 py-3">
                    {!! $Product->desc() !!}
                </p>
            </div>
        </div>
    </div>
</form> --}}
    <main>
        <section class="breadcrumb container section-top">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" aria-label="breadcrumb" class="nav-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('client.home') }}">@lang('trans.home')</a></li>
                    <li class="breadcrumb-item">
                        @if (request()->route('category_id') == 'bestSelling')
                            <a href="{{ route('client.shop', 'bestSelling') }}">@lang('trans.Best selling')</a>
                        @elseif (request()->route('category_id') == 'newCollection')
                            <a href="{{ route('client.shop', 'newCollection') }}">@lang('trans.new_collection')</a>
                        @else
                            <a
                                href="{{ route('client.shop', $Product->Categories[0]->id) }}">{{ $Product->Categories[0]->title() }}</a>
                        @endif

                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $Product->title() }}
                    </li>
                </ol>
            </nav>
        </section>
        <!-- --------------------------------------------------------------------------------- -->
        <section class="product-details container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="img_producto_container" data-scale="1.6">
                        <a id="productImage" class="dslc-lightbox-image img_producto" href="#" target="_self"
                            style="background-image:url({{ asset($Product->RandomImage()) }})">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-details-box">
                        <div class="name-wishlist-container">
                            <p>{{ $Product->title() }}</p>
                            <button class="btn wish-btn wish">
                                <svg width="30" height="28" viewBox="0 0 30 28" fill="#000"
                                    xmlns="http://www.w3.org/2000/svg">
                                    @php
                                        $inWishList = \App\Models\WhishList::where('client_id', client_id())
                                            ->where('product_id', $Product->id)
                                            ->where('category', request()->route('category_id'))
                                            ->exists();
                                        if ($inWishList) {
                                            $color = 'red';
                                        } else {
                                            $color = 'black';
                                        }
                                    @endphp
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.5482 27.7596L15 28L14.4518 27.7596C7.40591 23.433 0 13.5848 0 8.11493C0.0238636 3.63608 3.68455 0 8.18182 0C11.0243 0 13.5334 1.45334 15 3.65315C16.4666 1.45334 18.9757 0 21.8182 0C26.3155 0 29.9761 3.63608 30 8.11493C30 13.5848 22.5941 23.433 15.5482 27.7596ZM21.8182 1.35977C19.5314 1.35977 17.4075 2.49827 16.1352 4.40578L15 6.1084L13.8648 4.40509C12.5925 2.49827 10.4686 1.35977 8.18182 1.35977C4.44273 1.35977 1.38341 4.39348 1.36364 8.11493C1.36364 12.9394 8.34136 22.326 15 26.4982C21.6586 22.326 28.6364 12.94 28.6364 8.12176C28.6166 4.39348 25.5573 1.35977 21.8182 1.35977Z"
                                        fill="{{ $color }}" />
                                </svg>
                            </button>
                        </div>
                        @if ($Product->HasDiscount())
                            <p class="product-price"><span
                                    class="text-decoration-line-through">{{ Country()->currancy_code }}
                                    {{ $Product->Price() }}
                                </span>{{ Country()->currancy_code }} {{ $Product->CalcPrice() }}
                            @else
                            <p class="product-price">{{ Country()->currancy_code }} {{ $Product->Price() }}
                        @endif
                        {{-- <p class="product-price">SAR 180.00</p> --}}
                        <div class="review-container">
                            <div class="rating d-inline-block">
                                @for ($i = 0; $i < $averageRating; $i++)
                                    <img src="{{ asset('frontEnd/assets/product-details/rating.png') }}" alt="rating" />
                                @endfor
                            </div>
                            @php
                                $reviewCount = \App\Models\ProductReview::with('Client')
                                    ->where('product_id', request()->route('id'))
                                    ->count();
                            @endphp
                            <span class="review">{{ $reviewCount }} @lang('trans.reviews')</span>
                        </div>
                        <p class="sizes-label">@lang('trans.size')</p>

                        <select id="size_input" name="size_id"
                            class="form-select shipping-options border border-1 border-dark my-5"
                            style="padding-inline: 1rem !important;">

                            @foreach ($Product->Sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->title() }} </option>
                            @endforeach
                        </select>

                    </div>
                    @if ($Product->Header->count() > 0)
                        <div class="color-label">@lang('trans.color')</div>
                        <div class="row gap-0 ">
                            @foreach ($Product->Header as $key => $data)
                                <div class="col-3 d-flex">
                                    <div data-color_id="{{ $data->color_id }}"
                                        data-product_id="{{ request()->route('id') }}" data-path="{{ $data->header }}"
                                        class="gallery-img-box p-2 {{ $key == 0 ? 'border-black' : '' }}">
                                        <img width="100%" src="{{ asset($data->header) }}" alt="" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="cart-actions">
                        <div class="items-amount" style="width: 30%;">
                            <button class="btn w-100 minus">
                                <i class="fa-regular fa-minus"></i>
                            </button>
                            <input id="quantity" type="number" min="1" value="1" placeholder="1" readonly />
                            <button class="btn w-100 plus">
                                <i class="fa-regular fa-plus"></i>
                            </button>
                        </div>
                        <div class="add-to-cart--btn add-to-cart">
                            <button class="btn">@lang('trans.addToCart')</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- --------------------------------------------------------------------------------- -->
        @if ($RelatedProducts->count() > 0)
            <section class="products-slider container">
                <h2 class="like-heading">@lang('trans.YOU MAY ALSO LIKE')</h2>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($RelatedProducts as $Relatedproduct)
                            <div class="swiper-slide position-relative ">

                                <div class="icons">
                                    @if ($Relatedproduct->HasDiscount())
                                        <div class=" py-3 px-4 discount text-white">
                                            -{{ (int) $Relatedproduct->discount }}%</div>
                                    @endif
                                    <a href="javascript:;" class="wish-btn-related wish-related p-2"
                                        data-product_id="{{ $Relatedproduct->id }}">
                                        @php
                                            $inWishList = \App\Models\WhishList::where('client_id', client_id())
                                                ->where('product_id', $Relatedproduct->id)
                                                ->where('category', request()->route('category_id'))
                                                ->exists();
                                        @endphp
                                        <span class="liked-icon-related  {{ $inWishList ? 'active' : '' }}">
                                            <svg class="" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M3.66275 13.2136L9.82377 19.7066C11.0068 20.9533 12.9932 20.9534 14.1762 19.7066L20.3372 13.2136C22.5542 10.8771 22.5543 7.08895 20.3373 4.75248C18.1203 2.416 14.5258 2.416 12.3088 4.75248V4.75248C12.1409 4.92938 11.8591 4.92938 11.6912 4.75248V4.75248C9.47421 2.416 5.87975 2.416 3.66275 4.75248C1.44575 7.08895 1.44575 10.8771 3.66275 13.2136Z"
                                                    stroke="#1E1E1E" stroke-width="1.5"></path>
                                            </svg>
                                        </span>
                                    </a>

                                </div>
                                <a href="{{ route('client.product', ['id' => $Relatedproduct->id, 'category_id' => request()->route('category_id')]) }}"
                                    class="card best-selling--card like-card" style="width: 18rem">
                                    <div class="img-card-container">

                                        <img src="{{ asset($Relatedproduct->RandomImage()) }}"
                                            class="card-img-top like-img" alt="abaya" />

                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            {{ $Relatedproduct->title() }}
                                        </h5>
                                        <div class="available-price d-flex justify-content-between">
                                            @if ($Relatedproduct->HasDiscount())
                                                <p><span class="text-decoration-line-through">{{ Country()->currancy_code }}
                                                        {{ $Relatedproduct->Price() }}
                                                    </span>{{ Country()->currancy_code }}
                                                    {{ $Relatedproduct->CalcPrice() }}
                                                @else
                                                <p>{{ Country()->currancy_code }} {{ $Relatedproduct->Price() }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </section>
        @endif

        <!-- --------------------------------------------------------------------------------- -->
        <section class="desc-review-tabs-section container">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                        @lang('trans.desc')
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        @php
                            $reviewCount = \App\Models\ProductReview::with('Client')
                                ->where('product_id', request()->route('id'))
                                ->count();
                        @endphp
                        @lang('trans.Reviews') <span>({{ $reviewCount }})</span>
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane review-tap fade show active" id="pills-home" role="tabpanel"
                    aria-labelledby="pills-home-tab" tabindex="0">
                    <p class="text ">
                        {!! $Product->desc() !!}
                    </p>
                    <h5 class="my-2">@lang('trans.Material')</h5>
                    <p class="text mb-5">{{ $Product['material_' . lang()] }}</p>
                    <h5 class="my-2">@lang('trans.Product code')</h5>
                    <p class="text my-2">{{ $Product->code }}</p>
                </div>
                <div class="tab-pane review-tap fade" id="pills-profile" role="tabpanel"
                    aria-labelledby="pills-profile-tab" tabindex="0">
                    @if ($clientReviews->count() > 0)
                        @foreach ($clientReviews as $review)
                            <div class="row py-5">
                                <div class="col-8">
                                    <div class="reviews ">
                                        <div class="reviews-img-box">
                                            <img src="{{ asset('frontEnd/assets/product-details/reviews/1.png') }}"
                                                alt="" />
                                        </div>
                                        <div class="reviews-text-box">
                                            <div class="name-date-box">
                                                <p class="name">{{ $review->Client->first_name }}
                                                    {{ $review->Client->last_name }}</p>
                                            </div>
                                            <div class="rating">
                                                @for ($i = 0; $i < $review->rate; $i++)
                                                    <img src="{{ asset('frontEnd/assets/product-details/rating.png') }}"
                                                        alt="" />
                                                @endfor

                                            </div>
                                            <p class="text">
                                                {{ $review->comment }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 reviews justify-content-end">
                                    <div class="name-date-box">

                                        <p class="date">{{ \Carbon\Carbon::now()->format('d M, Y') }}</p>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @endif


                    @if ($clientReviews->count() > 0)
                        <ul class="pagination justify-content-center">

                            @if ($clientReviews->hasPages())
                                <li class="page-item">
                                    {{ $clientReviews->withQueryString()->links('pagination::bootstrap-4') }}
                                </li>
                            @endif


                        </ul>
                    @endif

                    @if (Auth::guard('client')->check())
                        <div class="add-review">
                            <h3>@lang('trans.Add a review')</h3>
                            <p>@lang('trans.Your rating')</p>
                            <div class="rating-empty">
                                <img onclick="changeImage(this)"
                                    src="{{ asset('frontEnd/assets/product-details/rating-empty.png') }}"
                                    alt="" />
                                <img onclick="changeImage(this)"
                                    src="{{ asset('frontEnd/assets/product-details/rating-empty.png') }}"
                                    alt="" />

                                <img onclick="changeImage(this)"
                                    src="{{ asset('frontEnd/assets/product-details/rating-empty.png') }}"
                                    alt="" />

                                <img onclick="changeImage(this)"
                                    src="{{ asset('frontEnd/assets/product-details/rating-empty.png') }}"
                                    alt="" />

                                <img onclick="changeImage(this)"
                                    src="{{ asset('frontEnd/assets/product-details/rating-empty.png') }}"
                                    alt="" />

                            </div>
                            <form method="POST" action="{{ route('client.ClientReview') }}" class="adding-review">
                                @csrf
                                <input name="rate" id="rating" type="hidden" value="0">
                                <input name="product_id" type="hidden" value="{{ request()->route('id') }}">
                                <label for="review ">@lang('trans.Your review')</label>
                                <textarea name="comment" id="review" placeholder="@lang('trans.Write your review...')"></textarea>
                                <button class="btn">@lang('trans.ADD REVIEW')</button>
                            </form>
                        </div>
                    @else
                        <div class="add-review">
                            <div class="adding-review">
                                <a class="btn nav-link profile" href="{{ route('client.login') }}">@lang('trans.ADD REVIEW')</a>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </section>
        <!-- ----------------------------------------------------------------------------------- -->
        <section class="life-style">
            <div class="row" id="productGallery">


            </div>
        </section>
    </main>
@endsection

@push('css')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
<style>
    .fa-circle.active {
        border: 3px dashed #000;
    }

</style> --}}
@endpush


@push('js')
    {{-- <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script>
    color_id = 0;
    $(document).on("click", ".fa-circle", function() {
        color_id = $(this).attr('data-id');
        $('#color_id').val(color_id);
        $('.fa-circle').removeClass('active');
        $(this).addClass('active');
    });



    Fancybox.bind('[data-fancybox="sm-gallery"]', {});
    Fancybox.bind('[data-fancybox="md-gallery"]', {});

</script> --}}
    <script>
        // pills-profile-tab
        const urlParams = new URLSearchParams(window.location.search);
        const pageParam= urlParams.get("page");
        console.log(pageParam)
        if(pageParam !=null){
            $('#pills-home-tab').removeClass('active');
            $('#pills-home').removeClass('show active')
            $('#pills-profile-tab').addClass('active');
            $('#pills-profile').addClass('show active');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @if (session()->has('review'))
        <script>
            Swal.fire({
                title: "@lang('trans.Will Done')",
                text: "{{ session()->get('review') }}",
                icon: 'success',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    @if (session()->has('rating'))
        <script>
            Swal.fire({
                title: "@lang('trans.Rating Required')",
                text: "{{ session()->get('rating') }}",
                icon: 'error',
                showConfirmButton: true,
            });
        </script>
    @endif
    <script>
        $(document).on("click", ".plus", function() {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) + 1;
            if (count > 10) {
                $input.val(10)
                alert('no enough quantity')
            } else {
                $input.val(count);
                $input.change();
            }

        });
        $(document).on("click", ".minus", function() {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;

            if (count >= 1) {
                $input.val(count);
                $input.change();
            } else {
                $input.val(1);
            }

        });
        $('.add-to-cart').on('click', function(e) {
            var product_id = "{{ request()->route('id') }}"
            var quantity = $('#quantity').val()
            console.log(quantity);
            var size_id = $('#size_input').val()
            var color_id = $('.gallery-img-box.border-black').data('color_id')
            var category_id = "{{ request()->route('category_id') }}"
            var path = "{{ route('client.AddToCart') }}";
            // alert(quantity)
            $.ajax({
                url: path,
                type: "POST",
                data: {
                    product_id: product_id,
                    quantity: quantity,
                    size_id: size_id,
                    category_id: category_id,
                    color_id: color_id,
                    "_token": "{{ csrf_token() }}"
                },

                success: function(response) {

                    $('#cartCount').text(quantity);
                    if (response.status == "moved") {
                        $('.wish svg path').attr('fill', 'black');
                        Swal.fire({
                            icon: 'success',
                            title: "@lang('trans.Moved')",
                            text: "@lang('trans.Item Moved to cart Successfully')",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: "@lang('trans.added')",
                            text: "@lang('trans.AddedToCartSuccessfully')",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }

                },
                error: function(xhr, status, error) {
                    // Handle errors
                    // console.log(5)
                    console.error(xhr.responseText);
                }
            })


        })
        $('.wish-btn-related').on('click', function(e) {
            var product_id = $(this).data('product_id')
            var quantity = 1
            var size_id = null
            var category = "{{ request()->route('category_id') }}"
            var color_id = null
            var $likedIcon = $(this).find('.liked-icon-related');

            var path = "{{ route('client.AddToWhishList') }}";
            // alert(quantity)
            $.ajax({
                url: path,
                type: "POST",
                data: {
                    product_id: product_id,
                    category: category,
                    "_token": "{{ csrf_token() }}"
                },

                success: function(response) {

                    if (response.status == "adedd") {
                        $likedIcon.addClass('active');
                        // $(this).find('.liked-icon').toggleClass('active');
                        Swal.fire({
                            icon: 'success',
                            title: "@lang('trans.added')",
                            text: "@lang('trans.Added to wishlist!')",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        // $('.wish span svg path').attr('stroke', 'black');
                        $likedIcon.removeClass('active');
                        Swal.fire({
                            icon: 'success',
                            title: "@lang('trans.removed')",
                            text: "@lang('trans.removed from wishlist!')",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }

                },
                error: function(xhr, status, error) {
                    // Handle errors
                    // console.log(5)
                    console.error(xhr.responseText);
                }
            })


        })
        $('.wish-btn').on('click', function(e) {
            var product_id = "{{ request()->route('id') }}"
            var quantity = $('#quantity').val()
            var size_id = $('#size_input').val()
            var category = "{{ request()->route('category_id') }}"
            var color_id = $('.gallery-img-box.border-black').data('color_id')

            var path = "{{ route('client.AddToWhishList') }}";
            // alert(quantity)
            $.ajax({
                url: path,
                type: "POST",
                data: {
                    product_id: product_id,
                    category: category,
                    "_token": "{{ csrf_token() }}"
                },

                success: function(response) {

                    if (response.status == 'adedd') {
                        $('.wish svg path').attr('fill', 'red');
                        Swal.fire({
                            icon: 'success',
                            title: "@lang('trans.added')",
                            text: "@lang('trans.Added to wishlist!')",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        $('.wish svg path').attr('fill', 'black');
                        Swal.fire({
                            icon: 'success',
                            title: "@lang('trans.removed')",
                            text: "@lang('trans.removed from wishlist!')",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }

                },
                error: function(xhr, status, error) {
                    // Handle errors
                    // console.log(5)
                    console.error(xhr.responseText);
                }
            })


        })
    </script>
    <script>
        var swiper = new Swiper(".swiper", {
            initialSlide: 0,
            slidesPerView: 4,
            effect: "custom",
            customEffect: {
                css: "scroll",
            },
            direction: "horizontal",
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            on: {
                resize: function() {
                    swiper.params.slidesPerView = window.innerWidth <= 992 ? 1 : 4;
                    swiper.update();
                },
            },
        });


        function changeImage(image) {
            // Toggle the 'star-filled' class
            $(image).toggleClass('star-filled');

            // Get the current src of the image
            var src = $(image).attr('src');

            // Check if the image has 'star-filled' class
            if ($(image).hasClass('star-filled')) {
                // If it has the class, replace the src with the filled star image
                src = src.replace('rating-empty.png', 'rating.png');
            } else {
                // If it doesn't have the class, replace the src with the empty star image
                src = src.replace('rating.png', 'rating-empty.png');
            }
            var count = $('.rating-empty').find('.star-filled').length;
            $('#rating').val(count)
            // Update the src attribute of the image

            $(image).attr('src', src);
        }
    </script>


    <script>
        $(".img_producto_container")
            // tile mouse actions
            .on("mouseover", function() {
                $(this)
                    .children(".img_producto")
                    .css({
                        transform: "scale(" + $(this).attr("data-scale") + ")"
                    });
            })
            .on("mouseout", function() {
                $(this)
                    .children(".img_producto")
                    .css({
                        transform: "scale(1)"
                    });
            })
            .on("mousemove", function(e) {
                $(this)
                    .children(".img_producto")
                    .css({
                        "transform-origin": ((e.pageX - $(this).offset().left) / $(this).width()) * 200 +
                            "% " +
                            ((e.pageY - $(this).offset().top) / $(this).height()) * 200 +
                            "%"
                    });
            });
        document.addEventListener('DOMContentLoaded', function() {

            function handleButtonClick(buttons, currentButton) {

                buttons.forEach(btn => {
                    if (btn !== currentButton) {
                        btn.classList.remove('border-black');
                    }
                });
                currentButton.classList.toggle('border-black');
                // Get the data-path attribute of the current button
                const imagePath = currentButton.getAttribute('data-path');
                var product_id = currentButton.getAttribute('data-product_id');
                var color_id = currentButton.getAttribute('data-color_id')
                // Set the background image URL for the product image
                const productImage = document.getElementById('productImage');
                productImage.href = imagePath
                productImage.style.backgroundImage = `url(${imagePath})`;
                $.ajax({
                    url: "{{ route('client.productGallery') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        product_id: product_id,
                        color_id: color_id,
                    },
                    success: function(result) {
                        $('#productGallery').empty();
                        result.forEach(function(imageSrc) {
                            var imageDiv = '<div class="col-lg-4 col-md-6 col-12">' +
                                '<div class="life-style-img-box border border-black">' +
                                '<img src="' + imageSrc + '" alt="" />' +
                                '</div>' +
                                '</div>';
                            $('#productGallery').append(imageDiv);
                        });

                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            }
            const colorButtons = document.querySelectorAll('.gallery-img-box');

            colorButtons.forEach(button => {

                button.addEventListener('click', function() {

                    handleButtonClick(colorButtons, this);
                });
                if (button.classList.contains('border-black')) {
                    const imagePath = button.getAttribute('data-path');
                    var product_id = button.getAttribute('data-product_id');
                    var color_id = button.getAttribute('data-color_id')
                    const productImage = document.getElementById('productImage');
                    productImage.style.backgroundImage = `url(${imagePath})`;
                    $.ajax({
                        url: "{{ route('client.productGallery') }}",
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            product_id: product_id,
                            color_id: color_id,
                        },
                        success: function(result) {
                            $('#productGallery').empty();
                            result.forEach(function(imageSrc) {
                                var imageDiv =
                                    '<div class="col-lg-4 col-md-6 col-12">' +
                                    '<div class="life-style-img-box border border-black">' +
                                    '<img src="' + imageSrc + '" alt="" />' +
                                    '</div>' +
                                    '</div>';
                                $('#productGallery').append(imageDiv);
                            });

                        },
                        error: function(error) {
                            console.log(error);
                        }
                    })
                }
            });

        });
    </script>
@endpush
