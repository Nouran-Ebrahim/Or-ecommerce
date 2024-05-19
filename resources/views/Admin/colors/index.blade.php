@extends('Admin.layout')
@section('pagetitle', __('trans.colors'))
@section('content')


    <div class="row">
        <div class="my-2 col-6 text-sm-start">
            <a href="{{ route('admin.colors.create') }}" class="main-btn" disabled>@lang('trans.add_new')</a>
        </div>
        <div class="my-2 col-6 text-sm-end">
            <button type="button" id="DeleteSelected" onclick="DeleteSelected('colors')" class="btn btn-dark"
                disabled>@lang('trans.Delete_Selected')</button>
        </div>
    </div>
    <table class="table table-bordered data-table" id="DataTable">
        <thead>
            <tr>
                <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th>
                <th>#</th>
                <th>@lang('trans.title_ar')</th>
                <th>@lang('trans.title_en')</th>
                <th>@lang('trans.color')</th>
                {{-- <th style="text-align:center;">@lang('trans.image')</th> --}}
                <th>@lang('trans.status')</th>
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
                ajax: "{{ route('admin.colors.index') }}",
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
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
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
                    }, {
                        data: 'title_ar',
                        name: 'title_ar'
                    }, {
                        data: 'title_en',
                        name: 'title_en'
                    }, {
                        data: 'hexa',
                        name: 'hexa'
                    }
                    // ,{
                    //     data: 'image',
                    //     name: 'image'
                    // }
                    ,
                    {
                        name: 'status',
                        data: 'status'
                    }, {
                        data: 'action',
                        name: 'action',

                        orderable: false
                    }
                ]
            });

        });
    </script>
@endpush
