@extends('Client.layouts.layout')
@push('css')
    @if (lang() == 'ar')
        <style>
            .cart-card {
                margin-left: 0;
            }
        </style>
    @endif
@endpush
@section('content')
    @if ($Carts->count())
        {{-- <form action="{{ route('client.confirm') }}" method="POST">
        @csrf

        <div class="bg-ccc py-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">

                        @foreach ($Cart as $CartItem)       
                            @php($Product = $CartItem->Product->first())
                            @php($ProPrice = format_number($Product->CalcPrice() + $CartItem->additions?->sum('price')) )
                            <div class="card border shadow-none" id="cart-{{ $CartItem->id }}">
                                <div class="card-body p-0">
                                    <i class="fa-solid fa-trash-can text-danger position-absolute h4 point" style="right: 20px;bottom: 10px;" data-id="{{ $CartItem->id }}"></i>
                                    <div class="d-flex align-items-start border-bottom pb-3 p-3">
                                        <div class="me-4">
                                            <img src="{{ asset($CartItem->Product->RandomImage()) }}" alt="" class="avatar-lg rounded" style="margin: 5px;">
                                        </div>
                                        <div class="flex-grow-1 align-self-center overflow-hidden">
                                            <div>
                                                <div class="text-truncate font-size-18 d-flex justify-content-between">
                                                    <small>
                                                        <a href="{{ route('client.product',$CartItem->Product) }}" class="text-dark">
                                                            {{ $CartItem->Product->title() }}
                                                        </a> 
                                                    </small>
                                                    <div class="d-inline-flex">
                                                        <div class="number d-flex align-items-center">
                                                            <span data-id="{{ $CartItem->id }}" class="minus">-</span>
                                                            <input data-price="{{ $ProPrice  }}" data-exclusive-vat="{{ $CartItem->Product->VAT == 'exclusive' ? $ProPrice : 0  }}" data-id="{{ $CartItem->id }}" data-discount="{{ format_number($Product->Price() + $CartItem->additions?->sum('price')) -  $ProPrice }}" type="text" class="form-control border-0" value="{{ $CartItem->quantity }}" readonly />
                                                            <span data-id="{{ $CartItem->id }}" class="plus">+</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <p><span id="total-{{ $CartItem->id }}">{{ $ProPrice * $CartItem->quantity }}</span> {{ Country()->currancy_code }}</p>
                                                @if ($CartItem->Size)
                                                <p class="mb-0 mt-1">@lang('trans.size') : <span class="fw-medium">{{ $CartItem->Size->title() }}</span></p>
                                                @endif
                                                @if ($CartItem->Color)
                                                <p class="mb-0 mt-1">@lang('trans.color') : <span class="fw-medium">{{ $CartItem->Color->title() }}</span></p>
                                                @endif
                                                @if ($CartItem->Drink)
                                                <p class="mb-0 mt-1">@lang('trans.drinks') : <span class="fw-medium">{{ $CartItem->Drink->title() }}</span></p>
                                                @endif
                                                @if ($CartItem->additions)
                                                    <p class="mb-0 mt-1">@lang('trans.additions') : <span class="fw-medium">{{ $CartItem->additions->implode('title_'.lang(), ', ') }}</span></p>
                                                @endif
                                                @if ($CartItem->removes)
                                                    <p class="mb-0 mt-1">@lang('trans.removes') : <span class="fw-medium">{{ $CartItem->removes->implode('title_'.lang(), ', ') }}</span></p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0 ms-2">
                                            <ul class="list-inline mb-0 font-size-16">
                                                <li class="list-inline-item">
                                                    <a href="#" class="text-muted px-1">
                                                        <i class="mdi mdi-trash-can-outline"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="text-muted px-1">
                                                        <i class="mdi mdi-heart-outline"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                  
                                </div>
                            </div>
                        @endforeach

                    </div>
                
                    <div class="col-xl-4">
                        
                        @if (Deliveries()->count() > 1)
                            <div class="mt-5 mt-lg-0">
                                <div class="card border shadow-none" style="text-align: inherit">
                                    <div class="card-header bg-transparent border-bottom py-3 px-4">
                                        <h5 class="font-size-16 mb-0">@lang('trans.Delivery Information')</h5>
                                    </div>
                                    <div class="card-body p-4 pt-2">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    @foreach (Deliveries() as $Delivery)        
                                                        <tr>
                                                            <td>
                                                                <div class="form-check form-check-inline">
                                                                    <label for="del-{{ $Delivery->id }}">
                                                                        @if ($Delivery->id == 1)
                                                                            <img src="{{ asset('assets/imgs/delivery.png') }}" alt="delivery" style="max-width: 50px;margin: 0px 5px">
                                                                        @elseif ($Delivery->id == 2)
                                                                            <img src="{{ asset('assets/imgs/pickup.png') }}" alt="delivery" style="max-width: 50px;margin: 0px 5px">
                                                                        @else
                                                                            <img src="{{ asset('assets/imgs/dinein.svg') }}" alt="delivery" style="max-width: 50px;margin: 0px 5px">
                                                                        @endif
                                                                    </label>
                                                                    <input class="form-check-input" style="margin-top: 15px;" type="radio" name="delivery_id" id="del-{{ $Delivery->id }}" value="{{ $Delivery->id }}" @checked($loop->first)>
                                                                    <label class="form-check-label" for="del-{{ $Delivery->id }}">{{ $Delivery->title() }}</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <input type="hidden" name="delivery_id" id="delivery_id" value="{{ Deliveries()->first()->id }}">
                        @endif
                        
                        
                        <div class="mt-5 mt-lg-0">
                            <div class="card border shadow-none" style="text-align: inherit">
                                <div class="card-header bg-transparent border-bottom py-3 px-4">
                                    <h5 class="font-size-16 mb-0">@lang('trans.order') @lang('trans.Summary')</h5>
                                </div>
                                <div class="card-body p-4 pt-2">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>@lang('trans.sub_total') :</td>
                                                    <td class="text-end">{{ Country()->currancy_code }} <span id="sub_total">1</span> </td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('trans.Discount') : </td>
                                                    <td class="text-end">- {{ Country()->currancy_code }} <span id="discount">1</span> </td>
                                                </tr>
                                                <tr>
                                                    <td>@lang('trans.vat') ( {{ setting('VAT') }}% ) : </td>
                                                    <td class="text-end">{{ Country()->currancy_code }} <span id="vat">1</span> </td>
                                                </tr>
                                                <tr class="bg-light">
                                                    <th>@lang('trans.netTotal') :</th>
                                                    <td class="text-end">
                                                        <span class="fw-bold">
                                                            {{ Country()->currancy_code }} <span id="netTotal">1</span>
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 mt-lg-0">
                            <div class="mb-3 w-100 d-flex flex-column align-items-center">
                                <button type="submit" href="checkoutDelivery.html" class="btn btn-dark px-4 btn m-auto border border-1 border-dark rounded-3 gap-2 my-2 w-50 py-2">@lang('trans.check_out')</button>
                                <a  href="{{ route('client.shop') }}" class="text-black text-decoration-underline text-center  m-auto  gap-2 my-2  py-2">@lang('trans.Continue Shopping')</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form> --}}
        <main>
            <section class="cart-section row container--1 section-top">
                <div class="col-lg-9">

                    <div class="row cart-table bg-dark text-white text-center py-5 cart-header d-lg-flex d-none">
                        <div class="col-2">@lang('trans.PRODUCT')</div>
                        <div class="col-2">@lang('trans.NAME')</div>
                        <div class="col-2">@lang('trans.UNIT PRICE')</div>
                        <div class="col-2">@lang('trans.QUANTITY')</div>
                        <div class="col-2">@lang('trans.SUBTOTAL')</div>
                        <div class="col-2">@lang('trans.REMOVE')</div>
                    </div>
                    @foreach ($Carts as $item)
                        <div id="cart-{{ $item->id }}"
                            class="row text-center align-items-center justify-content-center cart-description border border-dark border-top-0">
                            <div class="col-lg-2 col-6 img-box py-3"> <img class="w-100"
                                    src="{{ asset($item->Color?$item->Color->Header[0]->header:$item->Product->RandomImage()) }}" /></div>
                            <div class="col-lg-2 col-6 td-name ">{{ $item->Product->title() }}</div>
                            <div class="col-lg-2 col-12 d-flex justify-content-center">
                                <span class="d-lg-none px-2">@lang('trans.UNIT PRICE'):</span>
                                <span class="px-2"> {{ Country()->currancy_code }}
                                    {{ $item->Product->CalcPrice() }}</span>

                            </div>
                            <div class="number col-lg-2 col-6">
                                <div class="items-amount btns">
                                    <button class="btn minus" data-id="{{ $item->id }}">
                                        <i class="fa-regular fa-minus"></i>
                                    </button>
                                    <input type="number" min="1" max="10" value="{{ $item->quantity }}"
                                        readonly />
                                    <button class="btn plus" data-id="{{ $item->id }}">
                                        <i class="fa-regular fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-2  d-lg-block d-none" id="subTotalItem{{ $item->id }}">
                                {{ Country()->currancy_code }}
                                {{ number_format($item->Product->CalcPrice() * $item->quantity, Country()->decimals, '.', '') }}
                            </div>
                            <div class="col-lg-2 col-6 d-flex justify-content-center">
                                <button data-id="{{ $item->id }}" class="btn remove">
                                    <span><img src="./assets/wishlist/remove.png" class="px-1"
                                            alt /></span>@lang('trans.REMOVE')
                                </button>
                            </div>
                            {{-- <div class="col-12 d-lg-none d-block">
                                <div class="row justify-content-between">
                                    <div class="col-6 ">
                                        <span> Subtotal </span>
                                    </div>
                                    <div class="col-6">
                                        <span>SAR 60.00</span>
                                    </div>
                                </div>

                            </div> --}}
                        </div>
                    @endforeach




                </div>
                <div class="col-lg-3 cart-card-container">
                    <div class="cart-card">
                        <h3>@lang('trans.Cart')</h3>
                        <div class="card-item">
                            <p>@lang('trans.subTotal')</p>
                            <p class="subTotal">{{ Country()->currancy_code }} {{ $subTotal }}</p>
                        </div>
                        <div class="card-item">
                            <p>@lang('trans.VAT')({{ setting('VAT') }}%)</p>
                            <p class="vat">{{ Country()->currancy_code }} {{ $vat }}</p>
                        </div>
                        <div class="card-item">
                            <p>@lang('trans.Total')</p>
                            <p class="total">{{ Country()->currancy_code }} {{ $total }}</p>
                        </div>
                        <a class="btn checkout--btn" href="{{ route('client.confirm') }}">@lang('trans.check_out')</a>
                        <a href="{{ route('client.shop', 'newCollection') }}"
                            class="btn shopping--btn">@lang('trans.CONTINUE SHOPPING')</a>
                    </div>
                </div>
            </section>
        </main>
    @else
        <div class="container mt-5 pt-5 section-top">
            <div class="row ">
                <h2 class=" empty-heading">@lang('trans.YOUR CART')</h2>
            </div>
        </div>
        <section class="empty-section mb-5 pb-5">
            <div class="empty-img-box">
                <img src="{{ asset('frontEnd/assets/empty-state-pages/cart.png') }}" alt />
            </div>
            <p>@lang('trans.Your cart is currently empty')</p>
            <p>@lang('trans.Start adding products to your carts')</p>
            <a href="{{ route('client.shop', 'newCollection') }}" class="btn continue-shopping--btn">@lang('trans.CONTINUE SHOPPING')</a>
        </section>
    @endif
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on("click", ".remove", function() {
            id = $(this).attr('data-id');
            // console.log(id);
            var currancy_code = "{{ Country()->currancy_code }}";
            $('#cart-' + id).remove();
            if ($('.number').length == 0) {
                location.reload(true);
            }
            $.ajax({
                url: "{{ route('client.deleteitem') }}",
                dataType: "json",
                type: "POST",
                async: true,
                data: {
                    id: id,
                    "_token": "{{ csrf_token() }}"
                },

                success: function(data) {
                    $('#cartCount').text(`(${data.cart_count})`);
                    toast(data.type, data.message);
                    $('.subTotal').html(`${currancy_code} ${data.subTotal}`)
                    $('.vat').html(`${currancy_code} ${data.vat}`)
                    $('.total').html(`${currancy_code} ${data.total}`)
                }
            });
        });
        $(document).on("click", ".minus", function() {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            var currancy_code = "{{ Country()->currancy_code }}";

            id = $(this).attr('data-id');
            $.ajax({
                url: "{{ route('client.minus') }}",
                dataType: "json",
                type: "POST",
                async: true,
                data: {
                    id: id,
                    count: count,
                    "_token": "{{ csrf_token() }}"
                },

                success: function(data) {
                    toast(data.type, data.message);
                    $('#subTotalItem' + id).html(data.subTotalItem)
                    $('.subTotal').html(`${currancy_code} ${data.subTotal}`)
                    $('.vat').html(`${currancy_code} ${data.vat}`)
                    $('.total').html(`${currancy_code} ${data.total}`)
                }
            });
        });
        $(document).on("click", ".plus", function() {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) + 1;
            var currancy_code = "{{ Country()->currancy_code }}";
            if (count > 10) {
                $input.val(10)
                // $input.change();
                alert('no enough quantity')
            } else {
                $input.val(count);
                $input.change();
            }
            id = $(this).attr('data-id');

            $.ajax({
                url: "{{ route('client.plus') }}",
                dataType: "json",
                type: "POST",
                async: true,
                data: {
                    id: id,
                    count: $input.val(),
                    "_token": "{{ csrf_token() }}"
                },

                success: function(data) {
                    console.log(data.subTotalItem);
                    toast(data.type, data.message);

                    $('#subTotalItem' + id).html(data.subTotalItem)
                    $('.subTotal').html(`${currancy_code} ${data.subTotal}`)
                    $('.vat').html(`${currancy_code} ${data.vat}`)
                    $('.total').html(`${currancy_code} ${data.total}`)
                    // calc();
                }
            });
        });

        // function calc() {
        //     decimals = {{ Country()->decimals }};
        //     sub_total = 0;
        //     discount = 0;
        //     vat_percentage = {{ setting('VAT') }};
        //     $('.number').each(function(i, obj) {
        //         total = 0;
        //         id = parseFloat($(obj).find('input').attr('data-id'));
        //         quantity = parseFloat($(obj).find('input').val());
        //         price = parseFloat($(obj).find('input').attr('data-price'));
        //         discount += parseFloat($(obj).find('input').attr('data-discount')) * parseFloat(quantity);
        //         total = (parseFloat(price) * parseFloat(quantity));
        //         $('#total-' + id).html(total.toFixed(decimals));
        //         sub_total += total;

        //         exclusive_sub_total = parseFloat($(obj).find('input').attr('data-exclusive-vat')) * parseFloat(
        //             quantity);
        //     });
        //     if (discount <= 0) {
        //         $('#discount').parent().parent().addClass('d-none');
        //     } else {
        //         $('#discount').parent().parent().removeClass('d-none');
        //     }
        //     vat = exclusive_sub_total / 100 * vat_percentage;
        //     netTotal = sub_total + vat;
        //     sub_total += discount;
        //     $('#sub_total').html(sub_total.toFixed(decimals));
        //     $('#discount').html(discount.toFixed(decimals));
        //     $('#vat').html(vat.toFixed(decimals));
        //     $('#netTotal').html(netTotal.toFixed(decimals));
        // }
        // calc();

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



@push('css')
    <style>
        .bg-ccc {
            background-color: #f1f3f7;
        }

        .avatar-lg {
            height: auto;
            max-width: 6rem;
            max-height: 10rem
        }

        .font-size-18 {
            font-size: 18px !important;
        }

        .text-truncate {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        a {
            text-decoration: none !important;
        }

        .w-xl {
            min-width: 160px;
        }

        .card {
            margin-bottom: 24px;
            -webkit-box-shadow: 0 2px 3px #e4e8f0;
            box-shadow: 0 2px 3px #e4e8f0;
        }

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid #eff0f2;
            border-radius: 1rem;
        }

        .minus,
        .plus {
            width: 20px;
            background: #f2f2f2;
            border-radius: 4px;
            border: 1px solid #ddd;
            display: inline-block;
            vertical-align: middle;
            text-align: center;
            cursor: pointer;
        }

        .number input {
            height: 34px;
            width: 100px;
            text-align: center;
            font-size: 26px;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: inline-block;
            vertical-align: middle;
            max-width: 51px;
        }
    </style>
@endpush
