@extends('Admin.layout')
@section('pagetitle', __('trans.clients'))

@section('content')
    <form action="{{ route('admin.clients.update', $Client) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- <div class="text-center">
        <img src="{{ asset(setting('logo')) }}" class="rounded mx-auto text-center" style="border-radius: 50% !important" id="image" width="200px" height="200px">
    </div> --}}
        <div class="row">
            <div class="col-12"></div>
            <div class="col-md-6 ">
                <label for="first_name">{{ __('trans.first_name') }}</label>
                <input value="{{ $Client->first_name }}" type="text" name="first_name" id="first_name"
                    parsley-trigger="change" required value="" class="form-control">
            </div>
            <div class="col-md-6 ">
                <label for="last_name">{{ __('trans.last_name') }}</label>
                <input value="{{ $Client->last_name }}" type="text" name="last_name" id="last_name"
                    parsley-trigger="change" required value="" class="form-control">
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="email">{{ __('trans.email') }}</label>
                <input value="{{ $Client->email }}" type="email" name="email" parsley-trigger="change" value=""
                    required class="form-control">
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="phone">{{ __('trans.phone') }}</label>
                <input
                    class="form-control @error('phone_code') is-invalid @enderror @error('country_code')is-invalid @enderror @error('phone')is-invalid @enderror"
                    type="phone" name="phone" id="phone" placeholder="{{ __('trans.Phone') }}"
                    value="{{ old('phone', $Client->phone) }}" required>
                <input type="hidden" name="country_code" id="country_code" value="{{ $Client->country_code ?? 'BH' }}">
                <input type="hidden" name="phone_code" id="phone_code" value="{{ $Client->phone_code ?? 973 }}">
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="password">{{ __('trans.password') }}</label>
                <input  type="password" name="password" id="password"
                    parsley-trigger="change" class="form-control" data-parsley-id="10">
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="password_confirmation">{{ __('trans.confirmPassword') }}</label>
                <input  type="password" name="password_confirmation"
                    id="password_confirmation" parsley-trigger="change" class="form-control" data-parsley-id="10">
            </div>

            {{-- <div class="form-group col-md-6">
            <label for="file">@lang('trans.image')</label>
            <label for="file" class="file-input btn btn-block btn-secondary btn-file w-100">
                @lang("trans.Browse")
                <input accept="image/*" type="file" type="file" name="image" id="file" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
            </label>
        </div> --}}
            <div class="clearfix"></div>
            <div class="col-12 my-4">
                <div class="button-group">
                    <button type="submit" class="main-btn btn-hover w-100 text-center">
                        {{ __('trans.Submit') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('css')
    <link rel="stylesheet" href="https://unpkg.com/intl-tel-input@17.0.3/build/css/intlTelInput.css">
@endpush
@push('js')
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

        iti.setCountry("{{ old('country_code', isset($Client->country_code) ? $Client->country_code : 'SA') }}");
        document.querySelector("#phone").addEventListener("countrychange", function() {
            document.getElementById("phone").value = '';
            document.getElementById("country_code").value = iti.getSelectedCountryData().iso2.toUpperCase();
            document.getElementById("phone_code").value = iti.getSelectedCountryData().dialCode;
        })
    </script>
@endpush
