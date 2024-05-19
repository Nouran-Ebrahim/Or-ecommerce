@extends('Admin.layout')
@section('pagetitle', str_contains(request()->method, 'order') ? __('trans.' . request()->method) : __('trans.' .
    request()->method . 'Orders'))
@section('content')

    <form>
        <div class="row">
            <div class="form-group col-md-4">
                <label>@lang('trans.orderNo')</label>
                <input type="text" name="id" class="form-control" value="{{ $_GET['id'] ?? '' }}">
            </div>
            <div class="form-group col-md-4">
                <label>@lang('trans.client')</label>
                <input type="text" name="client" class="form-control" value="{{ $_GET['client'] ?? '' }}">
            </div>
            <div class="form-group col-md-4">
                <label>@lang('trans.phone')</label>
                <input type="text" name="phone" class="form-control" value="{{ $_GET['phone'] ?? '' }}">
            </div>
            <div class="form-group col-md-12 text-center my-2">
                <button class="main-btn">@lang('trans.search')</button>
            </div>
        </div>
    </form>
    @if (str_contains(url()->full(), 'new'))
        <div class="row">
            <style>
                .autoRef {
                    display: block;
                    float: left;
                    margin-bottom: 30px;
                }

                .autoRef #time {
                    display: block;
                    float: left;
                    color: #FFFFFF;
                    font-size: 40px;
                    width: 100px;
                    height: 80px;
                    border: 1px solid #FFFFFF;
                    border-radius: 3px;
                    line-height: 60px;
                    padding: 10px;
                    background-color: orange;
                    text-align: center;
                }

                .autoRef #text {
                    display: block;
                    float: left;
                    margin-left: 10px;
                    padding: 5px;
                    text-align: center;
                    font-size: 30px;
                    width: 100px;
                    height: 80px;
                    color: #000;
                    border-radius: 3px;
                    border: 1px solid #eee;
                    background-color: #FFFFFF;
                    line-height: 60px;
                }
            </style>
            <div class="form-group col-md-12">
                <div class="autoRef">
                    <div id="time"></div>
                    <a id="text" style="cursor: pointer;" onClick="window.location.reload();">تحديث</a>
                </div>
            </div>
        </div>
    @endif


    <table class="dataTable table table-striped text-center">
        <thead>
            <tr>
                <th></th>
                <th>@lang('trans.orderNo')</th>
                <th style="text-align:center;">@lang('trans.client')</th>
                <th style="text-align:center;">@lang('trans.phone')</th>
                <th style="text-align:center;">@lang('trans.details')</th>
                <th style="text-align:center;">@lang('trans.status')</th>
                <th style="text-align:center;">@lang('trans.netTotal')</th>
                <th style="text-align:center;">@lang('trans.paymentMethod')</th>
                <th style="text-align:center;">@lang('trans.Delivery Information')</th>
                <th style="text-align:center;">@lang('trans.time')</th>
            </tr>
        </thead>
        <tbody>
            @if (count($Orders) > 0)
                @foreach ($Orders as $Order)
                    <tr class="gradeX {{ $Order['id'] }}">
                        <td style="text-align:center;">
                            <img src="{{ asset($Countries->when($Order->client?->country_code, function ($query) use ($Order) {return $query->where('country_code', $Order->client?->country_code);})->first()?->image) }}"
                                style="width:50px">
                        </td>
                        <td style="text-align:center;">{{ $Order['id'] }}</td>
                        <td style="text-align:center;">{{  $Order->client->first_name.' '.$Order->client->last_name }}</td>
                        <td style="text-align:center;">
                            {{ $Order->client ? $Order->client?->phone_code . $Order->client?->phone : '' }}</td>
                        <td style="text-align:center;">
                            <button type="button" class="main-btn" data-bs-toggle="modal"
                                data-bs-target="#order-{{ $Order['id'] }}">@lang('trans.orderDetails')</button>
                        </td>
                        <td style="text-align:center;">
                            @if ($Order['status'] == 0 && $Order['follow'] == 0)
                                <select class="select form-control">
                                    <option></option>
                                    <option data-status="1" data-follow="1" data-id="{{ $Order['id'] }}">
                                        {{ __('trans.accept_order') }}</option>
                                    <option data-status="2" data-follow="0" data-id="{{ $Order['id'] }}">
                                        {{ __('trans.decline') }}</option>
                                </select>
                            @elseif ($Order['status'] == 1)
                                @if ($Order['follow'] == 1)
                                    @if ($Order->delivery_id == 1)
                                        <select class="select form-control">
                                            <option></option>
                                            <option data-status="1" data-follow="2" data-id="{{ $Order['id'] }}">
                                                {{ __('trans.order_onway') }}</option>
                                            <option data-status="1" data-follow="3" data-id="{{ $Order['id'] }}">
                                                {{ __('trans.order_delivered') }}</option>
                                        </select>
                                    @elseif($Order->delivery_id > 1)
                                        <select class="select form-control">
                                            <option></option>
                                            <option data-status="1" data-follow="2" data-id="{{ $Order['id'] }}">
                                                {{ __('trans.order_ready') }}</option>
                                            <option data-status="1" data-follow="3" data-id="{{ $Order['id'] }}">
                                                {{ __('trans.order_delivered') }}</option>
                                        </select>
                                    @endif
                                @elseif($Order['follow'] == 2)
                                    <select class="select form-control">
                                        @if ($Order->delivery_id == 1)
                                            <option disabled hidden selected>{{ __('trans.order_onway') }}</option>
                                        @elseif($Order->delivery_id > 1)
                                            <option disabled hidden selected>{{ __('trans.order_ready') }}</option>
                                        @endif
                                        <option data-status="1" data-follow="3" data-id="{{ $Order['id'] }}">
                                            {{ __('trans.order_delivered') }}</option>
                                    </select>
                                @elseif($Order['follow'] == 3)
                                    {{ __('trans.order_delivered') }}
                                @endif
                            @elseif ($Order['status'] == 2)
                                <select class="select form-control">
                                    <option selected hidden disabled>{{ __('trans.decline') }}</option>
                                    <option data-status="0" data-follow="0" data-id="{{ $Order['id'] }}">
                                        {{ __('trans.back') }}</option>
                                </select>
                            @elseif ($Order['status'] > 2)
                                <p>
                                    {{ __('trans.not_complete') }}
                                </p>
                            @endif
                        </td>
                        <td>{{ $Order['net_total'] . ' ' . Country()->currancy_code }}</td>
                        <td>{{ $Order->PaymentMethod ? $Order->PaymentMethod->title() : '' }}</td>
                        <td>{{ $Order->DeliveryMethod ? $Order->DeliveryMethod->title() : '' }}</td>
                        <td>{{ $Order['created_at'] }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="10" style="text-align: center!important;">@lang('trans.noElements')</td>
                </tr>
            @endif
        </tbody>
    </table>
    @if ($Orders->hasPages())
        <div class="pagination-wrapper">
            {{ $Orders->links('pagination::bootstrap-5') }}
        </div>
    @endif
    @foreach ($Orders as $Order)
        <div class="modal fade" id="order-{{ $Order['id'] }}" tabindex="-1"
            aria-labelledby="order-{{ $Order['id'] }}Label" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="order-{{ $Order['id'] }}Label">@lang('trans.orderDetails')</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                            style="display:contents">
                            <span aria-hidden="true">
                                &times;
                            </span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-striped table-hover text-center">
                            <tbody>
                                <tr>
                                    <td colspan="6">
                                        <h4>{{ __('trans.client') }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="3">{{ __('trans.name') }}</th>
                                    <td colspan="3">{{  $Order->client->first_name.' '.$Order->client->last_name }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3">{{ __('trans.email') }}</th>
                                    <td colspan="3">{{ $Order->Client ? $Order->client?->email : '' }}</td>
                                </tr>
                                <tr>
                                    <th colspan="3">{{ __('trans.phone') }}</th>
                                    <td colspan="3">
                                        {{ $Order->Client ? $Order->client?->phone_code . $Order->client?->phone : '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6">
                                        <h4>{{ __('trans.Payment') }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="3">{{ __('trans.sub_total') }}</th>
                                    <td colspan="3">
                                        {{ number_format(Country()->currancy_value * $Order->sub_total, Country()->decimals, '.', '') . ' ' . Country()->currancy_code }}
                                    </td>
                                </tr>
                                @if ($Order->charge_cost > 0)
                                    <tr>
                                        <th colspan="3">{{ __('trans.charge_cost') }}</th>
                                        <td colspan="3">
                                            {{ number_format(Country()->currancy_value * $Order->charge_cost, Country()->decimals, '.', '') . ' ' . Country()->currancy_code }}
                                        </td>
                                    </tr>
                                @endif
                                @if ($Order->discount > 0)
                                    <tr>
                                        <th colspan="3">{{ __('trans.discount') }}</th>
                                        <td colspan="3">{{ $Order->discount . ' ' . Country()->currancy_code }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <th colspan="3">{{ __('trans.vat') }}</th>
                                    <td colspan="3">
                                        {{ number_format(Country()->currancy_value * $Order->vat, Country()->decimals, '.', '') . ' ' . Country()->currancy_code }}
                                    </td>
                                </tr>
                                @if ($Order->coupon > 0)
                                    <tr>
                                        <th colspan="3">{{ __('trans.coupon') }}</th>
                                        <td colspan="3">{{ number_format(Country()->currancy_value * $Order->coupon, Country()->decimals, '.', '') . ' ' . Country()->currancy_code }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">{{ __('trans.Sub Total after coupon') }}</th>
                                        <td colspan="3">{{ number_format(Country()->currancy_value * $Order->sub_total_after_coupon, Country()->decimals, '.', '') . ' ' . Country()->currancy_code }}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <th colspan="3">{{ __('trans.net_total') }}</th>
                                    <td colspan="3">
                                        {{ number_format(Country()->currancy_value * $Order->net_total, Country()->decimals, '.', '') . ' ' . Country()->currancy_code }}
                                    </td>
                                </tr>
                                @if ($Order->address)
                                    <tr>
                                        <td colspan="6">
                                            <h4>{{ __('trans.address') }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">{{ __('trans.country') }}</th>
                                        <td colspan="3">{{ $Order->address->country->title() }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">{{ __('trans.region') }}</th>
                                        <td colspan="3">{{ $Order->address->region->title() }}</td>
                                    </tr>
                                    @if ($Order->address->flat != null)
                                        <tr>
                                            <th colspan="3">{{ __('trans.flat') }}</th>
                                            <td colspan="3">{{ $Order->address->flat }}</td>
                                        </tr>
                                    @endif
                                    @if ($Order->address->floor_no != null)
                                        <tr>
                                            <th colspan="3">{{ __('trans.floor_no') }}</th>
                                            <td colspan="3">{{ $Order->address->floor_no }}</td>
                                        </tr>
                                    @endif
                                    @if ($Order->address->note != null)
                                        <tr>
                                            <th colspan="3">{{ __('trans.note') }}</th>
                                            <td colspan="3">{{ $Order->address->note }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th colspan="3">{{ __('trans.district') }}</th>
                                        <td colspan="3">{{ $Order->address->zone }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">{{ __('trans.road') }}</th>
                                        <td colspan="3">{{ $Order->address->road }}</td>
                                    </tr>
                                    <tr>
                                        <th colspan="3">{{ __('trans.building_no') }}</th>
                                        <td colspan="3">{{ $Order->address->building_no }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        <h4 class="text-center">{{ __('trans.products') }}</h4>
                        <table class="table table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th>{{ __('trans.title') }}</th>
                                    @if ($Order->OrderProducts->sum('size_id') > 0)
                                        <th>{{ __('trans.size') }}</th>
                                    @endif
                                    @if ($Order->OrderProducts->sum('color_id') > 0)
                                        <th>{{ __('trans.color') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Order->OrderProducts as $item)
                                    <tr>
                                        <td>{{ $item->product?->title() }}</td>
                                        @if ($Order->OrderProducts->sum('size_id') > 0)
                                            <td>{{ $item->Size?->title() }}</td>
                                        @endif
                                        @if ($Order->OrderProducts->sum('color_id') > 0)
                                            <td>{{ $item->Color?->title() }}</td>
                                        @endif
                                    </tr>
                                    @if ($item->note)
                                        <tr>
                                            <td colspan="4">{{ $item->note }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">@lang('trans.close')</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach



@endsection


@push('js')
    <script type="text/javascript">
        $(document).on('change', '.select', function() {
            $.ajax({
                url: "{{ route('admin.orders.status') }}",
                type: "GET",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: $(this).find(':selected').attr('data-id'),
                    status: $(this).find(':selected').attr('data-status'),
                    follow: $(this).find(':selected').attr('data-follow'),
                    method: '{{ $method }}',
                },
                success: function(response) {
                    location.reload(true);
                }
            });
        });

        @if (str_contains(url()->full(), 'new'))
            var time = 60
            setInterval(function() {
                time--;
                if (time <= 0)
                    time = 60;
                $('#time').html(time);
            }, 1000);
        @endif
    </script>
@endpush
