@extends('Admin.layout')
@section('pagetitle', __('trans.vacancy'))
@section('content')


    <div class="row">
        <div class="my-2 col-6 text-sm-start">
            <a href="{{ route('admin.vacancy.create') }}" class="main-btn" disabled>@lang('trans.add_new')</a>
        </div>
        <div class="my-2 col-6 text-sm-end">
            <button type="button" id="DeleteSelected" onclick="DeleteSelected('vacancies')" class="btn btn-dark"
                disabled>@lang('trans.Delete_Selected')</button>
        </div>
    </div>

    <table class="table" id="DataTable">
        <thead>
            <tr>
                <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th>
                <th>#</th>
                <th style="text-align:center;">@lang('trans.title_ar')</th>
                <th style="text-align:center;">@lang('trans.title_en')</th>
                <th style="text-align:center;">@lang('trans.desc_ar')</th>
                <th style="text-align:center;">@lang('trans.desc_en')</th>
                <th style="text-align:center;">@lang('trans.from')</th>
                <th style="text-align:center;">@lang('trans.to')</th>
                <th style="text-align:center;">@lang('trans.applicants')</th>
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
                processing: true,
                serverSide: true,
                oLanguage: {
                    sUrl: '{{ DT_Lang() }}'
                },
                ajax: "{{ route('admin.vacancy.index') }}",
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                dom: 'Blfrtip',
                buttons: [{
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
                            stripHtml: false,
                            columns: ':visible'
                        }
                    },
                    'colvis'
                ],
                columns: [{
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
                        data: 'title_ar',
                        name: 'title_ar'
                    },
                    {
                        data: 'title_en',
                        name: 'title_en'
                    },
                    {
                        data: 'desc_ar',
                        name: 'desc_ar'
                    },
                    {
                        data: 'desc_en',
                        name: 'desc_en'
                    },
                    {
                        data: 'from',
                        name: 'from'
                    },
                    {
                        data: 'to',
                        name: 'to'
                    },
                    {
                        data: 'applicants',
                        name: 'applicants'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },

                    {
                        data: 'action',
                    },
                ]
            });

        });
    </script>
@endpush
