@extends('Admin.layout')
@section('pagetitle', __('trans.sliders'))
@section('content')
<form method="POST" action="{{ route('admin.sliders.store') }}" enctype="multipart/form-data" data-parsley-validate novalidate>
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
            <textarea type="text" name="desc_ar" id="desc_ar" class="form-control mceNoEditor" required></textarea>
        </div>
        <div class="form-group col-md-6">
            <label for="desc_en">@lang('trans.desc_en')</label>
            <textarea type="text" name="desc_en" id="desc_en" class="form-control mceNoEditor" required></textarea>
        </div>

        <div class="form-group col-md-6">
            <label for="visibility">@lang('trans.visibility')</label>
            <select class="form-control" required id="visibility" name="status">
                <option disabled hidden selected>@lang('trans.Select')</option>
                <option selected value="1">@lang('trans.visible')</option>
                <option value="0">@lang('trans.hidden')</option>
            </select>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="imageRadio" value="image" checked>
            <label class="form-check-label" for="imageRadio">
                @lang('trans.image')
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="type" id="videoRadio" value="vedio">
            <label class="form-check-label" for="videoRadio">
                @lang('trans.video')
            </label>
          </div>
        <div id="imageInput" class="form-group col-md-6">
            <label for="file">@lang('trans.image')</label>
            <label for="file" class="file-input btn btn-block btn-secondary btn-file w-100">
                @lang("trans.Browse")
                <input accept="image/*" type="file"  name="image" id="file">
            </label>
        </div>
        <div id="videoInput" class="form-group col-md-6" style="display: none;">
            <label for="vedio">@lang('trans.video')</label>
            <label for="vedio" class="file-input btn btn-block btn-secondary btn-file w-100">
                @lang("trans.Browse")
                <input accept="video/*" type="file"  name="vedio" id="vedio">
            </label>
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
@push('js')
<script>
    $(document).ready(function() {
      // Initially, show image input and hide video input
      $("#imageInput").show();
      $("#videoInput").hide();
    
      // Handle change event on radio buttons
      $("input[name='type']").change(function() {
        if ($(this).val() === "image") {
          $("#imageInput").show();
          $("#videoInput").hide();
        } else if ($(this).val() === "vedio") {
          $("#imageInput").hide();
          $("#videoInput").show();
        }
      });
    });
    </script>
@endpush