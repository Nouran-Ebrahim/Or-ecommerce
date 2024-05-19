@extends('Admin.layout')
@section('pagetitle', __('trans.categories'))
@section('content')
    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" data-parsley-validate
        novalidate>
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="title_ar">@lang('trans.title_ar')</label>
                <input type="text" name="title_ar" id="title_ar" class="form-control" required
                    data-buttonname="btn-primary">
            </div>
            <div class="col-md-6">
                <label for="title_en">@lang('trans.title_en')</label>
                <input type="text" name="title_en" id="title_en" class="form-control" required
                    data-buttonname="btn-primary">
            </div>
            <div class="col-md-6">
                <label for="is_parent">@lang('trans.is_parent')</label>
                <input class="form-check-input" type="checkbox" name="is_parent" id="is_parent" class="form-control" checked
                    value="1">
            </div>
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.image')</label>
                <label class="file-input btn btn-block btn-secondary btn-file w-100">
                    @lang('trans.Browse')
                    <input accept="image/*" type="file" type="file" name="image">
                </label>
            </div>
            <div class="col-md-6 d-none" id="parent_category_div" >
                <label for="categories">@lang('trans.categories')</label>
                <select class="form-control" id="categories" name="parent_id">
                    <option selected disabled value="">@lang('trans.category')</option>
                    @foreach ($Categories as $Category)
                        <option value="{{ $Category->id }}">{{ $Category->title() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="visibility">@lang('trans.visibility')</label>
                <select class="form-control" required id="visibility" name="status">
                    <option selected value="1">@lang('trans.visible')</option>
                    <option value="0">@lang('trans.hidden')</option>
                </select>
            </div>

            <div class="clearfix"></div>
            <div class="row mx-auto">
                <div class="col-sm-12 my-4">
                    <div class="text-center p-20 ">
                        <button type="submit" class="main-btn">{{ __('trans.add') }}</button>
                        <button type="reset" class="btn btn-secondary">{{ __('trans.cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
@push('js')
    <script>
        $(document).ready(function() {
            // $('#parent_category_div').hide();
            $('#is_parent').change(function(e) {
                e.preventDefault();
                var is_checked = $('#is_parent').prop('checked');
                //   alert(is_checked)
                if (is_checked) {
                    $('#parent_category_div').addClass('d-none');
                    $('#categories').val('')
                } else {
                    $('#parent_category_div').removeClass('d-none');
                }
            })
        })
    </script>
@endpush
