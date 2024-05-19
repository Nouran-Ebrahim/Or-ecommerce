@extends('Client.layouts.layout')
@push('css')
    @if (lang() == 'ar')
        <style>
            .slick-track {
                float: left;
            }
        </style>
    @endif
    <style>
        .navbar-toggler i {
            color: var(--secondary-color);
        }

        .icon-white {
            display: block;
        }

        .icon-black {
            display: none;
        }

        .offcanvas-body.header .nav-link {
            color: var(--secondary-color);
        }

        .country-btn {
            color: var(--secondary-color);
            border-bottom: 1px solid var(--secondary-color);

        }

        .country-btn:hover {
            color: var(--secondary-color);
            border-bottom: 1px solid var(--secondary-color);
        }

        .header-icons li a svg path {
            stroke: var(--secondary-color);
        }
    </style>
    <style>
        .shop {
            margin-block: 15rem;
            height: 100rem;
            background: url({{ $bannerSec2->image }});
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .discover {
            margin-block: 15rem;
            height: 100rem;
            background: url({{ $bannerSec1->image }});
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        @media only screen and (max-width: 1358px) {

            .discover,
            .shop {
                min-height: auto !important;
                height: 70vh;
                margin-block: 5rem;
                background-attachment: fixed;
            }


        }
    </style>
@endpush
@section('content')


    <main class>
        <!-- ----------------------------------------------------------------------- -->

        <section class="hero-section">
            <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @for ($i = 0; $i < $Sliders->count(); $i++)
                            <button type="button" data-bs-target="#carouselExampleInterval"
                                data-bs-slide-to="{{ $i }}"
                                @if ($i == 0) class="active" @endif aria-current="true"
                                aria-label="Slide {{ $i }}"></button>
                        @endfor
                        {{-- <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleInterval" data-bs-slide-to="2"
                            aria-label="Slide 3"></button> --}}
                    </div>
                    <div class="carousel-inner hero-carousel-inner">
                        @foreach ($Sliders as $Slider)
                            @if ($Slider->type == 'vedio')
                                <div class="carousel-item hero-carousel active" data-bs-interval="10000">
                                    <video src="{{ asset($Slider->vedio) }}" autoplay muted></video>
                                    <div class="carousel-caption">
                                        <p>{{ $Slider->title() }}</p>
                                        <h1>{{ $Slider->desc() }}</h1>
                                        <a href="{{ route('client.shop', 'newCollection') }}"
                                            class="btn shop-now-btn">@lang('trans.SHOP NOW')</a>
                                    </div>
                                </div>
                            @else
                                <div class="carousel-item hero-carousel" data-bs-interval="10000">
                                    <img class="w-100" src="{{ asset($Slider->image) }}">
                                    <div class="carousel-caption">
                                        <p>{{ $Slider->title() }}</p>
                                        <h1>{{ $Slider->desc() }}</h1>
                                        <a href="{{ route('client.shop', 'newCollection') }}"
                                            class="btn shop-now-btn">@lang('trans.SHOP NOW')</a>
                                    </div>
                                </div>
                            @endif
                        @endforeach


                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">@lang('trans.Next')</span>
                    </button>
                </div>
        </section>
        <!-- ----------------------------------------------------------------------- -->
        <section class="slider-section">
            <div class="row">
                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                    <div class="text-box">
                        {{-- <p>Modern Abayas</p> --}}
                        <h2>@lang('trans.new_collection')</h2>
                        <a href="{{ route('client.shop', 'newCollection') }}" class="btn">@lang('trans.SHOP NOW')</a>
                    </div>
                </div>
                <div class="col-lg-6">

                    <div class="slick marquee my-5">
                        @foreach ($newCollection as $collection)
                            <div class="slick-slide">
                                <div class="inner">
                                    <img src="{{ asset($collection->RandomImage()) }}" alt />
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- ----------------------------------------------------------------------- -->
        <!-- ----------------------------------------------------------------------- -->
        <section class="discover">
            <h2>{{ $bannerSec1->title() }}</h2>
            <p>
                {{ $bannerSec1->desc() }}
            </p>
            <a href="{{ route('client.shop', 'newCollection') }}" class="btn">@lang('trans.SHOP NOW')</a>
        </section>
        <!-- ----------------------------------------------------------------------- -->

        @if ($MostSelling->count() > 0)
            <section class="best-selling container">
                <h2 class="text-center">@lang('trans.BEST SELLING')</h2>
                <div class="row justify-content-between">

                    @foreach ($MostSelling as $MostSellingProduct)
                        <div class="col-lg-3  col-md-6 col-12 p-3 position-relative d-flex">
                            @if ($MostSellingProduct->HasDiscount())
                                <div class="position-absolute py-3 px-4 discount text-white">
                                    -{{ (int) $MostSellingProduct->discount }}%</div>
                            @endif

                            <div class="card best-selling--card" style="width: 18rem">
                                <div class="icons flex-column">
                                    <a href="javascript:;" class="wish-btn wish p-3"
                                        data-product_id="{{ $MostSellingProduct->id }}">
                                        @php
                                            $inWishList = \App\Models\WhishList::where('client_id', client_id())
                                                ->where('product_id', $MostSellingProduct->id)
                                                ->where('category', 'bestSelling')
                                                ->exists();
                                        @endphp
                                        <span class="liked-icon {{ $inWishList ? 'active' : '' }}">
                                            <svg class="" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M3.66275 13.2136L9.82377 19.7066C11.0068 20.9533 12.9932 20.9534 14.1762 19.7066L20.3372 13.2136C22.5542 10.8771 22.5543 7.08895 20.3373 4.75248C18.1203 2.416 14.5258 2.416 12.3088 4.75248V4.75248C12.1409 4.92938 11.8591 4.92938 11.6912 4.75248V4.75248C9.47421 2.416 5.87975 2.416 3.66275 4.75248C1.44575 7.08895 1.44575 10.8771 3.66275 13.2136Z"
                                                    stroke="#1E1E1E" stroke-width="1.5"></path>
                                            </svg>
                                        </span>
                                    </a>

                                </div>
                                <a style="text-decoration: none"
                                    href="{{ route('client.product', ['id' => $MostSellingProduct->id, 'category_id' => 'bestSelling']) }}">
                                    <div class="img-card-container">
                                        <img src="{{ asset($MostSellingProduct->RandomImage()) }}" class="card-img-top"
                                            alt="abaya" />
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{ $MostSellingProduct->title() }}</h5>
                                        <div class="card-text">

                                            @php
                                                $reviewCount = \App\Models\ProductReview::where(
                                                    'product_id',
                                                    $MostSellingProduct->id,
                                                )->avg('rate');
                                                $averageRating = round($reviewCount);
                                            @endphp
                                            @if ($averageRating > 0)
                                                @for ($i = 0; $i < $averageRating; $i++)
                                                    <i class="fa-solid fa-star"></i>
                                                @endfor
                                            @endif


                                        </div>
                                        <div class="available-price d-flex justify-content-between">
                                            <p>{{ $MostSellingProduct->in_stock == 1 ? __('trans.in_stock') : __('trans.outStock') }}
                                            </p>
                                            @if ($MostSellingProduct->HasDiscount())
                                                <p><span class="text-decoration-line-through">{{ Country()->currancy_code }}
                                                        {{ $MostSellingProduct->Price() }}
                                                    </span>{{ Country()->currancy_code }}
                                                    {{ $MostSellingProduct->CalcPrice() }}
                                                @else
                                                <p>{{ Country()->currancy_code }} {{ $MostSellingProduct->Price() }}</p>
                                            @endif

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach



                </div>
                <a href="{{ route('client.shop', 'bestSelling') }}"
                    class="btn view-all--btn mx-auto d-block">@lang('trans.viewAll')</a>
            </section>
        @endif

        <!-- ----------------------------------------------------------------------- -->
        <section class="shop">
            <h2>{{ $bannerSec2->desc() }}</h2>
            <a href="{{ route('client.shop', 'newCollection') }}" class="btn">@lang('trans.SHOP NOW')</a>
        </section>
        <!-- ----------------------------------------------------------------------- -->
        @if (count($lifstyle) > 0)
            <section class="life-style" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="text-center">@lang('trans.LIFE STYLE')</h2>
                <div class="row">
                    @foreach ($lifstyle as $data)
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="life-style-img-box">
                                <img src="{{ asset($data->image) }}" alt />
                            </div>
                        </div>
                    @endforeach


                </div>
            </section>
        @endif

    </main>
@endsection

@push('css')
@endpush
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            $('.wish-btn').on('click', function(e) {
                e.preventDefault();
                var product_id = $(this).data('product_id')
                var quantity = $('#quantity').val()
                var size_id = $('#size_input').val()
                var category = "bestSelling"
                var color_id = $('.gallery-img-box.border-black').data('color_id')

                var path = "{{ route('client.AddToWhishList') }}";
                var $likedIcon = $(this).find('.liked-icon');


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
        });

        AOS.init({
            once: true
        });

        $(document).ready(function() {
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 3,
                spaceBetween: 30,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                }
            });


            var slickSlider = $('.slick.marquee').slick({
                speed: 2000,
                autoplay: true,
                autoplaySpeed: 0,
                centerMode: true,
                cssEase: 'linear',
                slidesToShow: 1,
                slidesToScroll: 1,
                variableWidth: true,
                infinite: true,
                initialSlide: 1,
                arrows: true,
                prevArrow: `<button class="prev-button p-2 rounded-circle border-0"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 14 24" fill="none"><path d="M1.16797 12.1055L12.168 22.6055" stroke="black" stroke-opacity="0.8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M1.16797 12.1055L12.168 1.60547" stroke="black" stroke-opacity="0.8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>`,
                nextArrow: `<button class="next-button p-2 rounded-circle border-0"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="24" viewBox="0 0 14 24" fill="none"><path d="M12.832 12.1055L1.83203 22.6055" stroke="black" stroke-opacity="0.8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M12.832 12.1055L1.83203 1.60547" stroke="black" stroke-opacity="0.8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></button>`
            });
        });
    </script>
    <script>
        // $('.add-to-cart').on('click', function(e) {
        //     var product_id = "{{ request()->route('id') }}"
        //     var quantity = $('#quantity').val()
        //     var size_id = $('#size_input').val()
        //     var color_id = $('.gallery-img-box.border-black').data('color_id')

        //     var path = "{{ route('client.AddToCart') }}";
        //     // alert(quantity)
        //     $.ajax({
        //         url: path,
        //         type: "POST",
        //         dataType: "JSON",
        //         data: {
        //             product_id: product_id,
        //             quantity: quantity,
        //             size_id: size_id,
        //             color_id: color_id,
        //             "_token": "{{ csrf_token() }}"
        //         },

        //         success: function(response) {

        //             Swal.fire({
        //                 icon: 'success',
        //                 title: 'added',
        //                 text: 'added',
        //                 showConfirmButton: false,
        //                 timer: 1500
        //             });
        //         },
        //         error: function(xhr, status, error) {
        //             // Handle errors
        //             // console.log(5)
        //             console.error(xhr.responseText);
        //         }
        //     })


        // })
    </script>
@endpush
{{-- @push('js')


<script>
    AOS.init({
        once: true
    })

    document.addEventListener('DOMContentLoaded', function() {
        var seeAllProductLinks = document.querySelectorAll('.seeall-product');

        seeAllProductLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                console.log("hi");

                var container = this.closest('.container');
                var h3Element = container.querySelector('h3');
                var activeLinkText = h3Element.textContent.trim();
                localStorage.setItem('activeLinkText', activeLinkText);
            });
        });
    });

    $(".slick-slider").slick({
        infinite: true
        , slidesToShow: 4
        , slidesToScroll: 1
        , autoplay: true
        , arrows: false
        , dots: false
        , autoplaySpeed: 1000
        , responsive: [{
                breakpoint: 1024
                , settings: {
                    slidesToShow: 3
                    , infinite: true
                , }
            , }
            , {
                breakpoint: 919
                , settings: {
                    slidesToShow: 2
                , }
            , }
        ]
    , });

    $(document).on("click", ".list-group-item .toggle", function() {
        $(this).parent().find('ul').toggleClass('d-none');
    });

</script>
@endpush --}}
