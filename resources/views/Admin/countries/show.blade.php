@extends('Admin.layout')
@section('pagetitle', __('trans.Regions'))
@section('content')

    <div class="row">
        <div class="my-2 col-12 col-md-6 text-center">
            <a href="{{ route('admin.regions.create',['country_id' => $Country->id]) }}" class="main-btn mx-auto" disabled>@lang('trans.add_new')</a>
        </div>
        <div class="my-2 col-12 col-md-6 text-center">
            <a class="btn link-primary" data-bs-toggle="modal" data-bs-target="#delivery_cost">
              @lang('trans.delivery_cost_for_all_regions')
            </a>
        </div>
    </div>
    <table class="table"  id="regions_DataTable">
        <thead>
            <tr>
                <th>#</th>
                <th style="text-align:center;">@lang('trans.title_ar')</th>
                <th style="text-align:center;">@lang('trans.title_en')</th>
                <th style="text-align:center;">@lang('trans.delivery_cost')</th>
                <th style="text-align:center;">@lang('trans.visibility')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
    
        </tbody>
    </table>
    
    <div class="modal fade" id="delivery_cost" tabindex="-1" aria-labelledby="delivery_costLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form class="modal-body" method="GET" action="{{ route('admin.countries.show',$Country->id) }}" id="delivery_cost_form">
            <label for="inputEmail4" class="form-label">@lang('trans.delivery_cost')</label>
            <input name="delivery_cost" class="form-control" id="inputEmail4">
          </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('trans.close')</button>
            <button type="submit" form="delivery_cost_form" class="main-btn">@lang('trans.save')</button>
          </div>
        </div>
      </div>
    </div>

@endsection


@push('js')
    <script type="text/javascript">
        $(function() {

            var table = $('#regions_DataTable').DataTable({
                processing: true,
                serverSide: true,
                oLanguage: {
                    sUrl: '{{ DT_Lang() }}'
                },
                ajax: "{{ route('admin.regions.index',['country_id' => $Country->id]) }}",
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
                    },
                    {
                        data: 'title_en',
                    },
                    {
                        data: 'delivery_cost',
                    },
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