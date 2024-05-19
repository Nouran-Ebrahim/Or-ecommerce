@extends('Admin.layout')
@section('pagetitle',__('trans.coupons'))
@section('content')
<form method="POST" action="{{ route('admin.coupons.store') }}" enctype="multipart/form-data" data-parsley-validate novalidate>
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="code">@lang('trans.code')</label>
            <input id="code" type="text" name="code" required placeholder="@lang('trans.code')" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="type">@lang('trans.type')</label>
            <select id="type" name="type" class="form-control">
                <option selected disabled hidden value="">---</option>
                <option id="show_discount" value="discount">@lang('trans.fixedprice')</option>
                <option id="show_percent_off" value="percent_off">@lang('trans.Discount Percentage')
                </option>
            </select>
        </div>

        <div id="discount" class="col-md-6 d-none">
            <label for="discount">@lang('trans.discount')</label>
            <input type="number" name="discount" placeholder="@lang('trans.discount')" class="form-control" disabled>
        </div>
        <div id="percent_off" class="col-md-6 d-none">
            <label for="percent_off">@lang('trans.Discount Percentage')</label>
            <input type="number" name="percent_off" placeholder="@lang('trans.Discount Percentage')" class="form-control" disabled>
        </div>
        <div class="col-md-6">
            <label for="from">@lang('trans.from')</label>
            <input id="from" type="date" name="from" required placeholder="@lang('trans.from')" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="to">@lang('trans.to')</label>
            <input id="to" type="date" name="to" required placeholder="@lang('trans.to')" class="form-control">
        </div>

        <div class="form-group col-md-6">
            <label for="visibility">@lang('trans.visibility')</label>
            <select class="form-control" required id="visibility" name="status">
                <option selected value="1">@lang('trans.visible')</option>
                <option value="0">@lang('trans.hidden')</option>
            </select>
        </div>
        {{-- <div class="col-md-6">
            <label for="coupon_id">@lang('trans.same_as')</label>
            <select id="coupon_id" name="coupon_id" class="form-control">
                <option selected  value="">---</option>
                <option value="0">@lang('trans.all')</option>
                @foreach($Coupons as $Coupon)
                    <option value="{{ $Coupon->id }}">{{ $Coupon->code }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12 my-4">
            @foreach($products as $product)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $product->id }}" name="products_ids[]" id="product-{{ $product->id }}">
                    <label class="form-check-label" for="products">
                        {{ $product->title() }}
                    </label>
                </div>
            @endforeach
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

@push('js')
<script>
    $("#type").change(function() {
        if ($(this).val() == 'percent_off') {
            $('#percent_off').removeClass('d-none');
            $('#percent_off input').prop('disabled', false);
        } else {
            $('#percent_off').addClass('d-none');
            $('#percent_off input').prop('disabled', true);
        }
        if ($(this).val() == 'discount') {
            $('#discount').removeClass('d-none');
            $('#discount input').prop('disabled', false);
        } else {
            $('#discount').addClass('d-none');
            $('#discount input').prop('disabled', true);
        }
    });
    $(document).on("change", "#coupon_id", function () {
        $('input:checkbox').prop('checked', false);
        $.ajax({
            type:'POST',
            url:'/admin/coupon_products/'+$('#coupon_id option:selected').val(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
            },
            success:function(data){
                $(data).each(function( index , product_id ) {
                    $('#product-'+product_id).prop( "checked", true );
                });
            },
            error: function (xhr, exception) {
                var msg = "";
                if (xhr.status === 0) {
                    msg = "Not connect.\n Verify Network." + xhr.responseText;
                } else if (xhr.status == 404) {
                    msg = "Requested page not found. [404]" + xhr.responseText;
                } else if (xhr.status == 500) {
                    msg = "Internal Server Error [500]." +  xhr.responseText;
                } else if (exception === "parsererror") {
                    msg = "Requested JSON parse failed.";
                } else if (exception === "timeout") {
                    msg = "Time out error." + xhr.responseText;
                } else if (exception === "abort") {
                    msg = "Ajax request aborted.";
                } else {
                    msg = "Error:" + xhr.status + " " + xhr.responseText;
                }
               console.log(msg);
            }
        });
    });
</script>
@endpush
