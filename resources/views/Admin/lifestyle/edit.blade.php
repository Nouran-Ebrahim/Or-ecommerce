@extends('Admin.layout')
@section('pagetitle', __('trans.lifestyle'))
@section('content')
    <form method="POST" action="{{ route('admin.lifestyle.update',$LifeStyle) }}" enctype="multipart/form-data" data-parsley-validate
        novalidate>
        @csrf
        @method('PUT')
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
                    <option {{ $LifeStyle['status'] == 0 ? 'selected' : '' }} value="0">@lang('trans.hidden')</option>
                    <option {{ $LifeStyle['status'] == 1 ? 'selected' : '' }} value="1">@lang('trans.visible')</option>
                </select>
            </div>
            <div class="clearfix"></div>
            <div class="col-12">
                <div class="button-group">
                    <button type="submit" class="main-btn btn-hover w-100 text-center">
                        {{ __('trans.Submit') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection


