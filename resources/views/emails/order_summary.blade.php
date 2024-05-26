<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>{{ env('APP_NAME') }} - Order Summary</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="telephone=no" name="format-detection">
    <meta content= "width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=no;" name="viewport">
    <style>
        .main-table td,
        .main-table th {
            text-align: center;
            padding: 5px;
            border-top: 1px solid #333;
            margin: 0 -1px;
        }

        .main-table tr {
            border: 1px solid #333;
        }
    </style>
</head>

<body style="margin:0; padding:10px 0 0 0;" bgcolor="#FFFFFF">
    <table align="center" cellpadding="0" cellspacing="0" width="95%%" style="padding:15px;">
        <tr>
            <td align="center">
                <table align="center" border="1" cellpadding="0" cellspacing="0" width="600px"
                    style="margin:15px; border: none;" bgcolor="#FFFFFF">
                    <tr>
                        <td align="center" style="padding:5px;">
                            <a href="https://tt.emcan-group.com" target="_blank">
                                <img src="{{ asset(setting('logo_dark')) }}" alt="Logo"
                                    style="width:50%;border:0;" />
                            </a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <table align="center" cellpadding="0" cellspacing="0" width="95%%" style="padding:15px;">
        <tr>
            <td align="center">
                <table align="center" border="1" cellpadding="0" cellspacing="0" width="600px"
                    style="margin:15px;padding:15px;border-collapse: separate; border-spacing: 5px 5px;border: 1px solid #DDB864;"
                    bgcolor="#FFFFFF">
                    <tr>
                        <td bgcolor="#ffffff"
                            style="padding: 30px 0;text-align: center;font-size: 24px;background: #f7efa7;">
                            New Order #{{ $order['id'] }}
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding:10px 0;">
                            <table>
                                <tr>
                                    You&#39;ve recived the following order from {{ env('APP_NAME') }}
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding:10px 0;">
                            <table>
                                <tr>
                                    Order #{{ $order['id'] }}
                                    <span style="color: #DDB864">( {{ $order['created_at'] }} )</span>
                                </tr>

                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding:10px 0;">
                            <table style="width: 100%;text-align: center;">
                                <tr>
                                    <th style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important" scope="col">
                                        Product</th>
                                    <th style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important" scope="col">
                                        Price</th>
                                    <th style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important" scope="col">
                                        Size</th>
                                    <th style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important" scope="col">
                                        Color</th>
                                </tr>

                                @foreach ($order->OrderProducts as $orderProduct)
                                    <tr>
                                        <td style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important"
                                            scope="col">{{ $orderProduct->Product['title_en'] }}</td>
                                        <td style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important"
                                            scope="col">
                                            {{ $orderProduct['total'] * Country()->currancy_value . ' ' . Country()->currancy_code }}
                                        </td>
                                        <td style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important"
                                            scope="col">{{ $orderProduct->Size?->title_en }}</td>
                                        <td style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important"
                                            scope="col">{{ $orderProduct->Color?->title_en }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important" scope="col">
                                        Sub Total :</th>
                                    <td style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important" colspan="4">
                                        {{ $order['coupon'] > 0 ? number_format($order['sub_total_after_coupon'] * Country()->currancy_value, Country()->decimals, ',', ' ') . ' ' . Country()->currancy_code : number_format($order['sub_total'] * Country()->currancy_value, Country()->decimals, ',', ' ') . ' ' . Country()->currancy_code }}
                                    </td>
                                </tr>
                                @if ($order['discount'] > 0)
                                    <tr>
                                        <th style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important"
                                            scope="col">Discount :</th>
                                        <td style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important"
                                            colspan="4">
                                            {{ number_format($order['discount'] * Country()->currancy_value, Country()->decimals, ',', ' ') . ' ' . Country()->currancy_code }}
                                        </td>
                                    </tr>
                                @endif
                                @if ($order['coupon'] > 0)
                                    <tr>
                                        <th style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important"
                                            scope="col">@lang('trans.Coupon') :</th>
                                        <td style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important"
                                            colspan="4">
                                            {{ number_format($order['coupon'] * Country()->currancy_value, Country()->decimals, ',', ' ') . ' ' . Country()->currancy_code }}
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <th style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important" scope="col">
                                        VAT :</th>
                                    <td style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important" colspan="4">
                                        {{ number_format($order['vat'] * Country()->currancy_value, Country()->decimals, ',', ' ') . ' ' . Country()->currancy_code }}
                                    </td>
                                </tr>
                                @if ($order['charge_cost'] > 0)
                                    <tr>
                                        <th style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important"
                                            scope="col">Shipping :</th>
                                        <td style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important"
                                            colspan="4">
                                            {{ number_format($order['charge_cost'] * Country()->currancy_value, Country()->decimals, ',', ' ') . ' ' . Country()->currancy_code }}
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <th style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important" scope="col">
                                        Payment Method :</th>
                                    <td style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important" colspan="4">
                                        {{ $order->PaymentMethod['title_en'] }}</td>
                                </tr>
                                <tr>
                                    <th style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important" scope="col">
                                        Net Total :</th>
                                    <td style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important" colspan="4">
                                        {{ number_format($order['net_total'] * Country()->currancy_value, Country()->decimals, ',', ' ') . ' ' . Country()->currancy_code }}
                                    </td>
                                </tr>
                                @if ($order->notes != null)
                                    <tr>
                                        <th style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important"
                                            scope="col">
                                            Note :</th>
                                        <td style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important"
                                            colspan="4">
                                            {{ $order->notes}}
                                        </td>
                                    </tr>
                                @endif

                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-size: 28px; color: #DDB864;font-weight: bold">
                            Client Information
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important">
                            <table>
                                <p>Name: {{ $order->client['first_name'] . ' ' . $order->client['last_name'] }}</p>
                                <p>Phone: {{ $order->client['phone'] }}</p>
                                <p>Email: {{ $order->client['email'] }}</p>
                            </table>
                        </td>
                    </tr>

                    @if ($order->address)
                        <tr>
                            <td style="font-size: 28px; color: #DDB864;font-weight: bold">
                                Billing Address
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#ffffff" style="padding: 0.5rem 0.5rem;border: #CCC 1px solid !important">
                                <table>

                                    @if ($order->delivery_id == 1)
                                        <p>Country: {{ $order->address->region->Country['title_en'] }}</p>
                                        <p>Region: {{ $order->address->region->title_en }}</p>
                                        <p>District: {{ $order->address->zone }}</p>
                                        <p>Road: {{ $order->address->road }}</p>
                                        <p>Building Number: {{ $order->address->building_no }}</p>

                                        @if ($order->address->flat != null)
                                            <p>Flat: {{ $order->address->flat }}</p>
                                        @endif
                                        @if ($order->address->floor_no != null)
                                            <p>Floor Number: {{ $order->address->floor_no }}</p>
                                        @endif
                                        @if ($order->address->note != null)
                                            <p>Note: {{ $order->address->note }}</p>
                                        @endif
                                    @else
                                        <p>Pick Up</p>

                                    @endif

                                    {{-- <p>Additional Directions: {!! $order->address->additional_directions !!}</p> --}}
                                </table>
                            </td>
                        </tr>
                    @endif

                    @if ($order['coupon'] > 0)
                        <tr>
                            <td>
                                Congratulations On The Sale
                            </td>
                        </tr>
                    @endif
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
