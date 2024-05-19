@extends('Admin.layout')
@section('pagetitle', __('trans.offers'))
@section('content')
    <form method="POST" action="{{ route('admin.mail_offer.store') }}" enctype="multipart/form-data" data-parsley-validate novalidate>
        @csrf
        <div class="row">
            <div class="col-md-12 my-2">
                <label for="title">@lang('trans.title')</label>
                <input id="title" type="text" name="title" value="{{ old('title') }}" required placeholder="@lang('trans.title')" class="form-control">
            </div>
            <div class="col-md-12 my-2">
                <label for="desc">@lang('trans.desc')</label>
                <textarea class="form-control" placeholder="@lang('trans.description')" name="desc"  id="desc" required rows="7">
                    {{ old('desc') }}
                </textarea>
            </div>
            <div class="col-md-12 my-2">
                <label for="file">@lang('trans.image')</label>
                <label for="file" class="file-input btn btn-block btn-secondary btn-file w-100">
                    @lang("trans.Browse")
                    <input accept="image/*" type="file" type="file" name="image" id="file">
                </label>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-12 m-b-0 text-center mx-auto mt-2">
                <button class="main-btn waves-effect waves-light" type="submit">@lang('trans.Send Email')</button>
                <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">@lang('trans.cancel')</button>
            </div>
        </div>
    </form>
@endsection
