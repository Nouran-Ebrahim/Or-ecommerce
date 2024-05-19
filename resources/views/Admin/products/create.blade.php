@extends('Admin.layout')

@section('pagetitle',__('trans.Add Product'))

@push('js')
<script>
    $('#discountDiscount').change(function() {
        if ($(this).val() === '1') {
            $('.discount').removeClass('hide');
        } else {
            $('.discount').addClass('hide');
            $('#discount').val('');
            $('#discount_from').val('');
            $('#discount_to').val('');
        }
    });

</script>
@endpush

@section('content')
<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" data-parsley-validate>
    @csrf
    <div class="row">

        <div class="form-group my-1 col-md-6 col-sm-12">
            <label class="my-1">@lang('trans.title_ar')</label>
            <input required type="text" name="title_ar" value="{{ old('title_ar') }}" placeholder="@lang('trans.title_ar')" class="form-control">
        </div>
        <div class="form-group my-1 col-md-6 col-sm-12">
            <label class="my-1">@lang('trans.title_en')</label>
            <input required type="text" name="title_en" value="{{ old('title_en') }}" placeholder="@lang('trans.title_en')" class="form-control">
        </div>
        <div class="form-group my-1 col-md-6 col-sm-12">
            <label class="my-1">@lang('trans.desc_ar')</label>
            <textarea name="desc_ar" placeholder="@lang('trans.desc_ar')" class="form-control">{{ old('desc_ar') }}</textarea>
        </div>
        <div class="form-group my-1 col-md-6 col-sm-12">
            <label class="my-1">@lang('trans.desc_en')</label>
            <textarea name="desc_en" placeholder="@lang('trans.desc_en')" class="form-control">{{ old('desc_en') }}</textarea>
        </div>

        <div class="form-group my-1 col-md-6 col-sm-12">
            <label class="my-1">@lang('trans.code')</label>
            <input type="text" name="code" value="{{ old('code') }}" placeholder="@lang('trans.code')" class="form-control">
        </div>

        <div class="form-group my-1 col-md-6 col-sm-12">
            <label class="my-1">@lang('trans.Categories')</label>
            <select name="categories[]" required class="form-control selectpicker  w-100" data-live-search="true" multiple>
                @foreach($finalArray as $category=>$value)
                <option value="{{ $category }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group my-1 col-md-6 col-sm-12">
            <label class="my-1">@lang('trans.sizes')</label>
            <select name="sizes[]" required class="form-control selectpicker w-100" data-live-search="true" multiple>
                @foreach($Sizes as $Size)
                    <option value="{{ $Size['id'] }}">{{ $Size->title() }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group my-1 col-md-6 col-sm-12">
            <label class="my-1">@lang('trans.colors')</label>
            <select name="colors[]" required class="form-control selectpicker w-100" data-live-search="true" multiple>
                @foreach($Colors as $Color)
                    <option value="{{ $Color['id'] }}">{{ $Color->title() }}</option>
                @endforeach
            </select>
        </div>
        {{-- <div class="form-group my-1 col-md-6 col-sm-12">
            <label class="my-1">@lang('trans.code')</label>
            <input type="text" name="code" value="" placeholder="@lang('trans.code')" class="form-control">
        </div> --}}
        <div class="form-group my-1 col-md-6 col-sm-12">
            <label class="my-1">@lang('trans.material_ar')</label>
            <textarea name="material_ar" placeholder="@lang('trans.material_ar')" class="form-control  mceNoEditor">{{ old('material_ar') }}</textarea>
        </div>
        <div class="form-group my-1 col-md-6 col-sm-12">
            <label class="my-1">@lang('trans.material_en')</label>
            <textarea name="material_en" placeholder="@lang('trans.material_en')" class="form-control  mceNoEditor">{{ old('material_en') }}</textarea>
        </div>
                   
        <div class="col-12 col-md-6">
            <label class="my-1">@lang('trans.price') </label>
            <input value="" id="price" type="number" step="any" name="price" placeholder="@lang('trans.price')" class="form-control">
        </div> 

        {{-- <div class="form-group my-1 col-md-6 col-sm-12">
            <label class="my-1">@lang('trans.VAT')</label>
            <select class="form-control " required name="VAT">
                <option value="exclusive">@lang('trans.exclusive')</option>
                <option value="inclusive">@lang('trans.inclusive')</option>
            </select>
        </div> --}}

        <div class="form-group my-1 col-md-6 col-sm-12">
            <label class="my-1">@lang('trans.visibility')</label>
            <select class="form-control " required name="status">
                <option value="0">@lang('trans.hidden')</option>
                <option selected value="1">@lang('trans.visible')</option>
            </select>
        </div>
        <div class="form-group my-1 col-md-6 col-sm-12">
            <label class="my-1">@lang('trans.isThereDiscount')</label>
            <select id="discountDiscount" name="have_discount"  class="form-control">
                <option value="1">@lang('trans.yes')</option>
                <option selected value="0">@lang('trans.no')</option>
            </select>
        </div>
        <div class="form-group my-1 col-md-6 discount {{ old('from') ? '' : 'hide' }}">
            <label class="my-1">@lang('trans.discount_from')</label>
            <input id="discount_from" type="date" name="from" placeholder="@lang('trans.discount_from')" class="form-control">
        </div>
        <div class="form-group my-1 col-md-6 discount {{ old('to') ? '' : 'hide' }}">
            <label class="my-1">@lang('trans.discount_to')</label>
            <input id="discount_to" type="date" name="to" placeholder="@lang('trans.discount_to')" class="form-control">
        </div>
        <div class="form-group my-1 col-md-6 discount {{ old('discount') ? '' : 'hide' }}">
            <label class="my-1">@lang('trans.discount')<span class="h4">%</span></label>
            <input id="discount" type="number" step="any" name="discount" placeholder="@lang('trans.discount')" class="form-control">
        </div>
        <div class="form-group my-1 col-md-6 col-sm-12">
            <label class="my-1">@lang('trans.images')</label>
            <label class="file-input btn btn-block btn-secondary btn-file w-100">
                @lang("trans.Browse")
                <input accept="image/*" type="file" type="file" name="images[]" multiple>
            </label>
        </div>

        
        <div class="clearfix"></div>
    
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

@include('Admin.MultiSelect')
@endsection
