@extends('Client.layouts.layout')
@push('css')
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

    #phone{
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
        .iti {

            width: 100%;
            margin-top: 3rem;
        }
    </style>
@endpush
@section('content')
    {{-- <div class="container  section-top">
        <div class="row align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-5">
                    <li class="breadcrumb-item">
                        <a href="{{ route('client.home') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                                fill="none">
                                <path
                                    d="M1.5 9.93841C1.5 8.71422 2.06058 7.55744 3.02142 6.79888L8.52142 2.45677C9.97466 1.30948 12.0253 1.30948 13.4786 2.45677L18.9786 6.79888C19.9394 7.55744 20.5 8.71422 20.5 9.93841V16.5C20.5 18.7091 18.7091 20.5 16.5 20.5H15C14.4477 20.5 14 20.0523 14 19.5V16.5C14 15.3954 13.1046 14.5 12 14.5H10C8.89543 14.5 8 15.3954 8 16.5V19.5C8 20.0523 7.55228 20.5 7 20.5H5.5C3.29086 20.5 1.5 18.7091 1.5 16.5L1.5 9.93841Z"
                                    fill="#9D9D9D" stroke="#9D9D9D" stroke-width="1.5" />
                            </svg>
                        </a>
                        @lang('trans.home')
                    </li>
                    <li class="breadcrumb-item fw-semibold" aria-current="page">
                        @lang('trans.forgetPassword')
                    </li>
                </ol>
            </nav>
        </div>
    </div>




    <div class="container  section-top">
        <div class="row align-items-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb my-5">
                    <li class="breadcrumb-item">
                        <a href="{{ route('client.home') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22"
                                fill="none">
                                <path
                                    d="M1.5 9.93841C1.5 8.71422 2.06058 7.55744 3.02142 6.79888L8.52142 2.45677C9.97466 1.30948 12.0253 1.30948 13.4786 2.45677L18.9786 6.79888C19.9394 7.55744 20.5 8.71422 20.5 9.93841V16.5C20.5 18.7091 18.7091 20.5 16.5 20.5H15C14.4477 20.5 14 20.0523 14 19.5V16.5C14 15.3954 13.1046 14.5 12 14.5H10C8.89543 14.5 8 15.3954 8 16.5V19.5C8 20.0523 7.55228 20.5 7 20.5H5.5C3.29086 20.5 1.5 18.7091 1.5 16.5L1.5 9.93841Z"
                                    fill="#9D9D9D" stroke="#9D9D9D" stroke-width="1.5" />
                            </svg>
                        </a>
                        @lang('trans.home')
                    </li>
                    <li class="breadcrumb-item fw-semibold" aria-current="page">
                        @lang('trans.forgetPassword')
                    </li>
                </ol>
            </nav>
        </div>
    </div>


    <div class="container container-fluid mt-5 mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 mx-auto d-flex justify-content-center">
                    <form action="{{ route('client.forget') }}" method="POST" id="forget-form" style="display:contents">
                        @csrf
                        <div class="my-1">
                            <h1>@lang('trans.forgetPassword')</h1>
                            <div class="form-group">
                                <label for="phone" class="form-label">@lang('trans.phone')</label>
                                <input type="hidden" name="phone_code" id="phone_code"
                                    value="{{ Country()->phone_code }}" />
                                <input type="hidden" name="country_code" id="country_code"
                                    value="{{ Country()->country_code }}" />
                                <input required class="form-control" type="tel"
                                    style="padding: 10px 94px;direction: {{ lang('ar') ? 'rtl' : 'ltr' }};" name="phone"
                                    id="phone" minlength="{{ Country()->length }}" maxlength="{{ Country()->length }}"
                                    size="{{ Country()->length }}" autocomplete="off" />
                            </div>
                            <div class="form-group d-none">
                                <label for="password" class="form-label">@lang('trans.password')</label>
                                <input required class="form-control" type="password" id="password" name="password"
                                    autocomplete="off" />
                            </div>
                            <div class="form-group d-none">
                                <label for="password_confirmation" class="form-label">@lang('trans.password_confirmation')</label>
                                <input required class="form-control" type="password" id="password_confirmation"
                                    id="password_confirmation" name="password_confirmation" autocomplete="off" />
                            </div>
                            <div class="text-center">
                                <input
                                    class="my-3 btn btn-dark px-4 btn m-auto border border-1 border-dark rounded-3 gap-2 my-2 w-50 py-2 px-5 mx-auto"
                                    type="submit" id="forget" value="@lang('trans.Submit')" />
                                <p>@lang('trans.haveAccount') <a href="{{ route('client.login') }}"
                                        class="text-secondary text-decoration-underline">@lang('trans.login')</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



    <div class="modal fade ModalVerify" id="Verify" tabindex="-1" aria-labelledby="VerifyLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('trans.Verify_phone_number') (WhatsApp)</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="code" class="form-label">@lang('trans.code')</label>
                        <input class="form-control" type="text" id="code" minlength="6" maxlength="6">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('trans.close')</button>
                    <button type="button"
                        class="btn btn-dark px-4 btn m-auto border border-1 border-dark rounded-3 gap-2 my-2 w-50 py-2"
                        id="verifPhNum">@lang('trans.Submit')</button>
                </div>
            </div>
        </div>
    </div> --}}
    <section class="send-email container section-top">
        <h3>@lang('trans.RESET PASSWORD')</h3>
        <p>
            @lang('trans.Please enter your phone number. You will receive a OTP to create a new password via phone number.')
        </p>
        <form action="{{ route('client.forget') }}" method="POST" class="send-mail">
            @csrf
            <input type="hidden" name="phone_code" id="phone_code" value="{{ Country()->phone_code }}" />
            <input type="hidden" name="country_code" id="country_code" value="{{ Country()->country_code }}" />
            <input value="{{ old('phone') }}" required type="text" name="phone" id="phone"
                placeholder="@lang('trans.Phone Number')" autocomplete="off" />
            @error('phone')
                <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-send">@lang('trans.send')</button>
            <a href="{{ route('client.home') }}" class="btn btn-cancel">@lang('trans.cancel')</a>
        </form>
    </section>
@endsection

@push('css')
    <link rel="stylesheet" href="https://unpkg.com/intl-tel-input@17.0.3/build/css/intlTelInput.css">
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        var initialCountryCode = "{{ old('country_code', 'SA') }}";
        var initialPhoneCode = "{{ old('phone_code', 966) }}";
        iti.setCountry(initialCountryCode.toLowerCase());
        // iti.setCountry("{{ old('country_code', isset($country_code) ? $country_code : 'SA') }}");
        document.getElementById("phone").addEventListener("countrychange", function() {

            document.getElementById("phone").value = '';
            document.getElementById("country_code").value = iti.getSelectedCountryData().iso2
                .toUpperCase();
            document.getElementById("phone_code").value = iti.getSelectedCountryData().dialCode;
        })
        document.getElementById("country_code").value = initialCountryCode;
        document.getElementById("phone_code").value = initialPhoneCode;
    </script>
    {{-- <script>
        var iti = window.intlTelInput(document.querySelector("#phone"), {
            separateDialCode: true,
            formatOnDisplay: false,
            onlyCountries: @json(countries()->pluck('country_code')->toarray()),
            utilsScript: "https://unpkg.com/intl-tel-input@17.0.3/build/js/utils.js",
            preferredCountries: ["{{ Country()->country_code }}"],
        });
        window.iti = iti;
        document.querySelector("#phone").addEventListener("countrychange", function() {
            $('#phone').val('');
            dialCode = iti.getSelectedCountryData().dialCode;
            length = 0;
            $.each(@json(countries()), function(key, element) {
                if (element.phone_code.includes(dialCode)) {
                    length = element.length;
                    country_id = element.id;
                }
            });

            document.getElementById("phone").value = '';
            document.getElementById("country_code").value = iti.getSelectedCountryData().iso2.toUpperCase();
            document.getElementById("phone_code").value = iti.getSelectedCountryData().dialCode;
            $('#phone').attr("minlength", length);
            $('#phone').attr("maxlength", length);
            $('#phone').attr("size", length);
            $('#phone_code').val(dialCode);
        })
    </script> --}}
    <script>
        verified = false;
        code = null;
        $(document).on("click", "#verifPhNum", function(event) {
            if (code == $('#code').val()) {
                verified = true;
                $('#phone').closest('.form-group').addClass('d-none');
                $('#password').closest('.form-group').removeClass('d-none');
                $('.ModalVerify').modal('hide');
            }
        });
        $(document).on("click", "#forget", function(event) {
            event.preventDefault();
            phone_number = $('#phone_code').val() + $('#phone').val();
            if (verified == false) {
                if ($('#phone').val().length == 0) {
                    toast('error', "{{ __('validation.required', ['attribute' => __('trans.phone')]) }}")
                } else if (verified == false) {
                    $('.ModalVerify').modal('show');
                    if (code) {
                        toast('success', "{{ __('trans.Verify_phone_number') }}");
                    } else {
                        $.ajax({
                            url: "/sendotp/" + phone_number,
                            dataType: "json",
                            type: "POST",
                            async: true,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data) {
                                toast('success', "{{ __('trans.Verify_phone_number') }}");
                                code = data.code;
                            }
                        });
                    }
                }
            } else if ($('#password').val().length == 0) {
                toast('error', "{{ __('validation.required', ['attribute' => __('trans.password')]) }}")
            } else if ($('#password_confirmation').val().length == 0) {
                toast('error', "{{ __('validation.required', ['attribute' => __('trans.password')]) }}")
            } else if (verified == true) {
                $('#forget-form').submit();
            }
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
