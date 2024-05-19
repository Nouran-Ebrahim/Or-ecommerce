@extends('Admin.layout')
@section('pagetitle', __('trans.contact'))
@section('content')

<div class="my-2 text-sm-end">
    <button type="button" id="DeleteSelected" onclick="DeleteSelected('contacts')" class="btn btn-dark" disabled>@lang('trans.Delete_Selected')</button>
</div>
<table class="table table-bordered data-table" id="DataTable">
    <thead>
        <tr>
            <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th>
            <th>#</th>
            <th>@lang('trans.name')</th>
            <th>@lang('trans.phone')</th>
            <th>@lang('trans.email')</th>
            <th>@lang('trans.subject')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

@endsection



@push('js')


    <script type="text/javascript">

        $(document).ready(function () {
            var table = $('#DataTable').dataTable({
                processing: true
                , serverSide: true
                , oLanguage: {
                    sUrl: '{{ DT_Lang() }}'
                }
                , ajax: "{{ route('admin.contact.index') }}"
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
                , lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
                , columns: [
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
                        data: 'name',
                        name: 'name'

                    },
                    {
                        data: 'phone',
                        name: 'phone'

                    },
                    {
                        name: 'email',
                        data: 'email'

                    },
                    {
                        data: 'subject',
                        name: 'subject'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                 ],
             });
        });
    </script>

@endpush
