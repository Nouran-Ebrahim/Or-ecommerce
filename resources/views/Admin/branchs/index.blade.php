@extends('Admin.layout')
@section('pagetitle', __('trans.branches'))
@section('content')

<div class="row">
    <div class="my-2 col-6 text-sm-start">
        <a href="{{ route('admin.branches.create') }}" class="main-btn" disabled>@lang('trans.add_new')</a>
    </div>
    <div class="my-2 col-6 text-sm-end">
        <button type="button" id="DeleteSelected" onclick="DeleteSelected('branches')" class="btn btn-dark" disabled>@lang('trans.Delete_Selected')</button>
    </div>
</div>
<table class="table"  id="DataTable">
    <thead>
        <tr>
            <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th>
            <th>#</th>
            <th style="text-align:center;">@lang('trans.address_ar')</th>
            <th style="text-align:center;">@lang('trans.address_en')</th>
            {{-- <th style="text-align:center;">@lang('trans.country')</th> --}}
            {{-- <th style="text-align:center;">@lang('trans.title_ar')</th>
            <th style="text-align:center;">@lang('trans.title_en')</th>
            <th style="text-align:center;">@lang('trans.Delivery')</th>
            <th style="text-align:center;">@lang('trans.Pickup')</th>
            <th style="text-align:center;">@lang('trans.dinein')</th> --}}
            <th style="text-align:center;">@lang('trans.visibility')</th>
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
                , oLanguage: {
                    sUrl: '{{ DT_Lang() }}'
                }
                , ajax: "{{ route('admin.branches.index') }}"
                , dom: 'Blfrtip'
                , buttons: [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            stripHtml : false,
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ]
                , lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                columns: [
                    {
                        data: 'checkbox',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'address_ar',
                    },
                    {
                        data: 'address_en',
                    },
                    // {
                    //     data: 'country_id',
                    // },
                    // {
                    //     data: 'title_ar',
                    // },
                    // {
                    //     data: 'title_en',
                    // },
                    // {
                    //     data: 'delivery',
                    // },
                    // {
                    //     data: 'pickup',
                    // },
                    // {
                    //     data: 'dinein',
                    // },
                    {
                        data: 'status',
                    },
                    {
                        data: 'action',
                    },
                ]
            });

        });


    </script>
@endpush
