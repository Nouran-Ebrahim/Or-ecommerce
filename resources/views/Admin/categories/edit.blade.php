@extends('Admin.layout')
@section('pagetitle', __('trans.categories'))
@section('content')
    <form method="POST" action="{{ route('admin.categories.update',$Category) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col text-center">
                <img width="200px" src="{{ asset($Category->image) }}" alt="item" class="changeimage">
            </div>
        </div>
        <div class="row">
            <div class=" col-md-6">
                <label for="title_ar">@lang('trans.title_ar')</label>
                <input id="title_ar" type="text" name="title_ar" required placeholder="@lang('trans.title_ar')"
                    class="form-control" value="{{ $Category['title_ar'] }}">
            </div>
            <div class=" col-md-6">
                <label for="title_en">@lang('trans.title_en')</label>
                <input id="title_en" type="text" name="title_en" required placeholder="@lang('trans.title_en')"
                    class="form-control" value="{{ $Category['title_en'] }}">
            </div>
            <div class="col-md-6">
                <label for="is_parent">@lang('trans.is_parent')</label>
                <input class="form-check-input" type="checkbox" name="is_parent" id="is_parent" class="form-control" @if ($Category['is_parent']==1)
                checked
                @endif
                    value="{{ $Category['is_parent'] }}">
            </div>
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.image')</label>
                <label class="file-input btn btn-block btn-secondary btn-file w-100">
                    @lang('trans.Browse')
                    <input accept="image/*" type="file" type="file" name="image">
                </label>
            </div>
            <div class="col-md-6 {{$Category->is_parent==1?'d-none':''}}" id="parent_category_div" >
                <label for="categories">@lang('trans.categories')</label>
                <select class="form-control" id="categories" name="parent_id">
                    <option selected disabled value="">@lang('trans.category')</option>
                    @foreach ($MainCategories as $mainCat)
                        <option @if ($mainCat->id==$Category['parent_id'])
                            selected
                        @endif value="{{ $mainCat->id }}">{{ $mainCat->title() }}</option>
                    @endforeach
                </select>
            </div>
            <div class=" col-md-6">
                <label for="visibility">@lang('trans.visibility')</label>
                <select class="form-control" required id="visibility" name="status">
                    <option {{ $Category['status'] == 0 ? 'selected' : '' }} value="0">@lang('trans.hidden')</option>
                    <option {{ $Category['status'] == 1 ? 'selected' : '' }} value="1">@lang('trans.visible')</option>
                </select>
            </div>
            <div class="clearfix"></div>
            <div class="col-12 my-3">
                <div class="button-group">
                    <button type="submit" class="main-btn btn-hover w-100 text-center">
                        {{ __('trans.Submit') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            // $('#parent_category_div').hide();
            if($('#is_parent').val()==1){
                $('#parent_category_div').addClass('d-none');
            }else{
                $('#parent_category_div').removeClass('d-none');
            }
            
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