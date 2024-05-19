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
    {{-- <div class="container  section-top">
    <div class="row align-items-center">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-5">
                <li class="breadcrumb-item">
                    <a href="{{ route('client.home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                            <path d="M1.5 9.93841C1.5 8.71422 2.06058 7.55744 3.02142 6.79888L8.52142 2.45677C9.97466 1.30948 12.0253 1.30948 13.4786 2.45677L18.9786 6.79888C19.9394 7.55744 20.5 8.71422 20.5 9.93841V16.5C20.5 18.7091 18.7091 20.5 16.5 20.5H15C14.4477 20.5 14 20.0523 14 19.5V16.5C14 15.3954 13.1046 14.5 12 14.5H10C8.89543 14.5 8 15.3954 8 16.5V19.5C8 20.0523 7.55228 20.5 7 20.5H5.5C3.29086 20.5 1.5 18.7091 1.5 16.5L1.5 9.93841Z" fill="#9D9D9D" stroke="#9D9D9D" stroke-width="1.5" />
                        </svg>
                        @lang('trans.Home')
                    </a>
                </li>
                <li class="breadcrumb-item fw-semibold" aria-current="page">@lang('trans.Products')</li>
            </ol>
        </nav>
    </div>
</div>
<div class="gray-bage">
    <div class="container ">
        <div class="row ">
            <h4 class="d-lg-none d-block py-3 fs-6 fw-bold text-uppercase " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                @lang('trans.filter')
                <span><i class="fa-solid fa-filter"></i></span>
            </h4>
        </div>
    </div>
</div>
<div class="container my-2">
    <div class="row  ">
        <div class="col-lg-3  d-lg-block d-none border border-1 border-black my-3 ">
            @include('Client.layouts.Filter')
        </div>
        <div class="col-lg-9">

            @if ($Products->count())
                <div class="row">
                    @foreach ($Products as $Product)
                    <div class="p-3 col-lg-4 col-md-4 col-6  position-relative ">
                        @include('Client.layouts.product',['Product'=>$Product])
                    </div>
                    @endforeach
                </div>
                <div class="col-12">
                    @if ($Products->hasPages())
                    <div class="pagination-wrapper">
                        {{ $Products->links('pagination::bootstrap-5') }}
                    </div>
                    @endif
                </div>
            @else
                <div class="row justify-content-center align-items-center">
                    <div class="img d-flex justify-content-center">
                        <img src="assets/imgs/empaty/7166991_3554477 1.svg">
                    </div>
                    <div class="py-4">
                        <p class="text-secondary text-center">@lang('trans.Data not found')</p>
                    </div>
                </div>
            @endif
           
        </div>
    </div>
</div>


<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header justify-content-end">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body ">
        @include('Client.layouts.Filter')
    </div>
</div> --}}

    <main>
        @if (request()->route('category_id') == 'bestSelling')
            <section class="new-collection-hero d-flex">
                {{-- <div class="new-col-img-box">
            <img src="{{ asset($subCategory->image) }}" />
        </div> --}}
                <div class="new-col-text-box">
                    <h3>@lang('trans.BEST SELLING')</h3>
                    {{-- <h2>Super Sale</h2> --}}
                </div>
            </section>
        @elseif (request()->route('category_id') == 'newCollection')
            <section class="new-collection-hero d-flex">
                {{-- <div class="new-col-img-box">
                <img src="{{ asset($subCategory->image) }}" />
            </div> --}}
                <div class="new-col-text-box">
                    <h3>@lang('trans.NEW COLLECTION')</h3>
                    {{-- <h2>Super Sale</h2> --}}
                </div>
            </section>
        @else
            <section class="new-collection-hero d-flex">
                <div class="new-col-img-box">
                    <img src="{{ asset($subCategory->image) }}" />
                </div>
                <div class="new-col-text-box">
                    <h3>{{ $subCategory->title() }}</h3>
                    <h2>{{ $subSubCategory->title() }}</h2>
                </div>
            </section>
        @endif

        <section class="best-selling container">
            <div class="new-collection-action d-flex justify-content-between align-items-center mb-5">
                <button class="btn filters" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                    aria-controls="offcanvasExample">
                    <span><img
                            src="{{ asset('frontEnd/assets/New-collection/filters-icon.png') }}" /></span>@lang('trans.filter')
                </button>
                <div class="dropdown">
                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @lang('trans.SortBy')<i class="fa-solid fa-angle-down"></i>
                    </button>
                    <ul id="sortBy" class="dropdown-menu">
                        <li data-value="best"><a class="dropdown-item @if (@$_GET['sortBy'] == 'best') active @endif"
                                href="javascript:;">@lang('trans.Best selling')</a></li>
                        <li data-value="priceAsc"><a class="dropdown-item @if (@$_GET['sortBy'] == 'priceAsc') active @endif"
                                href="javascript:;">@lang('trans.Price ascending')</a></li>
                        <li data-value="priceDes"><a class="dropdown-item @if (@$_GET['sortBy'] == 'priceDes') active @endif"
                                href="javascript:;">@lang('trans.Price descending')</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">

                @if ($Products->count())
                    @foreach ($Products as $product)
                        <div class="col-lg-3 col-md-6 col-12 p-3 position-relative d-flex">
                            @if ($product->HasDiscount())
                                <div class="position-absolute py-3 px-4 discount text-white">
                                    -{{ (int) $product->discount }}%</div>
                            @endif
                            @php
                                if (request()->route('category_id') == 'bestSelling') {
                                    $Cat_id = 'bestSelling';
                                } elseif (request()->route('category_id') == 'newCollection') {
                                    $Cat_id = 'newCollection';
                                } else {
                                    $Cat_id = request()->route('category_id');
                                }
                            @endphp
                            <div class="card best-selling--card" style="width: 18rem">
                                <div class="icons flex-column">
                                    <a href="javascript:;" class="wish-btn wish p-3" data-product_id="{{ $product->id }}">
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
                @else
                    <div class="row justify-content-center align-items-center">
                        <div class="img d-flex justify-content-center">
                            <img src="{{ asset('assets/imgs/empaty/7166991_3554477 1.svg') }}">
                        </div>
                        <div class="py-4">
                            <p class="text-secondary text-center">@lang('trans.Data not found')</p>
                        </div>
                    </div>
                @endif
            </div>
            @if ($Products->count())
                <nav aria-label="Page navigation example " class="d-flex justify-content-center">
                    <ul class="pagination">

                        @if ($Products->hasPages())
                            <li class="page-item">
                                {{ $Products->withQueryString()->links('pagination::bootstrap-4') }}
                            </li>
                        @endif

                    </ul>
                </nav>
            @endif
        </section>
        <section class="sidebar">
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header mt-5 px-5">
                    <h5 class="offcanvas-title filter" id="offcanvasExampleLabel">
                        @lang('trans.filter')
                    </h5>
                    <button type="button" class="btn-close filter" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body d-flex flex-column">
                    <form id="filterForm" class="filter-form px-5 my-5">
                        <input type="hidden" id="sortByValue" name="sortBy" value="{{ @$_GET['sortBy'] }}">
                        <p class="filter-color py-2">@lang('trans.color')<span class="colorNum">(@php
                            $colorArry = (array) request('colors');
                            echo count($colorArry);
                        @endphp)</p>
                        @foreach ($Colors as $color)
                            <div class="mb-5">
                                <div class="form-check">
                                    <input @checked(in_array($color->id, (array) request('colors'))) type="checkbox" id="Color-{{ $color->id }}"
                                        name="colors[]" value="{{ $color->id }}"
                                        class="form-check-input filter-check-input" value="{{ $color->id }}"
                                        placeholder="1" />
                                    <label for="Color-{{ $color->id }}"
                                        class="form-check-label filter-check-label">{{ $color->title() }}</label>
                                </div>
                            </div>
                        @endforeach

                        <p class="filter-color  py-2">@lang('trans.size')<span class="sizenum">(@php
                            $sizeArry = (array) request('sizes');
                            echo count($sizeArry);
                        @endphp)</span>
                        </p>
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
    </main>
@endsection


@push('js')
    {{-- <script>
        // $(document).on("click", ".Toggle", function() {
        //     $(this).toggleClass('active');
        // });
</script> --}}
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
            //     var ajaxRequest = ''
            //     if ("{{ request()->route('category_id') == 'bestSelling' }}") {
            //         ajaxRequest = "{{ url('shop/bestSelling') }}?";
            //     } else if ("{{ request()->route('category_id') == 'newCollection' }}") {
            //         ajaxRequest = "{{ url('shop/newCollection') }}?";
            //     } else {
            //         ajaxRequest =
            //             "{{ url('shop/' . request()->route('category_id')) }}?";
            //     }
            //     if (sortBy != undefined) {
            //         ajaxRequest += "sortBy=" + sortBy + '&';
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
    {{-- <script src="js/script.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $('.wish-btn').on('click', function(e) {
            var product_id = $(this).data('product_id')
            var quantity = $('#quantity').val()
            var size_id = $('#size_input').val()
            var category = "{{ request()->route('category_id') }}"
            var color_id = $('.gallery-img-box.border-black').data('color_id')

            var path = "{{ route('client.AddToWhishList') }}";
            var $likedIcon = $(this).find('.liked-icon');
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
