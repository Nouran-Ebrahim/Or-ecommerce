@extends('Admin.layout')
@section('pagetitle', $product->title() . '-->' . $color->title())

@section('content')
    <form method="POST" action="{{ url('admin/products/' . request()->route('id') . '/gallery/' . $id) }}"
        enctype="multipart/form-data" data-parsley-validate novalidate>
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-md-12">
                <label for="header" class="form-label">@lang('trans.header')</label>
                <input class="form-control" name="header" type="file">
                @error('header')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>
            @if ($header)
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="position-relative" style="width: fit-content;">

                        <img class="preview_image" src="{{ asset($header->header) }}" />

                    </div>
                </div>
            @endif

            <div class="form-group col-md-6">
                <label for="image">@lang('trans.images')</label>
                <label class="file-input btn btn-block btn-secondary btn-file w-100">
                    @lang('trans.Browse')
                    <input accept="image/*" multiple type="file" name="image[]" id="image">
                </label>
                @error('image')
                    <p class="alert alert-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="row d-flex justify-content-center my-2">
                @foreach (@$gallary as $item)
                    @if (@$item->image)
                        <div class="position-relative" style="width: fit-content;">
                            <input type="hidden" name="old_gallery[]" value="{{ @$item->image }}">
                            <img class="preview_image" style="max-width: 100px;" src="{{ @$item->image }}" />
                            <i data-path="{{ @$item->image }}" data-product_id="{{@$item->product_id}}"
                                class="position-absolute cursor-pointer fa-regular fa-circle-xmark text-danger"
                                style="right:0px"></i>
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
        </div>
    </form>
    @include('Admin.MultiSelect')
@endsection
@push('js')
    <script>
        $(document).on('change', 'input[type="file"]', function() {
            var Preview = $('#prev');
            Preview.empty();
            files = this.files;
            if (files && files.length > 0) {
                for (var i = 0; i < files.length; i++) {
                    file = files[i];
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        const fileType = file.type;
                        if (fileType.startsWith('image/')) {
                            var image = $("<img>").attr("src", e.target.result);
                            image.addClass("preview_image");
                            Preview.append(image);
                        } else if (fileType.startsWith('video/')) {
                            var video = $("<video>").attr("src", e.target.result);
                            video.addClass("preview_image");
                            Preview.append(video);
                        } else {
                            console.log('Unknown file type.');
                        }
                    };
                    reader.readAsDataURL(file);
                }
            }
        });

        $(document).on('click', '.fa-circle-xmark', function() {
            item = $(this);
            var path = $(this).data('path')
            var product_id = $(this).data('product_id')
            // alert(path);
            item.parent().remove();
            $.ajax({
                url: "{{ route('admin.deleteGalleryPhoto') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    image: path,
                    product_id:product_id
                },
                success: function(result) {
                    // alert(result)
                    //  location.reload();
                },
                error: function(error) {
                    console.log(error);
                }
            })
        });
    </script>
@endpush
