@extends('Client.layouts.layout')
@push('css')
   @if (lang()=='ar')
       <style>
        .cart-card {
            margin-left:0;
        }
       </style>
   @endif
@endpush
@section('content')
    @if ($whishLists->count())
        <main class="section-top">
            <section class="wishlist container my-5 pt-5">
                <div class="myWishlist">
                    <p>@lang('trans.WISHLIST')</p>
                    <button id="removeAll" class="btn ">@lang('trans.Remove all')</button>
                </div>
            </section>
            <section class="wishlist-table container">
                <div class="col-lg-12">
                    <section class="cart-table">
                        <table>
                            <thead class="table-header cart-header">
                                <tr>
                                    <th>@lang('trans.PRODUCT')</th>
                                    <th>@lang('trans.NAME')</th>
                                    <th>@lang('trans.UNIT PRICE')</th>
                                    <th>@lang('trans.STOCK STATUS')</th>
                                    <th>@lang('trans.ADD TO CART')</th>
                                    <th>@lang('trans.REMOVE')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($whishLists as $item)
                                    <tr id="cart-{{ $item->id }}" class="number table-description cart-description">
                                        <td>
                                            <div class="col-lg-3 mx-auto col-6 img-box py-5">
                                                <img class="w-100 text-center"
                                                    src="{{ asset($item->Product->RandomImage()) }}" />
                                            </div>
                                        </td>
                                        <td class="td-name">{{ $item->Product->title() }}</td>
                                        <td>{{ Country()->currancy_code }}
                                            {{ $item->Product->CalcPrice() }}</td>
                                        <td>
                                            {{ $item->Product->in_stock == 1 ? __('trans.in_stock') : __('trans.outStock') }}
                                        </td>
                                        <td> <a href="{{ route('client.product', ['id' => $item->Product->id, 'category_id' => $item->category]) }}"
                                                class="btn btn-cart transform" data-id="{{ $item->id }}">
                                                <span><img src="{{ asset('frontEnd/assets/wishlist/addtocart.png') }}"
                                                        alt /></span>@lang('trans.ADD TO CART')
                                            </a></td>
                                        <td>
                                            <button data-id="{{ $item->id }}" class="btn remove me-5">
                                                <span><img src="{{ asset('frontEnd/assets/wishlist/remove.png') }}"
                                                        alt /></span>@lang('trans.REMOVE')
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </section>

                </div>
            </section>
        </main>
    @else
        <div class="container mt-5 pt-5 section-top">
            <div class="row ">
                <h2 class=" empty-heading">@lang('trans.YOUR WISH LIST')</h2>
            </div>
        </div>
        <section class="empty-section mb-5 pb-5">
            <div class="empty-img-box">
                <img src="{{ asset('frontEnd/assets/empty-state-pages/cart.png') }}" alt />
            </div>
            <p>@lang('trans.Your wish list is currently empty')</p>
            <p>@lang('trans.Start adding products to your carts')</p>
            <a href="{{ route('client.shop', 'newCollection') }}" class="btn continue-shopping--btn">@lang('trans.CONTINUE SHOPPING')</a>
        </section>
    @endif
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on("click", "#removeAll", function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('client.deleteitemWishListAll') }}",
                type: "POST",
                async: true,
                data: {
                    "_token": "{{ csrf_token() }}"
                },

                success: function(data) {
                    Swal.fire({
                        title: data.message,
                        icon: data.type,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        // Reload the page after the message is closed
                        location.reload(true);

                    });
                }
            });
        });

        $(document).on("click", ".remove", function(e) {
            e.preventDefault();
            id = $(this).attr('data-id');

            $('#cart-' + id).remove();
            if ($('.number').length == 0) {
                location.reload(true);
            }
            $.ajax({
                url: "{{ route('client.deleteitemWishList') }}",
                type: "POST",
                async: true,
                data: {
                    id: id,
                    "_token": "{{ csrf_token() }}"
                },

                success: function(data) {
                    toast(data.type, data.message);
                }
            });
        });

        function toast(type, title) {
            Swal.fire({
                title: title,
                icon: type,
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
@endpush
