@extends('Client.layouts.layout')
@push('css')
    @if (lang() == 'ar')
        <style>
            .dropdown-menu {
                right: -15rem !important;
                left: 0 !important;

            }
        </style>
    @endif
@endpush
@section('content')
    <main class="section-top">
        <section class="search container ">
            <h2>@lang('trans.What are you looking for?')</h2>
            <form action="{{ route('client.search') }}" class="search-input">
                <input value="{{ @$_GET['search'] }}" name="search" type="search" placeholder="@lang('trans.Search for your favorite products')" />
                <div class="search-img-box">
                    <img src="./assets/search/search-icon.png" alt />
                </div>
            </form>
            <p class="search-note">
                @lang('trans.Please type the word you want to search and press "enter"')
            </p>
        </section>
        <!-- ------------------------------------------------------------------------- -->
        @if (isset($_GET['search']))
            @if ($Products->count() > 0)
                <section class="search container section-top">
                    <p class="search-results">@lang('trans.Search results')</p>
                    <p class="results-heading">{{ $productsCount }} @lang('trans.result') </p>
                </section>
                <section class="best-selling container">
                    <div class="new-collection-action d-flex justify-content-between align-items-center mb-5">
                        <button class="btn filters" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                            <span><img
                                    src="{{ asset('frontEnd/assets/New-collection/filters-icon.png') }}" /></span>@lang('trans.filter')
                        </button>
                        <div class="dropdown">
                            <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                @lang('trans.SortBy') <i class="fa-solid fa-angle-down"></i>
                            </button>
                            <ul id="sortBy" class="dropdown-menu">
                                <li data-value="best"><a
                                        class="dropdown-item @if (@$_GET['sortBy'] == 'best') active @endif"
                                        href="javascript:;">@lang('trans.Best selling')</a></li>
                                <li data-value="priceAsc"><a
                                        class="dropdown-item @if (@$_GET['sortBy'] == 'priceAsc') active @endif"
                                        href="javascript:;">@lang('trans.Price ascending')</a></li>
                                <li data-value="priceDes"><a
                                        class="dropdown-item @if (@$_GET['sortBy'] == 'priceDes') active @endif"
                                        href="javascript:;">@lang('trans.Price descending')</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($Products as $product)
                            <div class="col-lg-3 col-md-6 col-12 p-3 position-relative d-flex">
                                @if ($product->HasDiscount())
                                    <div class="position-absolute py-3 px-4 discount text-white">
                                        -{{ (int) $product->discount }}%</div>
                                @endif
                                @php
                                    if ($product->most_selling == 1) {
                                        $Cat_id = 'bestSelling';
                                    } elseif ($product->new_collection == 1) {
                                        $Cat_id = 'newCollection';
                                    } else {
                                        $Cat_id = $product->Categories()->first()->id;
                                    }
                                @endphp
                                <div class="card best-selling--card" style="width: 18rem">
                                    <div class="icons flex-column">
                                        <a href="javascript:;" class="wish-btn wish p-3"
                                            data-product_id="{{ $product->id }}" data-cat_id="{{ $Cat_id }}">
                                            @php
                                                $inWishList = \App\Models\WhishList::where('client_id', client_id())
                                                    ->where('product_id', $product->id)
                                                    ->where('category', $Cat_id)
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
                                        href="{{ route('client.product', ['id' => $product->id, 'category_id' => $Cat_id]) }}">
                                        <div class="img-card-container">
                                            <img src="{{ asset($product->RandomImage()) }}" class="card-img-top"
                                                alt="abaya" />
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
                    <nav aria-label="Page navigation example " class="d-flex justify-content-center">
                        <ul class="pagination">

                            @if ($Products->hasPages())
                                <li class="page-item">
                                    {{ $Products->withQueryString()->links('pagination::bootstrap-4') }}
                                </li>
                            @endif

                        </ul>
                    </nav>
                </section>
                <section class="sidebar">
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                        aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header mt-5 px-5">
                            <h5 class="offcanvas-title filter" id="offcanvasExampleLabel">
                                @lang('trans.filter')
                            </h5>
                            <button type="button" class="btn-close filter" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body d-flex flex-column">
                            <form id="filterForm" class="filter-form px-5 my-5">
                                <input type="hidden" name="search" value="{{ @$_GET['search'] }}">
                                <input type="hidden" id="sortByValue" name="sortBy" value="{{ @$_GET['sortBy'] }}">
                                <p class="filter-color py-2">@lang('trans.color')<span class="colorNum">(@php
                                    $colorArry = (array) request('colors');
                                    echo count($colorArry);
                                @endphp)
                                </p>
                                @foreach ($Colors as $color)
                                    <div class="mb-5">
                                        <div class="form-check">
                                            <input @checked(in_array($color->id, (array) request('colors'))) type="checkbox"
                                                id="Color-{{ $color->id }}" name="colors[]"
                                                value="{{ $color->id }}" class="form-check-input filter-check-input"
                                                value="{{ $color->id }}" placeholder="1" />
                                            <label for="Color-{{ $color->id }}"
                                                class="form-check-label filter-check-label">{{ $color->title() }}</label>
                                        </div>
                                    </div>
                                @endforeach

                                <p class="filter-color  py-2">@lang('trans.size')<span
                                        class="sizenum">(@php
                                            $sizeArry = (array) request('sizes');
                                            echo count($sizeArry);
                                        @endphp)</span></p>
                                <ul class="size-filter d-flex flex-wrap gap-3 ">
                                    @foreach ($Sizes as $size)
                                        <li>
                                            <button
                                                class="btn size-btn {{ in_array($size->id, (array) request('sizes')) ? 'active' : '' }}">{{ $size->title() }}</button>
                                            <input @checked(in_array($size->id, (array) request('sizes'))) type="checkbox" name="sizes[]"
                                                value="{{ $size->id }}" style="display: none">
                                        </li>
                                    @endforeach


                                </ul>

                                <!-- Toggle Button -->
                                <div class="text-box my-5 px-5 pt-5">
                                    <button type="submit" class="btn w-100">@lang('trans.Show products')</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            @else
                <section class="search container section-top">

                    <p class="search-results">@lang('trans.Search results')</p>
                    <p class="results-heading">@lang('trans.No Result')</p>
                </section>
                <section class="products-search-slider container">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            @foreach ($ProductsBestSelling as $ProductBestSelling)
                                <div class="swiper-slide">
                                    <a href="{{ route('client.product', ['id' => $ProductBestSelling->id, 'category_id' => 'bestSelling']) }}"
                                        class="card best-selling--card search-card" style="width: 18rem">
                                        <img src="{{ asset($ProductBestSelling->RandomImage()) }}"
                                            class="card-img-top like-img" alt="abaya" />
                                        <div class="card-body">
                                            <h5 class="card-title text-center">
                                                {{ $ProductBestSelling->title() }}
                                            </h5>
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
        @else
            <section class="products-search-slider container">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @foreach ($ProductsBestSelling as $ProductBestSelling)
                            <div class="swiper-slide">
                                <a href="{{ route('client.product', ['id' => $ProductBestSelling->id, 'category_id' => 'bestSelling']) }}"
                                    class="card best-selling--card search-card" style="width: 18rem">
                                    <img src="{{ asset($ProductBestSelling->RandomImage()) }}"
                                        class="card-img-top like-img" alt="abaya" />
                                    <div class="card-body">
                                        <h5 class="card-title text-center">
                                            {{ $ProductBestSelling->title() }}
                                        </h5>
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


    </main>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {

            // $('#filterForm').submit(function(e) {
            //     e.preventDefault(); // Prevent default form submission

            //     filterProducts(); // Call function to filter products
            // });
            $('#sortBy').on('click', 'li', function() {
                $('#sortBy li').removeClass('active'); // Remove active class from all items
                $(this).addClass('active'); // Add active class to the clicked item
                // filterProducts(); // Call function to filter products
                $("#sortByValue").val($(this).data("value"));
                $('#filterForm').submit();

            });
            $('.size-btn').click(function() {
                $(this).next('input[type="checkbox"]').prop('checked', !$(this).next().prop('checked'));

            });

            // function filterProducts() {
            //     var formData = $('#filterForm').serialize(); // Serialize form data

            //     var sortBy = $('#sortBy li.active').data('value');
            //     var ajaxRequest = 'search?'
            //     var search = "{{ @$_GET['search'] }}"
            //     // Get selected sorting option

            //     if (sortBy != undefined) {
            //         ajaxRequest += "sortBy=" + sortBy + '&';
            //     }
            //     if (search != undefined) {
            //         ajaxRequest += "search=" + search + '&';
            //     }
            //     if (formData) {
            //         ajaxRequest += formData + '&';
            //     }

            //     window.location = ajaxRequest // Redirect with

            // }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxes = document.querySelectorAll('.filter-check-input');
            const colorNumSpan = document.querySelector('.colorNum');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateCheckboxCount);
            });

            function updateCheckboxCount() {
                const selectedCheckboxes = document.querySelectorAll('.filter-check-input:checked');
                colorNumSpan.textContent = `(${selectedCheckboxes.length})`;
            }
        });
        document.addEventListener('DOMContentLoaded', function() {
            const sizeButtons = document.querySelectorAll('.size-btn');
            const sizeNumSpan = document.querySelector('.sizenum');

            function handleButtonClick(buttons, currentButton) {
                // buttons.forEach(btn => {
                //   if (btn !== currentButton) {
                //     btn.classList.remove('active');
                //   }
                // });
                currentButton.classList.toggle('active');
                updateSizeCount();
            }

            sizeButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault()
                    handleButtonClick(sizeButtons, this);
                });
            });

            function updateSizeCount() {
                const selectedSizes = Array.from(sizeButtons).filter(button => button.classList.contains('active'));
                sizeNumSpan.textContent = `(${selectedSizes.length})`;
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.wish-btn').on('click', function(e) {
            var product_id = $(this).data('product_id')
            var quantity = $('#quantity').val()
            var size_id = $('#size_input').val()
            var category = $(this).data('cat_id')
            var color_id = $('.gallery-img-box.border-black').data('color_id')
            var $likedIcon = $(this).find('.liked-icon');

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
    </script>
@endpush
