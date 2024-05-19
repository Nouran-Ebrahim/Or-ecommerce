@extends('Admin.layout')
@section('pagetitle', __('trans.Countries'))
@section('content')
<form method="POST" action="{{ route('admin.countries.update',$Country) }}" enctype="multipart/form-data" data-parsley-validate novalidate>
    @csrf
    @method('PUT')
    <div class="row">
        <div class="form-group col-md-6">
            <label for="title_ar">@lang('trans.title_ar')</label>
            <input type="text" name="title_ar" id="title_ar" class="form-control" required value="{{ $Country['title_ar'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="title_en">@lang('trans.title_en')</label>
            <input type="text" name="title_en" id="title_en" class="form-control" required value="{{ $Country['title_en'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="country_code">@lang('trans.country_code')</label>
            <input type="text" name="country_code" id="country_code" class="form-control" required value="{{ $Country['country_code'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="phone_code">@lang('trans.phone_code')</label>
            <input type="text" name="phone_code" id="phone_code" class="form-control" required value="{{ $Country['phone_code'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="currancy_code">@lang('trans.currancy_code')</label>
            <input type="text" name="currancy_code" id="currancy_code" class="form-control" required value="{{ $Country['currancy_code'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="currancy_value">@lang('trans.currancy_value')</label>
            <input type="text" name="currancy_value" id="currancy_value" class="form-control" required value="{{ $Country['currancy_value'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="phone_length">@lang('trans.phone_length')</label>
            <input type="text" name="length" id="phone_length" class="form-control" required value="{{ $Country['length'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="visibility">@lang('trans.visibility')</label>
            <select class="form-control" required id="visibility" name="status">
                <option {{ $Country['status'] == 1 ? 'selected' : '' }} value="1">@lang('trans.visible')</option>
                <option {{ $Country['status'] == 0 ? 'selected' : '' }} value="0">@lang('trans.hidden')</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="accept_orders">@lang('trans.accept_orders')</label>
            <select class="form-control" required id="accept_orders" name="status">
                <option {{ $Country['accept_orders'] == 1 ? 'selected' : '' }} value="1">@lang('trans.yes')</option>
                <option {{ $Country['accept_orders'] == 0 ? 'selected' : '' }} value="0">@lang('trans.no')</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label for="file">@lang("trans.image")</label>
            <label for="file" class="file-input btn btn-block btn-secondary btn-file w-100">
                @lang("trans.Browse")
                <input accept="image/*" type="file" type="file" name="image" id="file">
            </label>
        </div>
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
