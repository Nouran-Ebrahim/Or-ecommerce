@extends('Client.layouts.layout')
@push('css')
    <link rel="stylesheet" href="{{ asset('frontEnd/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontEnd/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontEnd/css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontEnd/scss/responsive.css') }}" />
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
                        @lang('trans.home')
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('client.shop') }}">
                        @lang('trans.profile')
                    </a>
                </li>
            </ol>
        </nav>
    </div>
</div>


<div class="container section-top my-5">
    <div class="row profile" style="column-gap: 10px;">
        <div class="col-lg-3 ">
            <div class="nav flex-lg-column flex-row  nav-pills  px-4 py-5 bg-black" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active  my-1" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                    <div class="row">
                        <div class=" col-12 d-flex flex-column justify-content-center text-center">
                            <h6 class="fw-bold  py-2 my-0 text-uppercase">
                                @lang('trans.Account Info')
                            </h6>
                        </div>
                    </div>
                </button>
                <button class="nav-link my-1" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    <div class="row">
                        <div class="col-12 d-flex flex-column justify-content-center text-center">
                            <h6 class="fw-bold py-2 my-0 text-uppercase">
                                @lang('trans.Current Orders')
                            </h6>

                        </div>
                    </div>
                </button>
                <button class="nav-link my-1" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                    <div class="row">
                        <div class="col-12 d-flex flex-column justify-content-center text-center">
                            <h6 class="fw-bold  py-2 my-0 text-uppercase">
                                @lang('trans.Last Orders')
                            </h6>
                        </div>
                    </div>
                </button>
            </div>
        </div>

        <div class="col-lg-8 col-12" style="min-height: 70vh;">
            <div class="row ">
                <div class="col-12 ">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                            <div class="border border-1 border-black px-2">
                                <div class="row gap-2 my-5 p-2 ">
                                    <div class="col-12 d-grid gap-2 d-md-flex justify-content-md-end px-3">
                                        <a href="{{ route('client.edit-profile') }}" class="text-secondary text-decoration-underline">@lang('trans.Edit')</a>
                                    </div>
                                    <div class="col-12">
                                        <h6>
                                            @lang('trans.name')
                                        </h6>
                                        <p class="fw-bolder">
                                            {{ $Client->name }}
                                        </p>
                                    </div>
                                    <div class="col-12">
                                        <h6>
                                            @lang('trans.Phone')
                                        </h6>
                                        <p class="fw-bolder">
                                            {{ $Client->phone }}
                                        </p>
                                    </div>
                                    @if ($Client->email)
                                    <div class="col-12">
                                        <h6>
                                            @lang('trans.Email')
                                        </h6>
                                        <p class="fw-bolder">
                                            {{ $Client->email }}
                                        </p>
                                    </div>
                                    @endif

                                    <div class="col-12">
                                        <h6>
                                            @lang('trans.Address')
                                        </h6>
                                        @foreach ($addresses as $address)
                                        <div class="form-check d-flex justify-content-between align-items-center">
                                            <label class="form-check-label">
                                                {{ $address->additional_directions }}
                                            </label>
                                            <div class="d-flex justify-content-md-end">
                                                <a href="{{ route('client.address.edit',$address) }}" class="text-secondary text-decoration-underline px-2" type="button">
                                                    @lang('trans.Edit')
                                                </a>
                                                <form action="{{ route('client.address.destroy',$address) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="display: contents" type="submit">
                                                        <span class="text-danger text-decoration-underline">
                                                            @lang('trans.Delete')
                                                        </span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>


                                    <div class="col-12">
                                        <div class="py-2 my-2">
                                            <a href="{{ route('client.address.create') }}">
                                                <span>
                                                    <i class="fa-solid fa-plus"></i>
                                                </span>
                                                <span>
                                                    @lang('trans.addAddress')
                                                </span>
                                            </a>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center my-5">
                                <a class="text-danger text-decoration-underline w-auto px-5" type="button" href="{{ route('client.logout') }}">
                                    @lang('trans.logout')
                                </a>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                            <div class="row py-2">
                                @if ($currentOrders->count())        
                                    @foreach ($currentOrders as $Order)
                                        <div class="col-12">
                                            @include('Client.layouts.order',['Order'=>$Order])
                                        </div>
                                    @endforeach
                                @else
                                <div class="text-center my-5">
                                    <img class="d-block m-auto" style="max-width: 300px" src="{{ asset('assets/imgs/empaty/Group.svg') }}">
                                </div>
                                <div class="text-center my-5">
                                    @lang('trans.You Have No Orders')
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade " id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
                            <div class="row py-2">
                                @if ($currentOrders->count())    
                                    @foreach ($previousOrders as $Order)
                                        <div class="col-12">
                                            @include('Client.layouts.order',['Order'=>$Order])
                                        </div>
                                    @endforeach
                                @else
                                
                                    <div class="text-center my-5">
                                        <img class="d-block m-auto" style="max-width: 300px" src="{{ asset('assets/imgs/empaty/Group.svg') }}">
                                    </div>
                                    <div class="text-center my-5">
                                        @lang('trans.You Have No Orders')
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

    <section class="profile container section-top" style="min-height: 75vh;">
        <div class="row align-items-start">
            <div class="col-lg-4 col-12">
                <div class="nav flex-nav-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link profile active" id="v-pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="true">
                        @lang('trans.My PROFILE')
                    </button>
                    <button class="nav-link profile" id="v-pills-orders-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders"
                        aria-selected="false">
                        @lang('trans.ORDERS')
                    </button>
                    <a href="{{ route('client.address.index') }}" class="nav-link profile " id="v-pills-address-tab"
                        data-bs-toggle="pill" data-bs-target="#v-pills-address" type="button" role="tab"
                        aria-controls="v-pills-address" aria-selected="false">
                        @lang('trans.ADDRESS')
                    </a>
                    <button class="nav-link profile" id="v-pills-edit-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-edit" type="button" role="tab" aria-controls="v-pills-edit"
                        aria-selected="false">
                        @lang('trans.Edit PROFILE')
                    </button>
                    <a href="{{ route('client.logout') }}" class="nav-link profile" id="v-pills-logout-tab" role="tab"
                        aria-controls="v-pills-logout" aria-selected="false">
                        @lang('trans.LOGOUT')
                    </a>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="tab-content profile-content your-orders" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab" tabindex="0">
                        <h1>@lang('trans.WELCOME TO YOUR ACCOUNT'),
                            {{ auth('client')->user()->first_name . ' ' . auth('client')->user()->last_name }}
                        </h1>
                        <p>@lang('trans.From your account  you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.')</p>
                        
                        <div class="view-item">
                            <div class="item-details">
                                <h4>@lang('trans.ORDER HISTORY')</h4>
                                <p>
                                    @lang('trans.View previous orders or the status of your current orders.')
                                </p>
                            </div>
                            <a href="{{ route('client.orderDetails') }}" class="btn view-btn">@lang('trans.VIEW ORDERS')</a>
                        </div>
                        <div class="view-item">
                            <div class="item-details">
                                <h4>@lang('trans.SHIPPING ADDRESSES')</h4>
                                <p>@lang('trans.Edit your delivery addresses.')</p>
                            </div>
                            <a href="{{ route('client.address.index') }}" class="btn view-btn">@lang('trans.VIEW ADDRESS')</a>
                        </div>
                        <div class="view-item">
                            <div class="item-details">
                                <h4>@lang('trans.Edit PROFILE')</h4>
                                <p>@lang('trans.Edit your profile details')</p>
                            </div>
                            <a href="{{ route('client.profile') }}" class="btn view-btn">@lang('trans.VIEW ACCOUNT')</a>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab"
                        tabindex="0">
                        <h1>@lang('trans.YOUR ORDERS')</h1>
                        @if ($Orders->count() > 0)
                            <p class="mb-2">
                                @lang('trans.Check the progress and details of your orders by viewing them online.')
                            </p>

                            <section class="cart-table">
                                <table>
                                    <thead class="table-header cart-header">
                                        <tr>
                                            <th>@lang('trans.ORDER NUMBER')</th>
                                            <th>@lang('trans.ORDER DATE')</th>
                                            <th>@lang('trans.STATUS')</th>
                                            <th>@lang('trans.TOTAL')</th>
                                            <th>@lang('trans.ACTIONS')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($Orders as $order)
                                            <tr class="table-description cart-description py-5">
                                                <td class="py-5">{{ $order->id }}</td>
                                                <td>{{ \Carbon\Carbon::parse($order->created_at)->format('F j, Y') }}
                                                </td>
                                                @if ($order->status == 0 && $order->follow == 0)
                                                    <td class="progress-status">@lang('trans.New')</td>
                                                @elseif ($order->status == 1 && $order->follow == 1)
                                                    <td class="progress-status">@lang('trans.In Progress')</td>
                                                @elseif ($order->status == 1 && $order->follow == 2)
                                                    <td class="progress-status">@lang('trans.order_onway')</td>
                                                @elseif ($order->status == 1 && $order->follow == 3)
                                                    <td class="progress-status">@lang('trans.Delieverd')</td>
                                                @else
                                                    <td class="progress-status">@lang('trans.Canceled')</td>
                                                @endif

                                                <td>{{ Country()->currancy_code_en }}
                                                    {{ number_format(Country()->currancy_value * $order->net_total, Country()->decimals, '.', '') }}
                                                </td>
                                                <td>
                                                    <button class="view--btn" data-order_id="{{ $order->id }}">
                                                        <img src="{{ asset('frontEnd/assets/profile/plus.png') }}"
                                                            data-alt-src="{{ asset('frontEnd/assets/profile/minus.png') }}"
                                                            alt="" class="view--btn-img" /><span
                                                            class="ms-3">@lang('trans.view')</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </section>
                            <section class="summary--section hide-content">
                                <h3>@lang('trans.Order summary')</h3>
                                <div class="row order-items-container">

                                </div>

                                <div class="row">
                                    <div class="col-lg-6 mb-5">
                                        <div class="shipping-section">
                                            <h3>@lang('trans.Shipping address')</h3>
                                            <p class="shipping-detail" id="country"></p>
                                            <p class="shipping-detail" id="addressDetails"></p>
                                        </div>
                                        <div class="payment-section">
                                            <h3>@lang('trans.Payment')</h3>

                                            <p><img id="paymentImage" src="./assets/profile/visa.png" alt="" />
                                            </p>

                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-5">
                                        <div class="summary-price">
                                            <div class="price-row">
                                                <p>@lang('trans.SUBTOTAL')</p>
                                                <p id="subTotal"></p>
                                            </div>
                                            <div class="price-row couponInfo" style="display: none">
                                                <p>@lang('trans.Coupon')</p>
                                                <p id="coupon"></p>
                                            </div>
                                            <div class="price-row">
                                                <p>@lang('trans.Vat')</p>
                                                <p id="vat"></p>
                                            </div>
                                            <div class="price-row couponInfo" style="display: none">
                                                <p>@lang('trans.Sub Total after coupon')</p>
                                                <p id="sub_total_after_coupon"></p>
                                            </div>
                                            <div class="price-row shippingCountainer">
                                                <p>@lang('trans.SHIPPING')</p>
                                                <p id="shipping"></p>
                                            </div>
                                            <div class="price-row">
                                                <p>@lang('trans.TOTAL')</p>
                                                <p class="total" id="total"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <button class="btn cancel--order-btn">Cancel order</button> --}}
                            </section>
                            {{-- <section class="cancel-pop-up hide-content">
                                <div class="cancel-box">
                                    <button class="btn cancel-close--btn">
                                        <img src="./assets/profile/close.png" alt="" />
                                    </button>
                                    <p>Are you sure you want to cancel your order?</p>
                                    <div class="actions">
                                        <button class="btn keep">Keep order</button>
                                        <button data-order_id_cancel="" id="order_cancel" class="btn cancel">Cancel
                                            order</button>
                                    </div>
                                </div>
                            </section> --}}
                        @else
                            <p class="mb-2">
                                @lang('trans.No orders Now')
                            </p>
                        @endif

                    </div>
                    <div class="tab-pane fade " id="v-pills-address" role="tabpanel"
                        aria-labelledby="v-pills-address-tab" tabindex="0">
                        <section class="addresses-section">
                            <h2>@lang('trans.YOUR ADDRESSES')</h2>
                            <p>
                                @lang('trans.Add new addresses, change your contact address, and see and manage addresses.')
                            </p>
                            <div class="adding-address">
                                <div class="add-address">
                                    <h4>@lang('trans.ADD ADDRESS')</h4>
                                    <p></p>
                                </div>
                                <a href="{{ route('client.address.create') }}" class="btn add-address--btn">@lang('trans.ADD ADDRESS')</a>
                            </div>
                        </section>
                        @if ($defaultAddress)
                            <section class="default-address">
                                <h2>@lang('trans.Default Address')</h2>
                                <div class="default-address-details">
                                    <div class="default-address-data">
                                        <h4>{{ $defaultAddress->country->title() }}</h4>
                                        <p>{{ $defaultAddress->road }}, {{ $defaultAddress->region->title() }}</p>
                                    </div>
                                    <div class="actions">
                                        <a href="{{ route('client.address.edit', $defaultAddress->id) }}"
                                            class="btn edit--btn d-flex align-items-center justify-content-center">@lang('trans.EDIT')</a>
                                        <form method="POST"
                                            action="{{ route('client.address.destroy', $defaultAddress->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn delete--btn d-flex align-items-center justify-content-center">@lang('trans.DELETE')</button>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        @endif
                        @if ($addresses->where('default', 0)->count() > 0)
                            <section class="default-address">
                                <h2>@lang('trans.Addresses')</h2>
                                @foreach ($addresses->where('default', 0) as $address)
                                    <div class="default-address-details">
                                        <div class="default-address-data">
                                            <h4>{{ $address->country->title() }}</h4>
                                            <p>{{ $address->road }}, {{ $address->region->title() }}</p>
                                        </div>
                                        <div class="actions">
                                            <a href="{{ route('client.address.edit', $address->id) }}"
                                                class="btn edit--btn d-flex align-items-center justify-content-center">@lang('trans.EDIT')</a>
                                            <form method="POST"
                                                action="{{ route('client.address.destroy', $address->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn delete--btn d-flex align-items-center justify-content-center">@lang('trans.DELETE')</button>
                                            </form>

                                        </div>
                                    </div>
                                @endforeach

                            </section>
                        @endif

                    </div>
                    <div class="tab-pane fade " id="v-pills-edit" role="tabpanel" aria-labelledby="v-pills-edit-tab"
                        tabindex="0">
                        <section class="edit-profile">
                            <h2>@lang('trans.Edit PROFILE')</h2>
                            <p>@lang('trans.Edit your profile details')</p>
                            <div class="edit-profile-item">
                                <div class="details">
                                    <h4>@lang('trans.EDIT PROFILE')</h4>
                                    <p>@lang('trans.Set up a new address to make checkout simpler.')</p>
                                </div>
                                <a type="button" href="{{ route('client.edit-profile') }}" class="btn">@lang('trans.EDIT PROFILE')</a>
                            </div>
                            <div class="edit-profile-item">
                                <div class="details">
                                    <h4>@lang('trans.EDIT PASSWORDS')</h4>
                                    <p>@lang('trans.Set up a new address to make checkout simpler.')</p>
                                </div>
                                <a type="button" href="{{ route('client.change.password') }}" class="btn">@lang('trans.EDIT PASSWORDS')</a>
                            </div>
                        </section>
                    </div>

                </div>
            </div>
        </div>

        </div>
    </section>
@endsection
@push('js')
    <script>
        $(".view--btn").on("click", function() {
                const summarySection = $(".summary--section");
                const viewBtnImg = $(".view--btn-img", this);

                summarySection.toggleClass("hide-content");

                let currentSrc = viewBtnImg.attr("src");
                let altSrc = viewBtnImg.data("alt-src");

                viewBtnImg.attr("src", altSrc);
                viewBtnImg.data("alt-src", currentSrc);
                let orderId = $(this).data("order_id");
                $.ajax({
                    url: '{{ route('client.orderView') }}',
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        orderId: orderId
                    },
                    success: function(data) {
                        var lang = "{{ lang() }}"
                        let order = data.order;
                        console.log(order);
                        if (order.address_id != null) {
                            $("#country").text(order.address.country['title_' + lang]);
                            $("#addressDetails").html(`${ order.address.building_no } ${ order.address.road } @lang('trans.Street'),
                        ${ order.address.region['title_'+lang] }`);
                        } else {

                            $(".shipping-section").hide()

                        }

                        $("#subTotal").html(
                            `{{ Country()->currancy_code_en }} ${(order.sub_total*{{ Country()->currancy_value }}).toLocaleString('en', {minimumFractionDigits: {{ Country()->decimals }}, maximumFractionDigits: {{ Country()->decimals }}})}`
                        );
                        $("#vat").html(
                            `{{ Country()->currancy_code_en }} ${(order.vat*{{ Country()->currancy_value }}).toLocaleString('en', {minimumFractionDigits: {{ Country()->decimals }}, maximumFractionDigits: {{ Country()->decimals }}})}`
                        );
                        if (order.delivery_id == 1) {
                            $("#shipping").html(
                                `{{ Country()->currancy_code_en }} ${(order.charge_cost*{{ Country()->currancy_value }}).toLocaleString('en', {minimumFractionDigits: {{ Country()->decimals }}, maximumFractionDigits: {{ Country()->decimals }}})}`
                            );
                        } else {
                            // console.log(1);
                            $(".shippingCountainer").hide()
                        }

                        $("#total").html(
                            `{{ Country()->currancy_code_en }} ${(order.net_total*{{ Country()->currancy_value }}).toLocaleString('en', {minimumFractionDigits: {{ Country()->decimals }}, maximumFractionDigits: {{ Country()->decimals }}})}`
                        );

                        if (order.coupon > 0) {
                            $('.couponInfo').css('display', "flex")
                            $("#coupon").html(
                                `{{ Country()->currancy_code_en }} ${(order.coupon*{{ Country()->currancy_value }}).toLocaleString('en', {minimumFractionDigits: {{ Country()->decimals }}, maximumFractionDigits: {{ Country()->decimals }}})}`
                            );
                            $("#sub_total_after_coupon").html(
                                `{{ Country()->currancy_code_en }} ${(order.sub_total_after_coupon*{{ Country()->currancy_value }}).toLocaleString('en', {minimumFractionDigits: {{ Country()->decimals }}, maximumFractionDigits: {{ Country()->decimals }}})}`
                            );

                        }
                        $('#paymentImage').attr('src', order.payment_method.image);
                        // $("#order_cancel").data("order_id_cancel", order.id);
                        $(".order-item").remove();
                        let orderItemsHtml = '';
                        order.order_products.forEach(function(item) {
                            orderItemsHtml += `
                        <div class="order-item">
                            <div class="item-img-box col-lg-2 col-6">
                                <img class="w-100" src="${item.color.header[0].header}" />
                            </div>
                            <div class="details">
                                <p class="name">${item.product['title_' + lang]}</p>
                                <p class="size">Size: ${item.size['title_' + lang]}</p>
                                <p class="color">Color: ${item.color['title_' + lang]}</p>
                                <p class="quantity">Quantity: ${item.quantity}</p>
                            </div>
                            <div class="price">{{ Country()->currancy_code_en }} ${(item.price*{{ Country()->currancy_value }}).toLocaleString('en', {minimumFractionDigits: {{ Country()->decimals }}, maximumFractionDigits: {{ Country()->decimals }}})}</div>
                        </div>`;
                        });
                        $(".order-items-container").append(orderItemsHtml);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
    </script>
@endpush
