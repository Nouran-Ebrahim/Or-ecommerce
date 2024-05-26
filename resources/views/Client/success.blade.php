@extends('Client.layouts.layout')
@push('css')
    <link rel="stylesheet" href="{{ asset('frontEnd/css/font-awesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontEnd/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontEnd/css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontEnd/scss/responsive.css') }}" />
@endpush
@section('content')
    {{-- <div class="container my-5">
    <div class="row d-flex justify-content-center flex-column align-items-center">
        <img class="w-50" src="{{ asset('assets/imgs/home/3e3805322fb5a260f8adeeeb71628219.gif') }}" />
        <p class="fs-5 fw-semibold text-center">Thank you!</p>
        <p class="fs-6 fw-semibold text-secondary text-center">Your order was placed successfully</p>
        <div class="py-2">
            <p class=" fw-light text-secondary d-flex justify-content-center">
                <span class="px-2">Your order number: {{ $Order->id }}</span>
            </p>
            <p class=" fw-light text-secondary d-flex justify-content-center">
                <span class="px-2">Order date: {{ $Order->created_at->format('Y-m-d') }}</span>
                <span class="px-2">at {{ $Order->created_at->format('h:m a')  }}</span>
            </p>
        </div>
        <a href="{{ route('client.shop') }}" class="text-black text-decoration-underline text-center  m-auto  gap-2 my-2  py-2">Continue shopping</a>
    </div>
</div> --}}
    <section class="order-confirm container mt-5 pt-5 section-top">
        <div class="order-logo-img-box text-center my-5">
            <img src="./assets/order-confirm/logo.png" alt="" />
        </div>
        <h2>@lang('trans.THANKS FOR SHOPPING WITH US')</h2>
        <div class="row">
            <div class="col-lg-6">
                <div class="order-data">
                    <p class="confirmation-note">
                        @lang('trans.We have sent the order confirmation details to') {{ $Order->client->email }}
                    </p>
                    <p class="order-number">@lang('trans.Order Number') <span>#{{ $Order->id }}</span></p>
                    @if ($Order->address_id != null)
                        <h4 class="shipping-address-title">@lang('trans.SHIPPING ADDRESS')</h4>
                        {{-- <p>Sohila Afify</p> --}}
                        <p>{{ $Order->address->country->title() }}</p>
                        <p>{{ $Order->address->building_no }} {{ $Order->address->road }} @lang('trans.Street'),
                            {{ $Order->address->region->title() }}</p>
                        {{-- <p>Example@mail.com</p> --}}
                        {{-- <p>(+966)38985550</p> --}}
                    @endif

                    <h5 class="payment-method">@lang('trans.Payment')</h5>
                    <div class="payment-img-box">
                        <img src="{{ asset($Order->PaymentMethod->image) }}" alt="" />
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="order-container">
                    <h4 class="shipping order">@lang('trans.Order summary')</h4>
                    @foreach ($Order->OrderProducts as $item)
                        <div class="order-item">
                            <div class="order-img-box col-lg-2 col-6">
                                <img class="w-100" src="{{ asset($item->Color->Header[0]->header) }}" />
                            </div>
                            <div class="order-details">
                                <p class="name">{{ $item->Product->title() }}</p>
                                <p class="details">@lang('trans.size') : {{ $item->Size->title() }}</p>
                                <p class="details">@lang('trans.color') : {{ $item->Color->title() }}</p>
                                <p class="details">@lang('trans.quantity') : {{ $item->quantity }}</p>
                            </div>
                            <p class="price">{{ Country()->currancy_code_en }}
                                {{ number_format(Country()->currancy_value * $item->price, Country()->decimals, '.', '') }}
                            </p>
                        </div>
                    @endforeach
                    <div class="order-summary">
                        <p class="name">@lang('trans.SUBTOTAL')</p>
                        <p class="amount">{{ Country()->currancy_code_en }}
                            {{ number_format(Country()->currancy_value * $Order->sub_total, Country()->decimals, '.', '') }}
                        </p>
                    </div>
                    @if ($Order->coupon > 0)
                        <div class="order-summary">
                            <p class="name">@lang('trans.Coupon')</p>
                            <p class="amount">{{ Country()->currancy_code_en }}
                                {{ number_format(Country()->currancy_value * $Order->coupon, Country()->decimals, '.', '') }}
                            </p>
                        </div>
                    @endif

                    

                    @if ($Order->coupon > 0)
                        <div class="order-summary">
                            <p class="name">@lang('trans.Sub Total after coupon')</p>
                            <p class="amount">{{ Country()->currancy_code_en }}
                                {{ number_format(Country()->currancy_value * $Order->sub_total_after_coupon, Country()->decimals, '.', '') }}
                            </p>
                        </div>
                    @endif
                    <div class="order-summary">
                        <p class="name">@lang('trans.VAT')({{ $Order->vat_percentage }}%)</p>
                        <p class="amount">{{ Country()->currancy_code_en }}
                            {{ number_format(Country()->currancy_value * $Order->vat, Country()->decimals, '.', '') }}</p>
                    </div>
                    @if ($Order->delivery_id == 1)
                        <div class="order-summary">
                            <p class="name">@lang('trans.SHIPPING')</p>
                            <p class="amount">{{ Country()->currancy_code_en }}
                                {{ number_format(Country()->currancy_value * $Order->charge_cost, Country()->decimals, '.', '') }}
                            </p>
                        </div>
                    @endif

                    <div class="order-summary">
                        <p class="name">@lang('trans.TOTAL')</p>
                        <p class="amount total">{{ Country()->currancy_code_en }}
                            {{ number_format(Country()->currancy_value * $Order->net_total, Country()->decimals, '.', '') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
