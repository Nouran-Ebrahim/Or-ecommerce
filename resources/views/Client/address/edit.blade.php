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
                    </a>
                    @lang('trans.home')
                </li>
                <li class="breadcrumb-item fw-semibold" aria-current="page">
                    @lang('trans.address')
                </li>
            </ol>
        </nav>
    </div>
</div>


<div class="gray-bage">
    <div class="container ">
        <div class="row ">
            <h3 class="text-uppercase">@lang('trans.addAddress')</h3>
        </div>
    </div>
</div>
<div class="container my-5">
    <div class="row  justify-content-center">

        <div class="row  position-relative" style="height: 400px;">
            <div id="map"></div>
        </div>

        <form class="w-50" action="{{ route('client.address.store') }}" method="POST">
            @csrf
            <input type="hidden" name="lat" id="lat" value="{{ $lat }}">
            <input type="hidden" name="long" id="long" value="{{ $long }}">
            <div class="mb-3 my-5">
                <label for="additional_directions" class="form-label">@lang('trans.additional_directions')</label>
                <textarea class="form-control rounded-3" id="additional_directions" name="additional_directions" rows="5" style="resize: none;"></textarea>
            </div>
            <div class="mb-3 w-100 d-flex justify-content-center">
                <button type="submit" class="btn btn-dark px-4 btn m-auto border border-1 border-dark rounded-3 gap-2 my-2 w-50 py-2">
                    @lang('trans.Submit')
                </button>
            </div>
        </form>
    </div>
</div> --}}
    <section class="profile container section-top" style="min-height: 75vh;">
        <div class="row align-items-start">
            <div class="col-lg-4 col-12">
                <div class="nav flex-nav-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link profile" id="v-pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="false">
                        <button class="nav-link profile" id="v-pills-orders-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders"
                            aria-selected="false">
                            @lang('trans.ORDERS')
                        </button>
                        <a href="{{ route('client.address.index') }}" class="nav-link profile active"
                            id="v-pills-address-tab" data-bs-toggle="pill" data-bs-target="#v-pills-address" type="button"
                            role="tab" aria-controls="v-pills-address" aria-selected="true">
                            @lang('trans.ADDRESS')
                        </a>
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
                            <a href="{{ route('client.address.index') }}" class="btn view-btn">@lang('trans.VIEW ORDERS')</a>
                        </div>
                        <div class="view-item">
                            <div class="item-details">
                                <h4>@lang('trans.Edit PROFILE')</h4>
                                <p>@lang('trans.Edit your profile details')</p>
                            </div>
                            <a href="{{ route('client.profile') }}" class="btn view-btn">@lang('trans.VIEW ACCOUNT')</a>

                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">
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
                        @else
                            <p class="mb-2">
                                No orders Now
                            </p>
                        @endif
                    </div>
                    <div class="tab-pane show active" id="v-pills-address" role="tabpanel"
                        aria-labelledby="v-pills-address-tab" tabindex="0">
                        <section class="addresses-section">
                            <h2>@lang('trans.ADD ADDRESS')</h2>
                            <p>Add new addresses</p>

                        </section>

                        <section class="edit-profile-form">
                            <form method="POST" action="{{ route('client.address.update', $address->id) }}"
                                class="contact-us-form">
                                @csrf
                                @method('put')
                                <div>
                                    <select id="country" name="country_id" class="form-select  shipping-options">
                                        @foreach ($countries as $country)
                                            <option {{ $address->country_id == $country->id ? 'selected' : '' }}
                                                value="{{ $country->id }}">
                                                {{ $country->title() }}</option>
                                        @endforeach

                                    </select>
                                    @error('country_id')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <select name="region_id" required class="form-select shipping-options rigons">
                                        {{-- <option selected value="{{ null }}" disabled>City</option> --}}
                                        @foreach ($regions->where('country_id', $address->country_id) as $region)
                                            <option {{ $address->region_id == $region->id ? 'selected' : '' }}
                                                value="{{ $region->id }}">{{ $region->title() }}</option>
                                        @endforeach
                                    </select>
                                    @error('region_id')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="input-name">
                                    <input style="   width: 48%;" type="text" value="{{ $address->flat }}"
                                        name="flat" placeholder="@lang('trans.flat')" />
                                    @error('flat')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                    <input style="  width: 48%;" value="{{ $address->zone }}" type="text"
                                        name="zone" placeholder="@lang('trans.district')" />
                                    @error('zone')
                                        <p class="alert alert-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <input class="contacts-input" value="{{ $address->road }}" type="text"
                                    name="road" placeholder="@lang('trans.road')" />
                                @error('road')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <input class="contacts-input" value="{{ $address->building_no }}" name="building_no"
                                    type="text" placeholder="@lang('trans.building_no')" />
                                @error('building_no')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <div class="d-flex">
                                    <input type="checkbox" style="width: 2.2rem;"
                                        class="form-check-input save-input border" value="1"
                                        {{ $address->default == 1 ? 'checked' : '' }} name="default" id="save" />

                                    <label for="save" class="form-check-label save-label">@lang('trans.Set as default address')</label>

                                </div>
                                @error('default')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <div class="actions">
                                    <button class="btn save-changes d-flex align-items-center justify-content-center"
                                        type="submit">@lang('trans.save')</button>
                                    <a href="{{ route('client.profile') }}"
                                        class="btn cancel-changes">@lang('trans.cancel')</a>
                                </div>
                            </form>
                        </section>
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

                    </div>

                </div>
            </div>
        </div>

        </div>
    </section>
@endsection

{{-- @push('css')
<style>
    #map .gm-style-iw-d {
        color: #000;
    }

    #map input[type=text] {
        background-color: #fff;
        border: 0;
        border-radius: 2px;
        box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
        margin: 10px;
        padding: 0 0.5em;
        font: 400 18px Roboto, Arial, sans-serif;
        overflow: hidden;
        line-height: 40px;
        margin-right: 0;
        min-width: 25%;
    }

    #map input[type=button] {
        background-color: #fff;
        border: 0;
        border-radius: 2px;
        box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
        margin: 10px;
        padding: 0 0.5em;
        font: 400 18px Roboto, Arial, sans-serif;
        overflow: hidden;
        height: 40px;
        cursor: pointer;
        margin-left: 5px;
    }

    #map input[type=button]:hover {
        background: rgb(235, 235, 235);
    }

    #map input[type=button].button-primary {
        background-color: #1a73e8;
    }

    #map input[type=button].button-primary:hover {
        background-color: #1765cc;
    }

    #map input[type=button].button-secondary {
        background-color: white;
        color: #1a73e8;
    }

    #map input[type=button].button-secondary:hover {
        background-color: #d2e3fc;
    }

</style>
@endpush --}}


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
    <script>
        $('#country').on('change', function() {
            var country_id = $(this).val();

            $.ajax({
                url: '{{ route('client.getRigons') }}',
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    country_id: country_id
                },
                success: function(data) {
                    // console.log(data);
                    $('.rigons').empty();
                    // $('.rigons').append(
                    //     '<option value="" disable="true"  selected="true">@lang('trans.city')</option>'
                    // );
                    $.each(data, function(index, villagesObj) {
                        $('.rigons').append(
                            `<option value="${ villagesObj.id}" >${villagesObj["title_{{ lang() }}"] }</option>`
                        );
                    })
                    getInailDeliveryCost()
                },
                error: function(error) {
                    console.log(error);
                }
            });
        })
    </script>
    {{-- <script>
        let map;
        let marker;
        let geocoder;
        let response;


        function initMap() {
            var haightAshbury = {
                lat: {{ $lat }},
                lng: {{ $long }}
            };
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 8,
                center: haightAshbury,
                mapTypeControl: false,
                draggableCursor: 'default',

            });
            geocoder = new google.maps.Geocoder();

            const inputText = document.createElement("input");

            inputText.type = "text";
            inputText.placeholder = "{{ __('trans.pick_your_location') }}";

            const submitButton = document.createElement("input");

            submitButton.type = "button";
            submitButton.value = "{{ __('trans.search') }}";
            submitButton.classList.add("button", "button-primary");


            response = document.createElement("pre");
            response.id = "response";
            response.innerText = "";

            map.controls[google.maps.ControlPosition.TOP_LEFT].push(inputText);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(submitButton);
            marker = new google.maps.Marker({
                map,
                animation: google.maps.Animation.DROP,
                position: haightAshbury
            });
            addYourLocationButton(map, marker);
            map.addListener('click', function(event) {
                geocode({
                    location: event.latLng
                });
                var latitude = event.latLng.lat();
                var longitude = event.latLng.lng();
            });
            submitButton.addEventListener("click", () =>
                geocode({
                    address: inputText.value
                })
            );
            marker.setMap(null);
        }

        function addYourLocationButton(map, marker) {
            var controlDiv = document.createElement('div');
            var firstChild = document.createElement('button');
            firstChild.style.backgroundColor = '#fff';
            firstChild.style.border = 'none';
            firstChild.style.outline = 'none';
            firstChild.style.width = '40px';
            firstChild.style.height = '40px';
            firstChild.style.borderRadius = '2px';
            firstChild.style.boxShadow = '0 1px 4px rgba(0,0,0,0.3)';
            firstChild.style.cursor = 'pointer';
            firstChild.style.marginRight = '10px';
            firstChild.style.padding = '0px';
            firstChild.title = 'Your Location';
            controlDiv.appendChild(firstChild);

            var secondChild = document.createElement('div');
            secondChild.style.margin = '10px';
            secondChild.style.width = '18px';
            secondChild.style.height = '18px';
            secondChild.style.backgroundImage = 'url(https://maps.gstatic.com/tactile/mylocation/mylocation-sprite-1x.png)';
            secondChild.style.backgroundSize = '180px 18px';
            secondChild.style.backgroundPosition = '0px 0px';
            secondChild.style.backgroundRepeat = 'no-repeat';
            secondChild.id = 'you_location_img';
            firstChild.appendChild(secondChild);

            google.maps.event.addListener(map, 'dragend', function() {
                $('#you_location_img').css('background-position', '0px 0px');
            });

            firstChild.addEventListener('click', function() {
                var imgX = '0';
                var animationInterval = setInterval(function() {
                    if (imgX == '-18') imgX = '0';
                    else imgX = '-18';
                    $('#you_location_img').css('background-position', imgX + 'px 0px');
                }, 500);
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        var latlng = new google.maps.LatLng(position.coords.latitude, position.coords
                            .longitude);
                        marker.setPosition(latlng);
                        map.setCenter(latlng);
                        clearInterval(animationInterval);
                        $('#you_location_img').css('background-position', '-144px 0px');
                        if ("geolocation" in navigator) {
                            navigator.geolocation.getCurrentPosition(function(position) {
                                var currentLatitude = position.coords.latitude;
                                var currentLongitude = position.coords.longitude;
                                var currentLocation = {
                                    lat: currentLatitude,
                                    lng: currentLongitude
                                };
                                geocode({
                                    location: latlng
                                });
                            });
                        }
                    });
                } else {
                    clearInterval(animationInterval);
                    $('#you_location_img').css('background-position', '0px 0px');
                }

            });

            controlDiv.index = 1;
            map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(controlDiv);
        }

        window.initMap = initMap;

        function geocode(request) {
            marker.setMap(null);
            geocoder.geocode(request).then((result) => {
                const {
                    results
                } = result;
                map.setCenter(results[0].geometry.location);
                marker.setPosition(results[0].geometry.location);
                marker.setMap(map);
                response.innerText = JSON.stringify(result, null, 2);
                document.getElementById("additional_directions").value = results[0]['formatted_address'];
                document.getElementById("lat").value = results[0].geometry.location.lat();
                document.getElementById("long").value = results[0].geometry.location.lng();
                return results;
            });
        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_KEY') }}&callback=initMap&language={{ lang() }}">
    </script> --}}
@endpush
