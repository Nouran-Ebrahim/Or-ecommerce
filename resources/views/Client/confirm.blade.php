@extends('Client.layouts.layout')
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/intl-tel-input@17.0.3/build/css/intlTelInput.css">
    <style>
        .iti {

            width: 100%;
            margin-top: 3rem;
        }
    </style>
@endpush
@section('content')
    <section class="checkout-section container section-top">
        <form id="myForm" action="{{ route('client.submit') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    @if (auth('client')->check())
                        <h4 class="shipping">SHIPPING METHOD</h4>
                        @foreach (Deliveries() as $key => $Delivery)
                            <div class="payment-method">
                                <div class="payment-input">
                                    <input type="radio" class="form-check-input save-input delivery"
                                        {{ $Delivery->id == 1 ? 'checked' : '' }} value="{{ $Delivery->id }}"
                                        id="delivery{{ $Delivery->id }}" name="delivery_id" />
                                    <label for="delivery{{ $Delivery->id }}"
                                        class="form-check-label save-label">{{ $Delivery->title() }}</label>
                                </div>
                            </div>
                        @endforeach
                        <h4 class="shipping address">Your Address</h4>
                        @if ($addresses->count() > 0)
                            @foreach ($addresses as $address)
                                <div class="payment-method address">
                                    <div class="payment-input">
                                        <input type="radio" {{ $address->default == 1 ? 'checked' : '' }}
                                            class="form-check-input save-input radioAddress" value="{{ $address->id }}"
                                            id="address{{ $address->id }}" name="address_id" />
                                        <label for="address{{ $address->id }}"
                                            class="form-check-label save-label">{{ $address->country->title() }} ,
                                            {{ $address->road }} , {{ $address->region->title() }}</label>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="address">
                                <select id="country" name="country_id" class="form-select  shipping-options">
                                    @foreach ($countries as $country)
                                        <option {{ Country()->id == $country->id ? 'selected' : '' }}
                                            value="{{ $country->id }}">
                                            {{ $country->title() }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="address">

                                <select name="region_id" required class="form-select shipping-options rigons">
                                    {{-- <option selected value="{{ null }}" disabled>City</option> --}}
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->title() }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-name address">
                                <input type="text" name="flat" placeholder="@lang('trans.flat')" />
                                @error('flat')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <input type="text" name="zone" placeholder="@lang('trans.district')" />
                                @error('zone')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <input name="road" class="contacts-input address" type="text"
                                placeholder="@lang('trans.road')" />
                            @error('road')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                            <input class="contacts-input address" name="building_no" type="text"
                                placeholder="@lang('trans.building_no')" />
                            @error('building_no')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                            <input type="checkbox" class="form-check-input save-input address" value="1" name="default"
                                id="save" />
                            <label for="save" class="form-check-label save-label address">Save this
                                information for next time</label>
                        @endif
                    @else
                        <div class="contact--container">
                            <p>CONTACTS</p>
                            <div>Have an account?<a role="button" href="{{ route('client.login') }}" class="btn">
                                    <h3>Log in</h3>
                                </a></div>
                        </div>
                        <input class="contacts-input" type="text" value="{{ old('first_name') }}" name="first_name"
                            placeholder="First Name" />
                        @error('first_name')
                            <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
                        @enderror
                        <input class="contacts-input" type="text" value="{{ old('last_name') }}" name="last_name"
                            placeholder="Last Name" />
                        @error('last_name')
                            <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
                        @enderror
                        <input class="contacts-input" value="{{ old('email') }}" type="email" name="email"
                            placeholder="Email" />
                        @error('email')
                            <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
                        @enderror
                        <input type="hidden" name="country_code" id="country_code"
                            value="{{ old('country_code', 'SA') }}">
                        <input type="hidden" name="phone_code" id="phone_code" value="{{ old('phone_code', 966) }}">
                        <input class="contacts-input" type="tel" value="{{ old('phone') }}" name="phone"
                            id="phone" placeholder="Phone" />
                        @error('phone')
                            <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
                        @enderror
                        <h4 class="shipping">SHIPPING METHOD</h4>
                        @foreach (Deliveries() as $key => $Delivery)
                            <div class="payment-method">
                                <div class="payment-input">
                                    <input type="radio" class="form-check-input save-input delivery"
                                        {{ $Delivery->id == 1 ? 'checked' : '' }} value="{{ $Delivery->id }}"
                                        id="delivery{{ $Delivery->id }}" name="delivery_id" />
                                    <label for="delivery{{ $Delivery->id }}"
                                        class="form-check-label save-label">{{ $Delivery->title() }}</label>
                                </div>
                            </div>
                        @endforeach
                        <h4 class="shipping address">Your Address</h4>
                        @if ($addresses->count() > 0)
                            @foreach ($addresses as $address)
                                <div class="payment-method address">
                                    <div class="payment-input">
                                        <input type="radio" {{ $address->default == 1 ? 'checked' : '' }}
                                            class="form-check-input save-input" value="{{ $address->id }}"
                                            id="address{{ $address->id }}" name="address_id" />
                                        <label for="address{{ $address->id }}"
                                            class="form-check-label save-label">{{ $address->country->title() }} ,
                                            {{ $address->road }} , {{ $address->region->title() }}</label>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="address">
                                <select id="country" name="country_id" class="form-select  shipping-options">
                                    @foreach ($countries as $country)
                                        <option {{ Country()->id == $country->id ? 'selected' : '' }}
                                            value="{{ $country->id }}">
                                            {{ $country->title() }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="address">

                                <select name="region_id" required class="form-select shipping-options rigons">
                                    {{-- <option selected value="{{ null }}" disabled>City</option> --}}
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}">{{ $region->title() }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="input-name address">
                                <input type="text" name="flat" placeholder="@lang('trans.flat')" />
                                @error('flat')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                                <input type="text" name="zone" placeholder="@lang('trans.district')" />
                                @error('zone')
                                    <p class="alert alert-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <input name="road" class="contacts-input address" type="text"
                                placeholder="@lang('trans.road')" />
                            @error('road')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror
                            <input class="contacts-input address" name="building_no" type="text"
                                placeholder="@lang('trans.building_no')" />
                            @error('building_no')
                                <p class="alert alert-danger">{{ $message }}</p>
                            @enderror

                            <input type="checkbox" class="form-check-input save-input address" value="1"
                                name="default" id="save" />
                            <label for="save" class="form-check-label save-label address">Save this
                                information for next time</label>
                        @endif
                    @endif



                    <h4 class="shipping">PAYMENT</h4>
                    @foreach (Payments() as $Payment)
                        <div class="payment-method">
                            <div class="payment-input">
                                <input type="radio" class="form-check-input save-input" id="save"
                                    name="payment_id" value="{{ $Payment->id }}" />
                                <label for="save" class="form-check-label save-label">{{ $Payment->title() }}</label>

                            </div>
                            <div class="payment-logo">
                                <img src="{{ asset($Payment->image) }}" alt />
                            </div>
                        </div>
                    @endforeach
                    @error('payment_id')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror
                    <h4 class="shipping">ORDER NOTES</h4>
                    <input type="text" name="notes" class="order-notes" placeholder="Notes about your order" />
                </div>
                <div class="col-lg-6">
                    <div class="order-container">
                        <h4 class="shipping order">@lang('trans.Order summary')</h4>
                        @foreach ($Carts as $cart)
                            <div class="order-item">
                                <div class="order-img-box col-2">
                                    
                                    <img class="w-100 px-2" src="{{ asset($cart->Color?$cart->Color->Header[0]->header:$cart->Product->RandomImage()) }}" />
                                    <div class="amount">{{ $cart->quantity }}</div>
                                </div>
                                <div class="order-details">
                                    <p class="name">{{ $cart->Product->title() }}</p>
                                    <p class="details">{{ $cart->Size->title() }}  {{ $cart->Color?'/'.$cart->Color->title():'' }}</p>
                                </div>
                                <p class="price">{{ Country()->currancy_code }} {{ $cart->Product->CalcPrice() }}</p>
                            </div>
                        @endforeach



                        <div class="order-summary">
                            <p class="name">@lang('trans.SUBTOTAL')</p>

                            <div class="">
                                <input name="sub_total" id="subTotal" class="amount border-0 w-auto"
                                    value="{{ $subTotal }}" readonly placeholder="{{ $subTotal }}"
                                    style="direction: rtl;" />
                                <span class="amount text-uppercase">{{ Country()->currancy_code }}</span>

                            </div>
                        </div>
                        <div class="order-summary couponInfo" style="display:none">
                            <p class="name">@lang('trans.Coupon')</p>

                            <div class="">
                                <input name="coupon" id="coupon" class="amount border-0 w-auto"
                                    value="{{ number_format(0, Country()->decimals, '.', '') }}" readonly placeholder=""
                                    style="direction: rtl;" />
                                <span class="amount text-uppercase">{{ Country()->currancy_code }}</span>

                            </div>
                        </div>
                        <div class="order-summary">
                            <p class="name">VAT({{ setting('VAT') }}%)</p>

                            <div class="">
                                <input name="vat" id="vat" class="amount border-0 w-auto"
                                    value="{{ $vat }}" readonly placeholder="{{ $vat }}"
                                    style="direction: rtl;" />
                                <span class="amount text-uppercase">{{ Country()->currancy_code }}</span>
                            </div>
                        </div>
                        <div class="order-summary couponInfo" style="display:none">
                            <p class="name">@lang('trans.Sub Total after coupon')</p>

                            <div class="">
                                <input name="sub_total_after_coupon" id="sub_total_after_coupon"
                                    class="amount border-0 w-auto" value="0" readonly placeholder=""
                                    style="direction: rtl;" />
                                <span class="amount text-uppercase">{{ Country()->currancy_code }}</span>

                            </div>
                        </div>
                        <div class="order-summary" id="shipping">
                            <p class="name">@lang('trans.SHIPPING')</p>

                            <div class="">
                                <input id="charge_cost" name="charge_cost" class="amount border-0 w-auto" readonly
                                    value="0" placeholder="0" style="direction: rtl;" />
                                <span class="amount text-uppercase">{{ Country()->currancy_code }}</span>
                            </div>
                        </div>
                        <div class="order-summary">
                            <p class="name">@lang('trans.TOTAL')</p>
                            <div class="">
                                <input id="total" class="amount total border-0 w-auto" name="net_total"
                                    value="{{ $total }}" readonly placeholder="{{ $total }}"
                                    style="direction: rtl;" />
                                <span class="amount text-uppercase">{{ Country()->currancy_code }}</span>
                            </div>
                        </div>
                        <div class="Coupon-form">
                            <input value="" name="code" id="code" type="text"
                                placeholder="Coupon code" />
                            <button id="applay" class="btn">APPLY COUPON</button>
                        </div>
                        <button type="submit" class="btn place-order">PLACE ORDER</button>

                    </div>

                </div>
            </div>
        </form>
    </section>
@endsection

@push('css')
    <style>
        input.amount::placeholder {
            font-size: 2.1rem;
            color: #000;

        }

        input.amount:focus-visible {
            border: 0px !important;
            outline: 0px;
        }

        input.amount.total::placeholder {
            font-weight: 600;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#myForm').submit(function(e) {
                // Prevent the default form submission
                e.preventDefault();
                if ($('#applay').prop("disabled")) {
                    // Submit the form
                    this.submit();
                } else {
                    // Set the value of the input field to null
                    $('#code').val('');
                    // Submit the form
                    this.submit();
                }



            });
        });
    </script>
    <script>
        $(document).ready(function() {
            function getInailDeliveryCost() {
                var inialRegion = $('.rigons').val();
                var address_id = $('input[name="address_id"]:checked').val();
                $.ajax({
                    url: '{{ route('client.getInailDeliveryCost') }}',
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        inialRegion: inialRegion,
                        address_id: address_id
                    },
                    success: function(data) {
                        $('#shipping input').val(data.inailDeliveryCostForSelectedCurrancy);
                        $('#total').val(data.totalAfterShipping);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
            // Initially hide or show shipping divs based on the default selected delivery method
            if ($('.delivery:checked').val() == 2) {
                $('.address').hide();
                $('#shipping').hide();
                $('#shipping input').val(0);

            } else {
                $('.address').show();
                $('#shipping').show();
                getInailDeliveryCost()
            }

            // Add change event listener to delivery radio inputs
            $('.delivery').change(function() {
                // Check if the selected delivery method is 2 (or any other value you need)
                if ($(this).val() == 2) {
                    // Hide shipping divs
                    $('.address').hide();
                    $('#shipping').hide();
                    $('#shipping input').val(0);
                    $.ajax({
                        url: '{{ route('client.getTotalBeforShipping') }}',
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            $('#total').val(data);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                } else {
                    // Show shipping divs
                    $('.address').show();
                    $('#shipping').show();
                    getInailDeliveryCost()
                }
            });
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
            $('.rigons').on('change', function() {
                var region_id = $(this).val();

                $.ajax({
                    url: '{{ route('client.getDeliveryCost') }}',
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        region_id: region_id
                    },
                    success: function(data) {
                        $('#shipping input').val(data.DeliveryCost);
                        $('#total').val(data.totalAfterShipping);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            })
            $('.radioAddress').on('change', function() {
                var address_id = $('input[name="address_id"]:checked').val();

                $.ajax({
                    url: '{{ route('client.getDeliveryCost') }}',
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        address_id: address_id
                    },
                    success: function(data) {
                        $('#shipping input').val(data.DeliveryCost);
                        $('#total').val(data.totalAfterShipping);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            })
            $('#applay').prop("disabled", false);
            $('#code').prop("readonly", false)
            $('#applay').on('click', function(event) {
                event.preventDefault()
                // $('.applay').hide()
                var code = $('#code').val()
                var subTotal = $('#subTotal').val();
                var vat = $('#vat').val();
                var charge_cost = $('#charge_cost').val();

                if (code == "") {
                    return false
                } else {
                    $.ajax({
                        url: "{{ route('client.applayCode') }}",
                        type: "POST",
                        data: {
                            code: code,
                            subTotal: subTotal,
                            charge_cost: charge_cost,
                            vat: vat,
                            "_token": "{{ csrf_token() }}",
                        },

                        success: function(data) {
                            if (data.status) {
                                // $('#shipping input').val(data.charge_cost);
                                $('.couponInfo').css('display', "flex")
                                $('#total').val(data.total);
                                $('#sub_total_after_coupon').val(data.subTotalAfterCoupon);
                                $('#coupon').val(data.couponValue);
                                // $('#vat').val(data.vat);
                                Swal.fire({
                                    icon: 'success',
                                    title: data.message,
                                    text: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $('#applay').prop("disabled", true)
                                $('#code').prop("readonly", true)
                            } else {
                                // $('#shipping input').val(data.charge_cost);
                                $('#total').val(data.total);
                                $('#sub_total_after_coupon').val(0);
                                $('#coupon').val(data.couponValue);
                                // $('#vat').val(data.vat);
                                Swal.fire({
                                    icon: 'error',
                                    title: data.message,
                                    text: data.message,
                                    showConfirmButton: false,
                                    timer: 1500
                                });

                                $('#applay').prop("disabled", false)
                                $('#code').prop("readonly", false)
                            }


                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            // console.log(5)
                            console.log(error);
                        }
                    })
                }

            })
        });
    </script>
    </script>
    <script src="https://unpkg.com/intl-tel-input@17.0.3/build/js/intlTelInput.js"></script>
    <script>
        var iti = window.intlTelInput(document.querySelector("#phone"), {
            separateDialCode: true,
            formatOnDisplay: false,
            utilsScript: "https://unpkg.com/intl-tel-input@17.0.3/build/js/utils.js",
            onlyCountries: @json(Countries()->pluck('country_code')),
            preferredCountries: ['sa']
        });
        window.iti = iti;
        iti.setCountry("{{ old('country_code', isset($country_code) ? $country_code : 'SA') }}");

        document.querySelector("#phone").addEventListener("countrychange", function() {
            document.getElementById("phone").value = '';
            document.getElementById("country_code").value = iti.getSelectedCountryData().iso2.toUpperCase();
            document.getElementById("phone_code").value = iti.getSelectedCountryData().dialCode;
        })
    </script>
    {{-- <script>
        $(document).on("change", "#address_id", function() {
            console.log($(this).val());
            calc();
        });
        $(document).on("change", "#region_id", function() {
            $("input[name='address_id']").prop('checked', false);
            calc();
        });

        function calc() {
            vat = 0;
            delivery_charge = 0;
            if ($("#region_id option:selected").length > 0) {
                delivery_charge = parseFloat($("#region_id option:selected").attr('data-price'));
            }

            decimals = {{ Country()->decimals }};
            sub_total = 0;
            discount = 0;
            vat_percentage = {{ setting('VAT') }};
            $('.number').each(function(i, obj) {
                total = 0;
                id = parseFloat($(obj).find('input').attr('data-id'));
                quantity = parseFloat($(obj).find('input').val());
                price = parseFloat($(obj).find('input').attr('data-price'));
                discount += parseFloat($(obj).find('input').attr('data-discount')) * parseFloat(quantity);
                total = (parseFloat(price) * parseFloat(quantity));
                $('#total-' + id).html(total.toFixed(decimals));
                sub_total += total;

                exclusive_sub_total = parseFloat($(obj).find('input').attr('data-exclusive-vat')) * parseFloat(
                    quantity);
            });
            if (discount <= 0) {
                $('#discount').parent().parent().addClass('d-none');
            } else {
                $('#discount').parent().parent().removeClass('d-none');
            }
            if (delivery_charge <= 0) {
                $('#delivery_charge').parent().parent().addClass('d-none');
            } else {
                $('#delivery_charge').parent().parent().removeClass('d-none');
            }
            vat = exclusive_sub_total / 100 * vat_percentage;
            netTotal = sub_total + vat + delivery_charge;
            sub_total += discount;
            $('#sub_total').html(sub_total.toFixed(decimals));
            $('#discount').html(discount.toFixed(decimals));
            $('#vat').html(vat.toFixed(decimals));
            @if (old('delivery_id', request('delivery_id')) == 1)
                $('#delivery_charge').html(delivery_charge.toFixed(decimals));
            @endif
            $('#netTotal').html(netTotal.toFixed(decimals));
        }
        calc();
    </script> --}}
@endpush



@push('css')
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
@endpush


@push('js')
    <script>
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
            firstChild.setAttribute('type', 'button');
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
    </script>
@endpush
