@extends('Admin.layout')
@section('pagetitle', $Category->title())
@section('content')

<div class="row">
    <div class="my-2 col-6 text-sm-start">
        <a href="{{ route('admin.products.create') }}" class="main-btn" disabled>@lang('trans.add_new')</a>
    </div>
    <div class="my-2 col-6 text-sm-end">
        <button type="button" id="DeleteSelected" onclick="DeleteSelected('products')" class="btn btn-dark" disabled>@lang('trans.Delete_Selected')</button>
    </div>
</div>
<table class="table table-bordered data-table w-100" id="DataTable">
    <thead>
        <tr>
            <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th>
            <th>#</th>
            <th>@lang('trans.title')</th>
            <th>@lang('trans.price')</th>
            <th>@lang('trans.image')</th>
            <th>@lang('trans.display')</th>
            <th></th>
        </tr>
    </thead>
    <tbody class="row_position" data-table="products">

    </tbody>
</table>
@endsection


@push('js')
    <script type="text/javascript">
        $("#itemproducts").addClass('cyan');
        $(function() {

            var table = $('#DataTable').DataTable({
                processing: true
                , searching: false
                , serverSide: true
                , oLanguage: {
                    sUrl: '{{ DT_Lang() }}'
                }
                , createdRow: function( row, data, dataIndex ) {
                    $( row ).attr('data-position', data.arrangement);
                    $( row ).attr('data-id', data.id);
                    $( row ).attr('id', data.id);
                }
                , ajax: {
                    url: "{{ route('admin.products.index') }}"
                    , data: function(d) {
                        d.title = $('#title').val();
                        d.discount = $('#discount').val();
                        d.category = {{ $Category->id }};
                        d.branch = $('#branch').val();

                        d.price_from = $('#price_from').val();
                        d.price_to = $('#price_to').val();

                        d.time_from = $('#time_from').val();
                        d.time_to = $('#time_to').val();
                    }
                }
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
                    },
                    {
                        data: 'DT_RowIndex',
                    },
                    {
                        data: 'title',
                        name: 'title',
                    },
                    {
                        data: 'price',
                    },
                    {
                        data: 'image',
                    },
                    {
                        data: 'status',
                    },
                    {
                        data: 'action',
                    }
                ]
            });
            $('#search').click(function() {
                table.draw();
            });
        });





        $(document).on('click', '.status_toggleswitch', function() {
            toggleswitch($(this).attr('data-id'),'products','status','status_checkbox');
        });
        $(document).on('click', '.popular_toggleswitch', function() {
            toggleswitch($(this).attr('data-id'),'products','popular','popular_checkbox');
        });
        $(document).on('click', '.most_selling_toggleswitch', function() {
            toggleswitch($(this).attr('data-id'),'products','most_selling','most_selling_checkbox');
        });

    </script>
@endpush
