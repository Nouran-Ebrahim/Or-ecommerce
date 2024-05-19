@extends('Client.layouts.layout')
@push('css')
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
@endpush
@section('content')
    <h1 class="hero-heading section-top"
        style="background: url('{{ asset(setting('about_image')) }}');  background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;">
        @lang('trans.about_us')</h1>
    <section class="welcome--section">
        <div class="row gap-5">
            <div class="col-lg-5">
                <div class="welcome-img-box">
                    <img class="w-100" src="{{ asset(setting('about_side_image')) }}" alt />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="welcome-text-box p-1">
                    {!! setting('about_' . lang()) !!}

                </div>
            </div>
        </div>
    </section>
    <!-- ------------------------------------------------------------------------------ -->
    @if ($Products->count() > 0)
        <section class="best-selling container">
            <h2 class="text-center">@lang('trans.BEST SELLING')</h2>
            <div class="row">
                @foreach ($Products as $product)
                    <div class="col-lg-3 col-md-6 col-12 p-3 position-relative d-flex">
                        @if ($product->HasDiscount())
                            <div class="position-absolute py-3 px-4 discount text-white">
                                -{{ (int) $product->discount }}%</div>
                        @endif

                        <div class="card best-selling--card" style="width: 18rem">
                            <div class="icons flex-column">
                                <a href="javascript:;" class="wish-btn wish p-3" data-product_id="{{ $product->id }}">
                                    @php
                                        $inWishList = \App\Models\WhishList::where('client_id', client_id())
                                            ->where('product_id', $product->id)
                                            ->where('category', 'bestSelling')
                                            ->exists();
                                    @endphp
                                    <span class="liked-icon {{ $inWishList ? 'active' : '' }}">
                                        <svg class="" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M3.66275 13.2136L9.82377 19.7066C11.0068 20.9533 12.9932 20.9534 14.1762 19.7066L20.3372 13.2136C22.5542 10.8771 22.5543 7.08895 20.3373 4.75248C18.1203 2.416 14.5258 2.416 12.3088 4.75248V4.75248C12.1409 4.92938 11.8591 4.92938 11.6912 4.75248V4.75248C9.47421 2.416 5.87975 2.416 3.66275 4.75248C1.44575 7.08895 1.44575 10.8771 3.66275 13.2136Z"
                                                stroke="#1E1E1E" stroke-width="1.5"></path>
                                        </svg>
                                    </span>
                                </a>

                            </div>
                            <a style="text-decoration: none"
                                href="{{ route('client.product', ['id' => $product->id, 'category_id' => 'bestSelling']) }}">
                                <div class="img-card-container">
                                    <img src="{{ asset($product->RandomImage()) }}" class="card-img-top" alt="abaya" />
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-center">{{ $product->title() }}</h5>
                                    <div class="card-text">

                                        @php
                                            $reviewCount = \App\Models\ProductReview::where(
                                                'product_id',
                                                $product->id,
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
                                        <p>{{ $product->in_stock == 1 ? __('trans.in_stock') : __('trans.outStock') }}
                                        </p>
                                        @if ($product->HasDiscount())
                                            <p><span class="text-decoration-line-through">{{ Country()->currancy_code }}
                                                    {{ $product->Price() }}
                                                </span>{{ Country()->currancy_code }}
                                                {{ $product->CalcPrice() }}
                                            @else
                                            <p>{{ Country()->currancy_code }} {{ $product->Price() }}</p>
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

    <div>

    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {

            $('.wish-btn').on('click', function(e) {
                e.preventDefault();
                var product_id = $(this).data('product_id')
                var quantity = 1
                var size_id = null
                var category = "bestSelling"
                var color_id = null

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
    </script>
@endpush
