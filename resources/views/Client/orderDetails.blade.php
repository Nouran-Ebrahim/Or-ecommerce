@extends('Client.layouts.layout')
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/intl-tel-input@17.0.3/build/css/intlTelInput.css">
@endpush
@section('content')
    <section class="profile container section-top" style="min-height: 75vh;">
        <div class="row align-items-start">
            <div class="col-lg-4 col-12">
                <div class="nav flex-nav-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link profile" id="v-pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="false">
                        <button class="nav-link profile active" id="v-pills-orders-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders"
                            aria-selected="false">
                            @lang('trans.ORDERS')
                        </button>
                        <button class="nav-link profile " id="v-pills-address-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-address" type="button" role="tab" aria-controls="v-pills-address"
                            aria-selected="false">
                            @lang('trans.ADDRESS')
                        </button>
                        <button class="nav-link profile" id="v-pills-edit-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-edit" type="button" role="tab" aria-controls="v-pills-edit"
                            aria-selected="false">
                            @lang('trans.Edit PROFILE')
                        </button>
                        <a href="{{ route('client.logout') }}" class="nav-link profile" id="v-pills-logout-tab"
                            role="tab" aria-controls="v-pills-logout" aria-selected="false">
                            @lang('trans.LOGOUT')
                        </a>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                <div class="tab-content profile-content your-orders" id="v-pills-tabContent">
                    <div class="tab-pane fade " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                        tabindex="0">
                        <h1>@lang('trans.WELCOME TO YOUR ACCOUNT'), SOHILA</h1>
                        <p>@lang('trans.From your account  you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.')</p>
                        <div class="view-item">
                            <div class="item-details">
                                <h4>@lang('trans.ORDER HISTORY')</h4>
                                <p>
                                    @lang('trans.View previous orders or the status of your current orders.')
                                </p>
                            </div>
                            <a class="btn view-btn" href="{{ route('client.orderDetails') }}">VIEW ORDERS</a>
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
                            <a class="btn view-btn" href="profile.html">@lang('trans.VIEW ACCOUNT')</a>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="v-pills-orders" role="tabpanel"
                        aria-labelledby="v-pills-orders-tab">
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
                                No orders Now
                            </p>
                        @endif

                    </div>
                    <div class="tab-pane" id="v-pills-address" role="tabpanel" aria-labelledby="v-pills-address-tab"
                        tabindex="0">
                        <section class="addresses-section">
                            <h2>@lang('trans.YOUR ADDRESSES')</h2>
                            <p>
                                @lang('trans.Add new addresses, change your contact address, and see and manage addresses.')
                            </p>
                            <div class="adding-address">
                                <div class="add-address">
                                    <h4>@lang('trans.ADD ADDRESS')</h4>
                                    <p>@lang('trans.Set up a new address to make checkout simpler.')</p>
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
                    <div class="tab-pane fade" id="v-pills-edit" role="tabpanel" aria-labelledby="v-pills-edit-tab"
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
                        {{-- <section class="edit-profile-form">
                            <form class="contact-us-form">
                                <input type="text" placeholder="First name" />
                                <input type="text" placeholder="Last name" />

                                <input type="tel" placeholder="Phone number" />
                                <input type="email" placeholder="Email address" />
                                <div class="actions">
                                    <button class="btn save-changes">@lang('trans.save')</button>
                                    <button class="btn cancel-changes">@lang('trans.cancel')</button>
                                </div>
                            </form>
                        </section> --}}
                        {{-- <section class="edit-password-section">
                            <h2>@lang('trans.EDIT PASSWORDS')</h2>
                            <form class="contact-us-form">
                                <input type="password" placeholder="@lang('trans.Current password')" />
                                <input type="password" placeholder="@lang('trans.New password')" />
                                <input type="password" placeholder="@lang('trans.Confirm new password')" />

                                <div class="actions">
                                    <button class="btn save-changes">@lang('trans.save')</button>
                                    <button class="btn cancel-changes">@lang('trans.cancel')</button>
                                </div>
                            </form>
                        </section> --}}
                    </div>

                </div>
            </div>
        </div>

        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
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
        });
    </script>
    {{-- <script src="https://unpkg.com/intl-tel-input@17.0.3/build/js/intlTelInput.js"></script>

    <script>
        var iti = window.intlTelInput(document.querySelector("#phone"), {
            separateDialCode: true,
            formatOnDisplay: false,
            utilsScript: "https://unpkg.com/intl-tel-input@17.0.3/build/js/utils.js",
            onlyCountries: @json(Countries()->pluck('country_code')),
            preferredCountries: ['sa']
        });
        window.iti = iti;

        iti.setCountry("{{ old('country_code', isset($Client->country_code) ? $Client->country_code : 'SA') }}");
        document.querySelector("#phone").addEventListener("countrychange", function() {
            document.getElementById("phone").value = '';
            document.getElementById("country_code").value = iti.getSelectedCountryData().iso2.toUpperCase();
            document.getElementById("phone_code").value = iti.getSelectedCountryData().dialCode;
        })
    </script> --}}
@endpush
