@extends('Admin.layout')
@section('pagetitle', __('trans.Countries'))
@section('content')


<table class="table"  id="DataTable">
    <thead>
        <tr>
            <th>#</th>
            <th style="text-align:center;">@lang('trans.title_ar')</th>
            <th style="text-align:center;">@lang('trans.title_en')</th>
            <th style="text-align:center;">@lang('trans.country_code')</th>
            <th style="text-align:center;">@lang('trans.phone_code')</th>
            <th style="text-align:center;">@lang('trans.currancy_code')</th>
            <th style="text-align:center;">@lang('trans.currancy_value')</th>
            <th style="text-align:center;">@lang('trans.image')</th>
            <th style="text-align:center;">@lang('trans.visibility')</th>
            <th style="text-align:center;">@lang('trans.regions')</th>
            <th style="text-align:center;"></th>
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
                processing: true,
                searching: false,
                serverSide: true,
                oLanguage: {
                    sUrl: '{{ DT_Lang() }}'
                },
                ajax: "{{ route('admin.countries.index') }}",
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
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
                        extend: 'pdf',
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
                , columns: [
                    {
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title_ar',
                        name: 'title_ar'
                    },
                    {
                        data: 'title_en',
                        name: 'title_en'
                    },
                    {
                        data: 'country_code',
                        name: 'country_code'
                    },
                    {
                        data: 'phone_code',
                        name: 'phone_code'
                    },
                    {
                        data: 'currancy_code',
                        name: 'currancy_code'
                    },
                    {
                        data: 'currancy_value',
                        name: 'currancy_value'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'regions',
                        name: 'regions'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ]
            });

        });


    </script>
@endpush
