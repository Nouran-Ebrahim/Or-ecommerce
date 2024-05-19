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

            #phone,
            #register_phone {
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

            #phone,
            #register_phone {
                padding-left: 90px !important;
                padding-right: 90px !important;
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
                    </a>
                    @lang('trans.home')
                </li>
                <li class="breadcrumb-item fw-semibold" aria-current="page">
                    @lang('trans.Login')
                </li>
            </ol>
        </nav>
    </div>
</div>

<div class="container section-top my-5 w-50">
    <div class="row profile-login justify-content-center" style="column-gap: 10px;">
        <div class="col-12 ">
            <div class="nav flex-row  nav-pills  py-5 justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active my-1 border border-3 border-end-0 border-start-0 border-top-0 rounded-0" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                    <div class="row">
                        <div class=" col-12 d-flex flex-column justify-content-center text-center">
                            <h6 class="fw-bold  py-2 my-0 text-uppercase text-black px-lg-5">
                                @lang('trans.Login')
                            </h6>
                        </div>
                    </div>
                </button>
                <button class="nav-link my-1 border border-3 border-end-0 border-start-0 border-top-0 rounded-0" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    <div class="row">
                        <div class="col-12 d-flex flex-column justify-content-center text-center">
                            <h6 class="fw-bold py-2 my-0 text-uppercase text-black px-lg-5 text-nowrap">
                                @lang('trans.create_new_account')
                            </h6>
                        </div>
                    </div>
                </button>
            </div>
        </div>

        <div class="col-lg-8 col-12 " style="min-height: 70vh;">
            <div class="row ">
                <div class="col-12 ">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">
                            <form action="{{ route('client.login') }}" class="px-2" method="POST">
                                @csrf
                                <div class="mb-3 d-flex flex-column">
                                    <label for="phone" class="form-label">@lang('trans.Phone')</label>
                                    <input type="hidden" name="country_id" value="1" id="login_country_id">
                                    <input required type="tel" style="padding: 10px 94px;direction: {{ lang('ar') ? 'rtl' : 'ltr' }};"  class="form-control rounded-3 w-100 phone" id="login_phone" name="phone" placeholder="33******">
                                </div>
                                <div class="mb-3">
                                    <label for="Password" class="form-label">@lang('trans.Password')</label>
                                    <input required type="password" name="password" class="form-control rounded-3" name="password" placeholder="******">
                                </div>

                                <div class="mb-1 w-100 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-dark px-4 btn m-auto border border-1 border-dark rounded-3 gap-2 my-2  py-2">
                                        @lang('trans.login')
                                        </submit>
                                </div>
                                <div class="row gap-2">
                                    <div class="col-12 d-grid gap-2 d-md-flex justify-content-center px-3">
                                        <a href="{{ route('client.forget') }}" class="text-secondary text-decoration-underline" type="button">@lang('trans.forgetPassword')</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ route('client.register') }}" class="px-2" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="name" class="form-label">@lang('trans.name')</label>
                                            <input required type="text" class="form-control rounded-3" name="name" placeholder="Ahmed">
                                        </div>
                                        <div class="mb-3 d-flex flex-column">
                                            <label for="phone" class="form-label">@lang('trans.Phone')</label>
                                            <input type="hidden" name="country_id" value="1" id="register_country_id">
                                            <input required type="tel" style="padding: 10px 94px;direction: {{ lang('ar') ? 'rtl' : 'ltr' }};"  class="form-control rounded-3 w-100 phone" id="register_phone" name="phone" placeholder="33******">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">@lang('trans.email')</label>
                                            <input type="email" name="email" class="form-control rounded-3" placeholder="ah***@gmail.com">
                                        </div>
                                        <div class="mb-3">
                                            <label for="Password" class="form-label">@lang('trans.Password')</label>
                                            <input required type="password" name="password" class="form-control rounded-3" name="password" placeholder="******">
                                        </div>


                                        <div class="mb-3 w-100 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-dark px-4 btn m-auto border border-1 border-dark rounded-3 gap-2 my-2  py-2">
                                                @lang('trans.create_new_account')
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <div class="section-top">
        <section class="login-signup-section  container ">
            <div class="row justify-content-lg-between justify-content-center">
                <div class="col-lg-5 d-lg-block d-flex justify-content-center">
                    <div class="form-container--1">
                        <h3>@lang('trans.Login')</h3>
                        <form class="login" action="{{ route('client.login') }}" method="POST">
                            @csrf
                            <input type="hidden" name="country_code" id="country_code"
                                value="{{ old('ountry_code', 'SA') }}">
                            <input type="hidden" name="phone_code" id="phone_code" value="{{ old('phone_code', 966) }}">
                            <input id="phone" value="{{ old('phone') }}" name="phone" type="text"
                                placeholder="@lang('trans.Phone Number')" />
                            @error('phone')
                                <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
                            @enderror
                            <input type="password" name="password" placeholder="@lang('trans.Password')" />
                            @error('password')
                                <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
                            @enderror
                            <a href="{{ route('client.forget') }}">@lang('trans.Forget Password ?')</a>
                            <button class="btn btn-login my-4">@lang('trans.login')</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 d-lg-block my-lg-2 my-5 d-flex justify-content-center">
                    <div class="form-container--2">
                        <h3>@lang('trans.create_new_account')</h3>
                        <form autocomplete="off" class="create-account" action="{{ route('client.register') }}"
                            method="POST">
                            @csrf
                            <input value="{{ old('first_name') }}" type="text" name="first_name"
                                placeholder="@lang('trans.First Name')" />
                            @error('first_name')
                                <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
                            @enderror
                            <input value="{{ old('last_name') }}" type="text" name="last_name"
                                placeholder="@lang('trans.Last Name')" />
                            @error('last_name')
                                <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
                            @enderror
                            <input autocomplete="false" value="{{ old('email') }}" type="email" name="email"
                                placeholder="@lang('trans.email')" />
                            @error('email')
                                <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
                            @enderror
                            <input type="hidden" name="register_country_code" id="register_country_code"
                                value="{{ old('register_country_code', 'SA') }}">
                            <input type="hidden" name="register_phone_code" id="register_phone_code"
                                value="{{ old('register_phone_code', 966) }}">

                            <input value="{{ old('register_phone') }}" type="text" name="register_phone"
                                id="register_phone" placeholder="@lang('trans.Phone Number')" />
                            @error('register_phone')
                                <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
                            @enderror
                            <input type="password" name="password" placeholder="@lang('trans.password')" />
                            <button type="submit" class="btn btn-create-account">@lang('trans.CREATE ACCOUNT')</button>
                        </form>
                        <p class="creating-account-note">
                            @lang('trans.By creating an account, you agree to our Terms and Privacy & Cookies Policy')
                    </div>
                    </p>
                </div>
            </div>
        </section>
    </div>
@endsection



@push('js')
    <script src="https://unpkg.com/intl-tel-input@17.0.3/build/js/intlTelInput.js"></script>
    <script>
        var iti2 = window.intlTelInput(document.getElementById("phone"), {
            separateDialCode: true,
            formatOnDisplay: false,
            utilsScript: "https://unpkg.com/intl-tel-input@17.0.3/build/js/utils.js",
            onlyCountries: @json(Countries()->pluck('country_code')),
            preferredCountries: ['sa']
        });
        // window.iti = iti2;
        iti2.setCountry("{{ old('country_code', isset($country_code) ? $country_code : 'SA') }}");

        document.getElementById("phone").addEventListener("countrychange", function() {
            document.getElementById("phone").value = '';
            document.getElementById("country_code").value = iti2.getSelectedCountryData().iso2.toUpperCase();
            document.getElementById("phone_code").value = iti2.getSelectedCountryData().dialCode;
        })
    </script>
    <script>
        var iti = window.intlTelInput(document.getElementById("register_phone"), {
            separateDialCode: true,
            formatOnDisplay: false,
            utilsScript: "https://unpkg.com/intl-tel-input@17.0.3/build/js/utils.js",
            onlyCountries: @json(Countries()->pluck('country_code')),
            preferredCountries: ['sa']
        });
        // window.iti = iti;
        iti.setCountry("{{ old('register_country_code', isset($register_country_code) ? $country_code : 'SA') }}");
        document.getElementById("register_phone").addEventListener("countrychange", function() {

            document.getElementById("register_phone").value = '';
            document.getElementById("register_country_code").value = iti.getSelectedCountryData().iso2
                .toUpperCase();
            document.getElementById("register_phone_code").value = iti.getSelectedCountryData().dialCode;
        })
    </script>
@endpush
