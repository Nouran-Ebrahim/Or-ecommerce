@extends('Admin.layout')

@section('pagetitle',__('trans.Edit Product'))


@push('js')
    
    <script>
        $(document).on('change', '#discountDiscount', function() {
            if ($(this).val() === '1') {
                $('.discount').removeClass('hide');
            } else {
                $('.discount').addClass('hide');
                $('#discount').val('');
                $('#discount_from').val('');
                $('#discount_to').val('');
            }
        });
        $('input[type=radio][name=ImageStatus]').change(function() {
            let url = '{{ route('admin.ProductMainImage.switch',[$Product->id,':image_id']) }}';
            url = url.replace(':image_id', this.value);
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                },
                success: function () {
                    swal("@lang('trans.updatedSuccessfully')", "", "success");
                }
            });
        });

    </script>
@endpush


@section('content')
    <form method="POST" action="{{ route('admin.products.update',$Product) }}" enctype="multipart/form-data" data-parsley-validate>
        @csrf
        @method('PUT')
        <div class="row">
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.title_ar')</label>
                <input type="text" name="title_ar" value="{{ $Product->title_ar }}" required placeholder="@lang('trans.title_ar')" class="form-control">
            </div>
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.title_en')</label>
                <input type="text" name="title_en" value="{{ $Product->title_en }}" required placeholder="@lang('trans.title_en')" class="form-control">
            </div>
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.desc_ar')</label>
                <textarea name="desc_ar" placeholder="@lang('trans.desc_ar')" class="form-control">{{ $Product->desc_ar }}</textarea>
            </div>
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.desc_en')</label>
                <textarea name="desc_en" placeholder="@lang('trans.desc_en')" class="form-control">{{ $Product->desc_en }}</textarea>
            </div>

            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.Categories')</label>
                <select name="categories[]" required class="form-control selectpicker w-100" data-live-search="true" multiple>
                    @foreach($finalArray as  $category=>$value)
                        <option {{ $Product->Categories->contains($category) ? 'selected' : '' }} value="{{ $category }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.sizes')</label>
                <select name="sizes[]" required class="form-control selectpicker w-100" data-live-search="true" multiple>
                    @foreach($Sizes as $Size)
                        <option {{ $Product->Sizes->contains($Size->id) ? 'selected' : '' }} value="{{ $Size['id'] }}">{{ $Size->title() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.colors')</label>
                <select name="colors[]" required class="form-control selectpicker w-100" data-live-search="true" multiple>
                    @foreach($Colors as $Color)
                        <option {{ $Product->Colors->contains($Color->id) ? 'selected' : '' }} value="{{ $Color['id'] }}">{{ $Color->title() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.material_ar')</label>
                <textarea name="material_ar" placeholder="@lang('trans.material_ar')" class="form-control  mceNoEditor">{{ $Product->material_ar }}</textarea>
            </div>
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.material_en')</label>
                <textarea name="material_en" placeholder="@lang('trans.material_en')" class="form-control  mceNoEditor">{{ $Product->material_en }}</textarea>
            </div>
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.code')</label>
                <input type="text" name="code" value="{{ $Product->code }}" placeholder="@lang('trans.code')" class="form-control">
            </div>

                       
            <div class="col-12 col-md-6">
                <label class="my-1">@lang('trans.price')</label>
                <input value="{{ $Product->price }}" id="price" type="number" step="any" name="price" placeholder="@lang('trans.price')" class="form-control">
            </div> 
            
            <div class="col-12 col-md-6">
                <label class="my-1">
                    <span>@lang('trans.isThereDiscount')</span>
                </label>
                <select id="discountDiscount" name="have_discount" required class="form-control">
                    <option {{  $Product->discount > 0 ? 'selected' : '' }} value="1">@lang('trans.yes')</option>
                    <option {{  $Product->discount > 0 ? '' : 'selected' }} value="0">@lang('trans.no')</option>
                </select>
            </div>
            <div class="col-12 col-md-6 discount {{  $Product->discount <= 0 ? 'hide' : '' }}">
                <label class="my-1">@lang('trans.discount_from')</label>
                <input value="{{ $Product->from }}" id="discount_from" type="date" name="from" placeholder="@lang('trans.discount_from')" class="form-control">
            </div>
            <div class="col-12 col-md-6 discount {{  $Product->discount <= 0 ? 'hide' : '' }}">
                <label class="my-1">@lang('trans.discount_to')</label>
                <input value="{{ $Product->to }}" id="discount_to" type="date" name="to" placeholder="@lang('trans.discount_to')" class="form-control">
            </div>
            <div class="col-12 col-md-6 discount {{  $Product->discount <= 0 ? 'hide' : '' }}">
                <label class="my-1">@lang('trans.discount') <span class="h4">%</span></label>
                <input value="{{ $Product->discount }}" id="discount" type="number" step="any" name="discount" placeholder="@lang('trans.discount')" class="form-control">
            </div>
            {{-- <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.VAT')</label>
                <select class="form-control " required name="VAT">
                    <option hidden selected disabled>@lang('trans.Select')</option>
                    <option {{ $Product->VAT ==  'exclusive' ? 'selected' : '' }} value="exclusive">@lang('trans.exclusive')</option>
                    <option {{ $Product->VAT ==  'inclusive' ? 'selected' : '' }} value="inclusive">@lang('trans.inclusive')</option>
                </select>
            </div> --}}
    
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.visibility')</label>
                <select class="form-control " required name="status">
                    <option {{ $Product->status ==  '0' ? 'selected' : '' }} value="0">@lang('trans.hidden')</option>
                    <option {{ $Product->status ==  '1' ? 'selected' : '' }} value="1">@lang('trans.visible')</option>
                </select>
            </div>
            
            <div class="form-group my-1 col-md-6 col-sm-12">
                <label class="my-1">@lang('trans.images')</label>
                <label class="file-input btn btn-block btn-secondary btn-file w-100">
                    <input accept="image/*" type="file" type="file" name="images[]" multiple>
                    @lang("trans.Browse")
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



    @if (count($Product->images) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th style="text-align:center;">@lang('trans.main_image')</th>
                    <th style="text-align:center;">@lang('trans.images')</th>
                    @if($Product->images->whereNotNull('color_id')->count())
                        <th style="text-align:center;">@lang('trans.color')</th>
                    @endif
                    <th></th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($Product->images as $key => $image)
                        <tr class="gradeX {{ $image['id'] }}">
                            <td style="text-align:center;">{{ $key + 1 }}</td>
                            <td style="text-align:center;"><input id="ImageStatus{{ $image['id'] }}" class="form-check-input" {{ $image->main ? 'checked' : '' }} type="radio" name="ImageStatus"  value="{{ $image['id'] }}"></td>
                            @if($Product->images->whereNotNull('color_id')->count())
                                <td style="text-align:center;">
                                    {{ $image->color?->title() }}
                                </td>
                            @endif
                            <td style="text-align:center;">
                                <label  for="ImageStatus{{ $image['id'] }}"><img src="{{ $image['image'] }}" alt="{{ $Product['title_en'] }}" width="150"></label>
                            </td>
                            <td class="actions">
                                <a onclick="DeleteSelected('product_images',{{ $image['id'] }})">
                                    <i class="fa-solid fa-trash-can cursor-pointer"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>
    @endif

    @include('Admin.MultiSelect')
@endsection
