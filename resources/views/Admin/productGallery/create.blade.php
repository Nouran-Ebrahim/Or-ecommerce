@extends('Admin.layout')
@section('pagetitle', __('trans.gallery'))
@section('content')
    <form method="POST" action="{{ url('admin/products/' . request()->route('id') . '/gallery') }}"
        enctype="multipart/form-data" data-parsley-validate novalidate>
        @csrf
        <div class="row">
           
                <div class="form-group col-md-6">
                    <label for="file">@lang('trans.color')</label>
                    <select name="color_id" class="form-control   w-100" data-live-search="true">
                        @foreach ($product->Colors as $color)
                            <option value="{{ $color['id'] }}">{{ $color->title() }}</option>
                        @endforeach
                    </select>
                </div>
            

            <div class="form-group col-md-6">
                <label for="file">@lang('trans.image')</label>
                <label for="file" class="file-input btn btn-block btn-secondary btn-file w-100">
                    @lang('trans.Browse')
                    <input required accept="image/*" type="file" type="file" name="image" id="file">
                </label>
                @error('image')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
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

    @include('Admin.MultiSelect')
@endsection
