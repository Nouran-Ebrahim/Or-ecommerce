@extends('Client.layouts.layout')
@section('content')
    {{-- <div class="bread position-relative">
    <div class="in_bread">
        <div class="container w-100 h-100 mt-5">
            <div class="d-flex justify-content-center align-items-center w-100 h-100">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item h2"><a href="/" class="text-decoration-none">{{ trans('trans.Home') }}</a></li>
                    <li class="breadcrumb-item h2 active" aria-current="page">{{ trans('trans.privacy') }}</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="text-center">
    <img src="{{ asset(setting('privacy_image')) }}" alt="Image" class="my-3 SettingImage w-100">
</div>
<div class="container" style="min-height: 200px;">
    <div class="row py-5">
        <div class="col-12">
            <p class="between_bold h5" style="line-height: 2.2">{!! setting('privacy_'.lang()) !!}</p>
        </div>
    </div>
</div> --}}
    <div class="policy-section container section-top">
        {!! setting('terms_' . lang()) !!}
    </div>
@endsection
