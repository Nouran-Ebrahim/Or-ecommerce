@extends('Admin.layout')
@section('pagetitle', __('trans.gallery'))
@section('content')


    {{-- <div class="row">
        <div class="my-2 col-6 text-sm-start">
            <a href="{{ url('/admin/products/' . $id . '/gallery/create') }}" class="main-btn" disabled>@lang('trans.add_new')</a>
        </div>
        <div class="my-2 col-6 text-sm-end">
            <button type="button" id="DeleteSelected" onclick="DeleteSelected('product_galleries')" class="btn btn-dark"
                disabled>@lang('trans.Delete_Selected')</button>
        </div>
    </div> --}}
    <table class="table" id="DataTable">
        <thead>
            <tr>
                {{-- <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th> --}}
                <th>#</th>
                <th style="text-align:center;">@lang('trans.title')</th>
                <th style="text-align:center;">@lang('trans.header')</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="row_position" data-table="products">
            @php
                $i = 1;
            @endphp
            @foreach ($colors as $value)
                <tr>
                    {{-- <td  style="text-align:center;"><input type="checkbox" class="DTcheckbox" value="{{ $value->id }}"></td> --}}
                    <td  style="text-align:center;">{{ $i++ }}</td>
                    <td  style="text-align:center;">
                       <a href="{{ url('/admin/products/' . $id . '/gallery/' . $value->id . '/edit') }}">{{ $value['title_'.lang()] }}</a> 
                    </td>
                    @php
                        @$image=\App\Models\ProductHeader::where('product_id',$id)->where('color_id',$value->id)->first()->header;
                    @endphp
                    <td  style="text-align:center;"><a class="image-popup-no-margins" href="{{ image_path(@$image) }}">
                            <img src="{{ image_path(@$image) }}" style="max-height: 150px;max-width: 150px">
                        </a>
                    </td>

                    {{-- <td>
                        <a style="color: #000;"
                            href="{{ url('/admin/products/' . $id . '/gallery/' . $value->id . '/edit') }}"><i
                                class="fa-solid fa-pen-to-square"></i></a>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection



{{-- @push('js')
    <script type="text/javascript">
        $(function() {
            var getUrl = window.location.href.split('/');
            var attribute_id = getUrl[5];
             console.log(attribute_id)
            var table = $('#DataTable').DataTable({
                processing: true,
                serverSide: true,
                oLanguage: {
                    sUrl: '{{ DT_Lang() }}'
                },
                createdRow: function(row, data, dataIndex) {
                    $(row).attr('data-position', data.arrangement);
                    $(row).attr('data-id', data.id);
                    $(row).attr('id', data.id);
                },
                ajax: '/admin/products/'+attribute_id+'/gallery',
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
                        extend: 'pdfHtml5',
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
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    //  {
                    //     data: 'status',
                    //     name: 'status'
                    // }, 
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false
                    }
                ]
            });

        });
    </script>
@endpush --}}
