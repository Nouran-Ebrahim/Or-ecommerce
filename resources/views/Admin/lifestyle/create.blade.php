@extends('Admin.layout')
@section('pagetitle', __('trans.lifestyle'))
@section('content')
    <form method="POST" action="{{ route('admin.lifestyle.store') }}" enctype="multipart/form-data" data-parsley-validate novalidate>
        @csrf
        <div class="row">
            
            <div id="imageInput" class="form-group col-md-6">
                <label for="file">@lang('trans.image')</label>
                <label for="file" class="file-input btn btn-block btn-secondary btn-file w-100">
                    @lang("trans.Browse")
                    <input accept="image/*" type="file"  name="image" id="file">
                </label>
            </div>
            <div class="col-md-6">
                <label for="visibility">@lang('trans.visibility')</label>
                <select class="form-control" required id="visibility" name="status">
                    <option value="0">@lang('trans.hidden')</option>
                    <option selected value="1">@lang('trans.visible')</option>
                </select>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-sm-12 my-4">
                    <div class="text-center p-20">
                        <button type="submit" class="main-btn">{{ __('trans.add') }}</button>
                        <button type="reset" class="btn btn-secondary">{{ __('trans.cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

