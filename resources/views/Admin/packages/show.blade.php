@extends('Admin.layout')
@section('pagetitle', __('trans.Packages'))
@section('content')

<table class="table">
    <tbody class="text-center">
        <tr>
            <td>{{ __('trans.title_ar') . ':' }}</td>
            <td>{{ $Package['title_ar'] }}</td>
        </tr>

        <tr>
            <td>{{ __('trans.title_en') . ':' }}</td>
            <td>{{ $Package['title_en'] }}</td>
        </tr>
        <tr>
            <td>{{ __('trans.price_ar') . ':' }}</td>
            <td>{{ $Package['price_ar'] }}</td>
        </tr>

        <tr>
            <td>{{ __('trans.price_en') . ':' }}</td>
            <td>{{ $Package['price_en'] }}</td>
        </tr>
        <tr>
            <td>{{ __('trans.status') . ':' }}</td>
            <td>{{ $Package['status'] ? __('trans.visible') : __('trans.hidden') }}</td>
        </tr>
    </tbody>
</table>
<h2>{{ trans('trans.description') }}</h2>
<table class="table">
    <thead>
        <tr>
            <th style="text-align:center;">@lang('trans.title_ar')</th>
            <th style="text-align:center;">@lang('trans.title_en')</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Package->descriptions as $desc)
        <tr>
            <th style="text-align:center;">{{ $desc['title_ar'] }}</th>
            <th style="text-align:center;">{{ $desc['title_en'] }}</th>
        </tr>
        @endforeach
    </tbody>
</table>

<h2>{{ trans('trans.features') }}</h2>
<table class="table" id="DataTable">
    <thead>
        <tr>
            <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th>
            <th>#</th>
            <th style="text-align:center;">@lang('trans.title_ar')</th>
            <th style="text-align:center;">@lang('trans.title_en')</th>
            <th style="text-align:center;">@lang('trans.image')</th>
            <th style="text-align:center;">@lang('trans.head')</th>
            <th style="text-align:center;">@lang('trans.type')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
@endsection


@push('js')
<script type="text/javascript">
    $(function() {
        var table = $('#DataTable').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ route('admin.features.index',['package_id'=> $Package->id ]) }}"
            , columns: [
                {
                    data: 'checkbox',
                    name: 'checkbox',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'title_ar'
                },
                {
                    data: 'title_en'
                },
                {
                    data: 'image'
                },
                {
                    data: 'header_id'
                },
                {
                    data: 'type'
                },
                {
                    data: 'action'
                }
            ]
        });

    });

</script>
@endpush
