@extends('Admin.layout')

@section('pagetitle', __('trans.Products'))
@section('content')
<div class="row">
    <div class="form-group p-1 col-md-6">
        <label>@lang('trans.price')</label>
        <input type="number" name="price_from" id="price_from" class="form-control m-b-10" placeholder="@lang('trans.from')">
        <input type="number" name="price_to" id="price_to" class="form-control" placeholder="@lang('trans.to')">
    </div>
    <div class="form-group p-1 col-md-6">
        <label>@lang('trans.time')</label>
        <input type="date" name="time_from" id="time_from" class="form-control m-b-10" placeholder="@lang('trans.time_from')">
        <input type="date" name="time_to" id="time_to" class="form-control" placeholder="@lang('trans.time_to')">
    </div>

    <div class="form-group p-1 col-md-6">
        <label for="title">@lang('trans.title')</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="@lang('trans.title')">
    </div>

    <div class="form-group p-1 col-md-6">
        <label for="discount">@lang('trans.discount')</label>
        <select name="discount" id="discount" class="form-control">
            <option value="">@lang('trans.Select')</option>
            <option value="1">@lang('trans.Yes')</option>
            <option value="0">@lang('trans.No')</option>
        </select>
    </div>
    <div class="form-group p-1 col-md-6">
        <label for="sort">@lang('trans.sort')</label>
        <select name="sort" id="sort" class="form-control">
            <option value="">@lang('trans.Select')</option>
            <option value="desc" data-key="price">@lang('trans.price_desc')</option>
            <option value="asc"  data-key="price">@lang('trans.price_asc')</option>
        </select>
    </div>
    <div class="form-group p-1 col-md-12">
        <div class="row">
            <div class="col-md-6 mx-auto d-flex justify-content-center">
                <button class="main-btn form-control" id="search">@lang('trans.Search')</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@lang('trans.importExcel')</h5>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.products.import') }}" method="POST" id="importExcel" enctype="multipart/form-data" data-parsley-validate>
            @csrf
            <p style="color: red;">
                @if(lang('en'))
                Notes: Do not change the file format
                <br>
                and populate the table with the necessary information.
                <br>
                Every size or color must be on an individual line (in the same field), so use 
                 <br>
                 (ALT + Enter).
                @else
                ملاحظات: لا تقم بتغيير تنسيق الملف
                 <br>
                 وملء الجدول بالمعلومات الضرورية.
                 <br>
                 يجب أن يكون كل حجم أو لون على سطر فردي (في نفس الحقل), لذا استخدم
                 <br> (ALT + Enter).
                @endif
            </p>
            <br>
            <a href="{{ asset('products.xlsx') }}">@lang('trans.download_example')</a>
            <div class="position-relative shadow p-3 w-100">
                <div class="d-flex align-items-center">
                    <div class="uploadOuter w-100">
                        <span class="dragBox w-100">
                            <p id="DargTxt" class=" d-flex align-items-center justify-content-center h-100 w-100">
                                @lang('trans.Darg_Drop')
                            </p>
                            <input required name="file" value="" type="file" accept=".xlsx,.xls,.csv" onchange="dragNdrop(event)" ondragover="drag()" ondrop="drop()" id="uploadFile">
                        </span>
                    </div>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('trans.close')</button>
        <button type="submit" form="importExcel" class="main-btn">@lang('trans.save')</button>
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="my-2 col-12 col-md-3 text-center">
        <button  class="btn btn-info" onclick="window.open('{{ route('admin.products.export') }}')">@lang('trans.exportExcel')</button>
    </div>
    <div class="my-2 col-12 col-md-3 text-center">
        <button  class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">@lang('trans.importExcel')</button>
    </div>
    <div class="my-2 col-6 col-md-3 text-center">
        <a href="{{ route('admin.products.create') }}" class="main-btn" disabled>@lang('trans.add_new')</a>
    </div>
    <div class="my-2 col-6 col-md-3 text-center">
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
            {{-- <th>@lang('trans.popular')</th> --}}
            <th>@lang('trans.most_selling')</th>
            <th>@lang('trans.in_stock')</th>
            <th>@lang('trans.new_collection')</th>
            <th></th>
        </tr>
    </thead>
    <tbody class="" data-table="products">

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

                        d.price_from = $('#price_from').val();
                        d.price_to = $('#price_to').val();

                        d.time_from = $('#time_from').val();
                        d.time_to = $('#time_to').val();
                        d.sort = $('#sort').val();
                        d.sort_key = $('#sort').children("option:selected").attr('data-key');
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
                        sortable: false
                    },
                    {
                        data: 'DT_RowIndex',
                        sortable: false
                    },
                    {
                        data: 'title',
                        name: 'title',
                    },
                    {
                        data: 'price',
                        name: 'price',
                        sortable: false
                    },
                    {
                        data: 'image',
                        sortable: false
                    },
                    {
                        data: 'status',
                        sortable: false
                    },
                    // {
                    //     data: 'popular',
                    //     sortable: false
                    // },
     
                    {
                        data: 'most_selling',
                        sortable: false
                    },
                    {
                        data: 'in_stock',
                        sortable: false 
                    },
                    {
                        data: 'new_collection',
                        sortable: false
                    },
                    {
                        data: 'action',
                        sortable: false
                    }
                ]
            });
            $('#search').click(function() {
                table.draw();
            });
            $('#search').click(function() {
                table.draw();
            });
            $(document).keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == '13'){
                    table.draw();
                }
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
