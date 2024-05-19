@extends('Admin.layout')
@section('pagetitle',__('trans.addresses'))
@section('content')
<form method="POST" action="{{ route('admin.addresses.store', $client) }}">
    @csrf
    <div class="row">
        <input type="hidden" name="client_id" value="{{$client->id}}">
        <div class="col-md-6 my-2">
            <label for="">@lang('trans.client')</label>
            <input type="text" readonly value="{{$client->name}}" class="form-control">
        </div>
        <div class="col-md-6 my-2">
            <label for="lat">@lang('trans.lat')</label>
            <input id="lat" type="text" name="lat" required placeholder="@lang('trans.lat')" class="form-control">
        </div>
        <div class="col-md-6 my-2">
            <label for="long">@lang('trans.long')</label>
            <input id="long" type="text" name="long" required placeholder="@lang('trans.long')" class="form-control">
        </div>

        <div class="col-md-6 my-2">
            <label for="additional_directions">@lang('trans.additional_directions')</label>
            <textarea id="additional_directions" type="text" name="additional_directions" required placeholder="@lang('trans.additional_directions')" class="form-control mceNoEditor"></textarea>
        </div>

        <div class="clearfix"></div>
        <div class="form-group col-12 m-b-0 text-center mx-auto mt-2">
            <button class="main-btn waves-effect waves-light" type="submit">@lang('trans.add')</button>
            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">@lang('trans.cancel')</button>
        </div>
    </div>
</form>
@endsection
