@extends('Admin.layout')
@section('pagetitle', __('trans.vacancy'))
@section('content')
<form method="POST" action="{{ route('admin.vacancy.store') }}" enctype="multipart/form-data" data-parsley-validate novalidate>
    @csrf
    <div class="row">
        <div class="form-group col-md-6">
            <label for="title_ar">@lang('trans.title_ar')</label>
            <input type="text" name="title_ar" id="title_ar" class="form-control" required>
        </div>
        <div class="form-group col-md-6">
            <label for="title_en">@lang('trans.title_en')</label>
            <input type="text" name="title_en" id="title_en" class="form-control" required>
        </div>

        <div class="form-group col-md-6">
            <label for="desc_ar">@lang('trans.desc_ar')</label>
            <textarea type="text" name="desc_ar" id="desc_ar" class="form-control " ></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="desc_en">@lang('trans.desc_en')</label>
            <textarea type="text" name="desc_en" id="desc_en" class="form-control " ></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="from">@lang('trans.from')</label>
            <input type="date" id="from" name="from"  class="form-control"/>
        </div>
        <div class="form-group col-md-6">
            <label for="to">@lang('trans.to')</label>
            <input type="date" id="to" name="to"  class="form-control"/>
        </div>
        
        <div class="form-group col-md-6">
            <label for="visibility">@lang('trans.visibility')</label>
            <select class="form-control" required id="visibility" name="status">
                <option disabled hidden selected>@lang('trans.Select')</option>
                <option selected value="1">@lang('trans.visible')</option>
                <option value="0">@lang('trans.hidden')</option>
            </select>
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
