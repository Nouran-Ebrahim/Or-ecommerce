@extends('Admin.layout')
@section('pagetitle', __('trans.vacancy'))
@section('content')
{{-- <div class="text-center">
    <img loading="lazy" src="{{ $vacancy->image }}" class="img-fluid rounded m-auto" style="max-width:200px" alt="image">
</div> --}}

<form method="POST" action="{{ route('admin.vacancy.update',['vacancy' => $vacancy ]) }}" enctype="multipart/form-data" data-parsley-validate novalidate>
    @csrf
    @method('PUT')
    <div class="row">
        <div class="form-group col-md-6">
            <label for="title_ar">@lang('trans.title_ar')</label>
            <input type="text" name="title_ar" id="title_ar" class="form-control" required value="{{ $vacancy['title_ar'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="title_en">@lang('trans.title_en')</label>
            <input type="text" name="title_en" id="title_en" class="form-control" required value="{{ $vacancy['title_en'] }}">
        </div>
        <div class="form-group col-md-6">
            <label for="desc_ar">@lang('trans.desc_ar')</label>
            <textarea type="text" name="desc_ar" id="desc_ar" class="form-control " >{{ $vacancy['desc_ar'] }}</textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="desc_en">@lang('trans.desc_en')</label>
            <textarea type="text" name="desc_en" id="desc_en" class="form-control " >{{ $vacancy['desc_en'] }}</textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="from">@lang('trans.from')</label>
            <input type="date" value="{{ $vacancy['from'] }}" id="from" name="from"  class="form-control"/>
        </div>
        <div class="form-group col-md-6">
            <label for="to">@lang('trans.to')</label>
            <input type="date" value="{{ $vacancy['to'] }}" id="to" name="to"  class="form-control"/>
        </div>
        <div class="form-group col-md-6">
            <label for="visibility">@lang('trans.visibility')</label>
            <select class="form-control" required id="visibility" name="status">
                <option {{ $vacancy['status'] == 1 ? 'selected' : '' }} value="1">@lang('trans.visible')</option>
                <option {{ $vacancy['status'] == 0 ? 'selected' : '' }} value="0">@lang('trans.hidden')</option>
            </select>
        </div>

        {{-- <div class="form-group col-md-6">
            <label for="image">@lang('trans.image')</label>
            <label class="file-input btn btn-block btn-secondary btn-file w-100">
                @lang("trans.Browse")
                <input accept="image/*" type="file" name="image" id="image">
            </label>
        </div> --}}
       
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
