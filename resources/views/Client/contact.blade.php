@extends('Client.layouts.layout')
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/intl-tel-input@17.0.3/build/css/intlTelInput.css">

    <style>
        .iti {

            width: 100%;
            margin-top: 3rem;
        }
    </style>
    @if (lang() == 'ar')
        <style>
            .iti--allow-dropdown .iti__flag-container,
            .iti--separate-dial-code .iti__flag-container {
                /* right: 25px !important; */
                left: auto !important;
            }

            .iti__country-list {
                margin: 0px 0px 0 0px !important;
            }

            .iti__country-list {
                position: absolute !important;
                z-index: 2 !important;
                list-style: none !important;
                text-align: right !important;
                padding: 0 !important;
                margin: 0 0 0 -1px !important;
                box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2) !important;
                background-color: white !important;
                border: 1px solid #CCC !important;
                white-space: nowrap !important;
                max-height: 200px !important;
                overflow-y: scroll !important;
                -webkit-overflow-scrolling: touch !important;
            }

            #phone {
                padding-left: 90px !important;
                padding-right: 90px !important;
            }
        </style>
    @else
        <style>
            .iti--allow-dropdown .iti__flag-container,
            .iti--separate-dial-code .iti__flag-container {
                /* left: 25px !important; */
                right: auto !important;
            }

            .iti__country-list {
                position: absolute !important;
                z-index: 2 !important;
                list-style: none !important;
                text-align: left !important;
                padding: 0 !important;
                margin: 0 0 0 -1px !important;
                box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.2) !important;
                background-color: white !important;
                border: 1px solid #CCC !important;
                white-space: nowrap !important;
                max-height: 200px !important;
                overflow-y: scroll !important;
                -webkit-overflow-scrolling: touch !important;
            }

            #phone{
                padding-left: 90px !important;
                padding-right: 90px !important;
            }
        </style>
    @endif
    <style>
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
    {{-- <div class="bread position-relative">
        <div class="in_bread">
            <div class="container w-100 h-100 mt-5">
                <div class="d-flex justify-content-center align-items-center w-100 h-100">
                   <h1>{{ trans('trans.contact_us') }}</h1>
                </div>
            </div>
        </div>
    </div>
    <style>
        .form-control-up {
            padding: 6px;
            border: none;
            width: 100%;
            outline: none;
            font-size: 16px;
            border-radius: 5px
        }

        .input-label {
            display: block;
            position: relative;
            margin-top: 2%;
            margin-left: 2%;
            border-bottom: 1px solid rgb(42, 42, 42);
            margin: 35px;
        }

        .placeholder-text {
            position: absolute;
            @if (lang('en'))
            left: 12px;
            @else
            right: 12px;
            @endif
            top: 10px;
            padding: 0px 4px;
            color: rgb(42, 42, 42);
            transform-origin: top left;
            transition: all 120ms ease-in;
        }

        .form-control-up:focus+.placeholder-text,
        .form-control-up:not(:placeholder-shown)+.placeholder-text {
            top: -20px;
            transform: scale(1);
            font-weight: bold;
            background-color: #fff;
        }
    </style>


    <div class="container" style="min-height: 200px;">
        <div class="row py-5">
            <div class="col-md-8 mx-auto">
                <div class="m-2 wrapper">
                    <p style="margin: 35px;">@lang('trans.ContactMessage')</p>

                    <form method="POST" action="{{ route('client.contact') }}">
                        @csrf

                        <div class="input-label">
                            <input required type="text" class="form-control-up" name="name" autocomplete="off" placeholder=" " >
                            <span class="placeholder-text" for="">@lang('trans.name')</span>
                        </div>
                        <div class="input-label">
                            <input required type="text" class="form-control-up" name="email" autocomplete="off" placeholder=" " >
                            <span class="placeholder-text" for="">@lang('trans.email')</span>
                        </div>
                        <div class="input-label">
                            <input required type="text" class="form-control-up" name="phone" autocomplete="off" placeholder=" " >
                            <span class="placeholder-text" for="">@lang('trans.phone')</span>
                        </div>
                        <div class="input-label">
                            <input required type="text" class="form-control-up" name="subject" autocomplete="off" placeholder=" " >
                            <span class="placeholder-text" for="">@lang('trans.subject')</span>
                        </div>
                        <div class="input-label">
                            <input required type="text" class="form-control-up" name="message" autocomplete="off" placeholder=" " >
                            <span class="placeholder-text" for="">@lang('trans.message')</span>
                        </div>
                        <div class="mb-3 w-100 d-flex justify-content-center">
                            <button type="submit"  class="px-5 btn btn-dark px-4 btn m-auto border border-1 border-dark rounded-3 gap-2 my-2 py-2 ">@lang('trans.Submit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <h1 class="contact-us-heading"
        style="background: url('{{ asset(setting('contactus_image')) }}');  background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;">
        @lang('trans.CONTACT US')</h1>
    <section class="contact-us--section section-top container">
        <h2>@lang('trans.WANT TO GET IN TOUCH')</h2>
        <p>@lang('trans.Our Client Advisors are there to help.')</p>
        <p>
            @lang('trans. Complete the form below, and we will respond to you as soon as possible.')
        </p>
        <div class="row">
            <div class="col-lg-6">
                <form method="POST" action="{{ route('client.contact') }}" class="contact-us-form py-5">
                    @csrf
                    {{-- <select class="form-select shipping-options">
                        <option>Category</option>
                        <option value="Classic Abayas">Classic Abayas</option>
                        <option value="Modern Abayas">Modern Abayas</option>
                        <option value="Casual Abayas">Casual Abayas</option>
                        <option value="Occasion Wear">Occasion Wear</option>
                    </select> --}}
                    <input type="text" value="{{ old('first_name') }}" name="first_name" class="name"
                        placeholder="@lang('trans.first_name')" />
                    @error('first_name')
                        <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
                    @enderror
                    <input type="text" value="{{ old('last_name') }}" name="last_name" class="name last-name"
                        placeholder="@lang('trans.last_name')" />
                    @error('last_name')
                        <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
                    @enderror
                    <input type="hidden" name="country_code" id="country_code" value="{{ old('ountry_code', 'SA') }}">
                    <input type="hidden" name="phone_code" id="phone_code" value="{{ old('phone_code', 966) }}">
                    <input id="phone" value="{{ old('phone') }}" name="phone" type="text" placeholder="@lang('trans.Phone Number')" />
                    @error('phone')
                        <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
                    @enderror
                    {{-- <input type="number" placeholder="Order number (if any)" /> --}}
                    <input type="email" value="{{ old('email') }}" name="email" placeholder="@lang('trans.email')" />
                    @error('email')
                        <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
                    @enderror
                    <input type="text" value="{{ old('subject') }}" name="subject" placeholder="@lang('trans.subject')" />
                    @error('subject')
                        <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
                    @enderror
                    <input type="text" value="{{ old('message') }}" name="message" placeholder="@lang('trans.message')" />
                    @error('message')
                        <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
                    @enderror
                    <div class="w-100 d-flex ">
                        <button type="submit" class="btn">@lang('trans.send')</button>

                    </div>
                </form>
            </div>
            <div class="col-lg-6 contact-us-container section-top">
                <div class="contact-data">
                    @foreach ($branches as $branch)
                        <div class="contact-item">
                            <div class="icon-img-box">
                                <img src="{{ asset('frontEnd/assets/contact-us/location.png') }}" />
                            </div>
                            <p>{{ $branch['address_' . lang()] }}</p>
                        </div>
                    @endforeach

                    <div class="contact-item">
                        <div class="icon-img-box">
                            <img src="{{ asset('frontEnd/assets/contact-us/phone.png') }}" />
                        </div>
                        <p>+{{ setting('phone') }}</p>
                    </div>
                    <div class="contact-item">
                        <div class="icon-img-box">
                            <img src="{{ asset('frontEnd/assets/contact-us/mail.png') }}" />
                        </div>
                        <p>{{ setting('email') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/intl-tel-input@17.0.3/build/css/intlTelInput.css">
    <style>
        .iti {

            width: 100%;
            margin-top: 3rem;
        }
    </style>
@endpush
@push('js')
    <script src="https://unpkg.com/intl-tel-input@17.0.3/build/js/intlTelInput.js"></script>
    <script>
        var iti = window.intlTelInput(document.getElementById("phone"), {
            separateDialCode: true,
            formatOnDisplay: false,
            utilsScript: "https://unpkg.com/intl-tel-input@17.0.3/build/js/utils.js",
            onlyCountries: @json(Countries()->pluck('country_code')),
            preferredCountries: ['sa']
        });
        window.iti = iti;
        iti.setCountry("{{ old('country_code', isset($country_code) ? $country_code : 'SA') }}");

        document.getElementById("phone").addEventListener("countrychange", function() {
            document.getElementById("phone").value = '';
            document.getElementById("country_code").value = iti.getSelectedCountryData().iso2.toUpperCase();
            document.getElementById("phone_code").value = iti.getSelectedCountryData().dialCode;
        })
    </script>
@endpush
@section('js')
    <script>
        // JavaScript for label effects only
        $(window).load(function() {
            $(".col-3 input").val("");

            $(".input-effect input").focusout(function() {
                if ($(this).val() != "") {
                    $(this).addClass("has-content");
                } else {
                    $(this).removeClass("has-content");
                }
            })
        });
    </script>
@endsection
