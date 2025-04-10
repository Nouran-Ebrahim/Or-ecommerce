@extends('Admin.layout')
@section('content')

    <div class="wrapper">
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">

                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="page-title">@lang('trans.reports')</h4>
                            <ol class="breadcrumb">
                                <li><a href="">@lang('trans.reports')</a></li>
                                <li class="active">@lang('trans.products')</li>
                            </ol>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-body">
                            <form class="row">
                                <div class="col-md-3 form-group">
                                    <label for="sort">@lang('trans.sort')</label>
                                    <select name="sort" id="sort" class="form-control">
                                        <option value="">@lang('trans.Select')</option>
                                        <option {{ request('sort')=="price_desc"?'selected':''}} value="price_desc" data-key="price">@lang('trans.price_desc')</option>
                                        <option  {{ request('sort')=="price_asc"?'selected':''}} value="price_asc" data-key="price">@lang('trans.price_asc')</option>
                                    </select>
                                </div>
                                <div class="col-md-3 form-group" style="padding-top: 26px">
                                    <button class="main-btn">@lang('trans.search')</button>
                                </div>
                            </form>
                            @if (count($products) > 0)
                                <form class="row" action="{{ route('admin.exportData') }}" method="GET">
                                    @csrf
                                    <div class="col-md-3 form-group" style="padding-top: 26px">
                                        <button class="btn btn-dark">@lang('trans.exportExcel')</button>
                                    </div>
                                </form>
                            @endif
                            <h3 class="m-b-10 m-t-40">@lang('trans.products')</h3>
                            <div class="table-responsive">
                                <table class="table table-striped" id="custom_tbl_dt">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">@lang('trans.product')</th>
                                            <th style="text-align:center;">@lang('trans.price')</th>
                                            <th style="text-align:center;">@lang('trans.Price After Discount')</th>
                                            <th style="text-align:center;">@lang('trans.STOCK STATUS')</th>
                                            {{-- <th style="text-align:center;">@lang('trans.count')</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($products) > 0)
                                            @foreach ($products as $key => $item)
                                                <tr class="gradeX {{ $item['id'] }}">
                                                    <td style="text-align:center;"><a
                                                            href="{{ route('admin.products.edit', $item['id']) }}">{{ $item['title_' . app()->getlocale()] }}</a>
                                                    </td>
                                                    <td style="text-align:center;">{{ $item['price'] }}</td>
                                                    @if ($item['price_after_discount'] > 0)
                                                        <td style="text-align:center;">{{ $item['price_after_discount'] }}
                                                        </td>
                                                    @else
                                                        <td style="text-align:center;">@lang('trans.No Discount')
                                                        </td>
                                                    @endif
                                                    <td style="text-align:center;">{{$item->in_stock==1?__('trans.in_stock'):__('trans.outStock')}}
                                                    </td>
                                                    {{-- <td style="text-align:center;">{{ $item['count'] }}</td> --}}
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="9" style="text-align: center!important;">@lang('trans.noElements')
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
