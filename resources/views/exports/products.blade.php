<table>
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
        @foreach ($products as $item)
            <tr class="gradeX {{ $item['id'] }}">
                <td style="text-align:center;">{{ $item['title_' . app()->getlocale()] }}</td>
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
    </tbody>
</table>
