@extends('Admin.layout')
@section('pagetitle',__('trans.addresses'))
@section('content')
<form method="POST" action="{{ route('admin.addresses.update', ['address' => $address]) }}">
    @csrf
    @method('PUT')
    <div class="row">
        <input type="hidden" name="client_id" value="{{$address->client->id}}">

        <div class="col-md-6 my-2">
            <label for="">@lang('trans.client')</label>
            <input type="text" readonly value="{{$address->client->name}}" class="form-control">
        </div>

        <div class="col-md-6 my-2">
            <label for="lat">@lang('trans.lat')</label>
            <input id="lat" type="text" name="lat"  placeholder="@lang('trans.lat')" value="{{$address->lat}}" class="form-control">
        </div>
        <div class="col-md-6 my-2">
            <label for="long">@lang('trans.long')</label>
            <input id="long" type="text" name="long"  placeholder="@lang('trans.long')" value="{{$address->long}}" class="form-control">
        </div>
        <div class="col-md-6 my-2">
            <label for="additional_directions">@lang('trans.additional_directions')</label>
            <textarea id="additional_directions" type="text" name="additional_directions"  value="{{$address->additional_directions}}" placeholder="@lang('trans.additional_directions')" class="form-control mceNoEditor"></textarea>
        </div>

        <div class="clearfix"></div>
        <div class="form-group col-12 m-b-0 text-center mx-auto mt-2">
            <button class="main-btn waves-effect waves-light" type="submit">@lang('trans.update')</button>
            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">@lang('trans.cancel')</button>
        </div>
    </div>
</form>
@endsection
