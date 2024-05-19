@extends('Admin.layout')
@section('pagetitle',  __('trans.'.$Settings->first()->type))
@section('content')

<form method="POST" action="{{ route('admin.settings.update',['setting' => 1, 'type' => $type]) }}" enctype="multipart/form-data" data-parsley-validate novalidate>
    @csrf
    @method('PUT')
    <div class="row">
        @foreach ($Settings as $Setting)
            @if (str_contains($Setting['key'], 'image') || $Setting['type'] == 'image' || in_array($Setting['key'], ['logo','watermark','logo_dark']))
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="{{ $Setting['key'] }}">@lang('trans.'.$Setting['key'])</label>
                        <input accept="image/*" type="file" name="{{ $Setting['key'] }}" id="{{ $Setting['key'] }}" class="form-control" data-buttonname="btn-primary" onchange="document.getElementById('image-{{ $Setting['key'] }}').src = window.URL.createObjectURL(this.files[0])">
                        <div class="text-center" style="height: 200px;">
                            <img id="image-{{ $Setting['key'] }}" src="{{ asset($Setting['value']) }}" class="d-block mx-auto" alt="image" style="height: 200px">
                        </div>
                    </div>
                </div>
            @elseif(in_array($Setting['key'], ['DefaultLang']))
                <div class="col-sm-12">
                    <div class="form-group col-md-12">
                        <label for="{{ $Setting['key'] }}">@lang('trans.' . $Setting['key'])</label>
                        <select id="{{ $Setting['key'] }}" name="{{ $Setting['key'] }}" required class="form-control">
                                <option {{ $Setting['value'] == 'en' ? 'selected' : '' }} value="en">En</option>
                                <option {{ $Setting['value'] == 'ar' ? 'selected' : '' }} value="ar">Ar</option>
                        </select>
                    </div>
                </div>
            @elseif(in_array($Setting['key'], ['Country']))
                <div class="col-sm-12">
                    <div class="form-group col-md-12">
                        <label for="{{ $Setting['key'] }}">@lang('trans.' . $Setting['key'])</label>
                        <select id="{{ $Setting['key'] }}" name="{{ $Setting['key'] }}" required class="form-control">
                            @foreach ($countries as $Currancy)
                                <option {{ $Setting['value'] == $Currancy->id ? 'selected' : '' }} value="{{ $Currancy->id }}">{{ $Currancy->title() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @elseif(in_array($Setting['key'], ['theme']))
                <div class="col-sm-12">
                    <div class="form-group col-md-12">
                        <label for="{{ $Setting['key'] }}">@lang('trans.chooseTheme')</label>
                        <select id="{{ $Setting['key'] }}" name="{{ $Setting['key'] }}" required class="form-control">
                            <option {{ $Setting['value'] == 1 ? 'selected' : '' }} value="1">{{ __('trans.theme') }} 1</option>
                            <option {{ $Setting['value'] == 2 ? 'selected' : '' }} value="2">{{ __('trans.theme') }} 2</option>
                        </select>
                    </div>
                </div>
            @elseif(in_array($Setting['key'], ['accept_order']))
                <div class="col-sm-12">
                    <div class="form-group col-md-12">
                        <label for="{{ $Setting['key'] }}">@lang('trans.' . $Setting['key'])</label>
                        <select id="{{ $Setting['key'] }}" name="{{ $Setting['key'] }}" required class="form-control">
                            <option {{ $Setting['value'] == 0 ? 'selected' : '' }} value="0">@lang('trans.no')</option>
                            <option {{ $Setting['value'] == 1 ? 'selected' : '' }} value="1">@lang('trans.yes')</option>
                        </select>
                    </div>
                </div>
            @elseif (str_contains($Setting['key'], '_services') || (str_contains($Setting['key'], 'ar') || str_contains($Setting['key'], 'en') || $Setting['type'] == 'meta') && !str_contains($Setting['key'], 'title_'))
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="{{ $Setting['key'] }}">@lang('trans.'.$Setting['key'])</label>
                        <textarea style="min-height: 300px" class="form-control @if(str_contains($Setting['key'], 'order')) mceNoEditor @endif" id="{{ $Setting['key'] }}" name="{{ $Setting['key'] }}" required placeholder="@lang('trans.' . $Setting['key'])">{!! $Setting['value'] !!}</textarea>
                    </div>
                </div>
            @elseif ($Setting['type'] == 'mainpage_products')
                @foreach ($products as $product)

                <div class="col-sm-12">
                    <div class="form-group">
                        <input id="{{ $product['id'] }}" type="checkbox" name="products[]" required value="{{ $product['id'] }}" @if (in_array($product['id'],array_filter(explode('"', setting('mainpage_products')), 'is_numeric' ))) checked @endif>
                        <label for="{{ $product['id'] }}">{{ $product->title() }}</label>
                    </div>
                </div>

                @endforeach
            @elseif(str_contains($Setting['key'], 'color'))
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="{{ $Setting['key'] }}">@lang('trans.'.$Setting['key'])</label>
                        <input id="{{ $Setting['key'] }}" type="color" name="{{ $Setting['key'] }}" required placeholder="@lang('trans.' . $Setting['key'])" class="form-control" value="{{ $Setting['value'] }}">
                    </div>
                </div>
            @else
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="{{ $Setting['key'] }}">@lang('trans.'.$Setting['key'])</label>
                        <input id="{{ $Setting['key'] }}" type="text" name="{{ $Setting['key'] }}" required placeholder="@lang('trans.' . $Setting['key'])" class="form-control" value="{{ $Setting['value'] }}">
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="clearfix"></div>
    <div class="col-12 my-4">
        <div class="button-group">
            <button type="submit" class="main-btn btn-hover w-100 text-center">
                {{ __('trans.Submit') }}
            </button>
        </div>
    </div>
</form>

@endsection

@push('js')
    <script>
        $(document).on('change', '#font', function(){
            $('#fontPreview').css('font-family', $(this).val());
        });
    </script>
@endpush
