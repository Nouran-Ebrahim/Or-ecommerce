@extends('Admin.layout')
@section('pagetitle', __('trans.colors'))
@section('content')
<form method="POST" action="{{ route('admin.colors.store') }}" enctype="multipart/form-data" data-parsley-validate novalidate>
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="title_ar">@lang('trans.title_ar')</label>
            <input id="title_ar" type="text" name="title_ar" required placeholder="@lang('trans.title_ar')" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="title_en">@lang('trans.title_en')</label>
            <input id="title_en" type="text" name="title_en" required placeholder="@lang('trans.title_en')" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="color">@lang('trans.color')</label>
            <input id="color" type="color" name="hexa" required placeholder="@lang('trans.color')" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="visibility">@lang('trans.visibility')</label>
            <select class="form-control" required id="visibility" name="status">
                <option value="0">@lang('trans.hidden')</option>
                <option selected value="1">@lang('trans.visible')</option>
            </select>
        </div>
        {{-- <div class="form-group my-1 col-md-6 col-sm-12">
            <label class="my-1">@lang('trans.image')</label>
            <label class="file-input btn btn-block btn-secondary btn-file w-100">
                @lang('trans.Browse')
                <input accept="image/*" type="file" type="file" name="image">
            </label>
        </div> --}}
        <div class="clearfix"></div>
        <div class="form-group col-12 m-b-0 text-center mx-auto mt-2">
            <button class="main-btn waves-effect waves-light" type="submit">@lang('trans.add')</button>
            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">@lang('trans.cancel')</button>
        </div>
    </div>
</form>
@endsection
