@extends('Admin.layout')
@section('pagetitle', __('trans.SocialMediaIcon'))
@section('content')
<style>

    tr{
        cursor: pointer;
    }
    tr:hover{
        background: {{ setting('main_color') }} !important;
        color: white !important;
    }
    .fa-brands{
            font-size: 30px;
    }
</style>
    <form method="POST" action="{{ route('admin.social_media_icons.store') }}" data-parsley-validate novalidate>
        @csrf
        <div class="row">
            <div class="col-md-6">
                <label for="link">@lang('trans.link')</label>
                <input id="link" type="text" name="link" required placeholder="@lang('trans.link')" class="form-control">
            </div>
            <div class="col-md-6">
                <p>@lang('trans.icon')</p>
                <button id="iconbtn" type="button" data-bs-toggle="modal" data-bs-target="#SocialMediaIcon" class="btn btn-info w-100">
                    @lang('trans.Select')
                </button>
                <input id="icon" type="hidden" name="icon" required class="form-control">
            </div>
            
            <div class="modal fade" id="SocialMediaIcon" tabindex="-1" aria-labelledby="SocialMediaIconLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <table class="table data-table text-center" id="DataTable">
                        <thead>
                            <tr>
                                <th>@lang('trans.icon')</th>
                                <th>@lang('trans.title')</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($icons as $SocialMediaIcon)
                              <tr >
                                @if($SocialMediaIcon['type'] == 'icon')
                                    <td data-type="{{ $SocialMediaIcon['type'] }}" data-icon="{{ $SocialMediaIcon['icon'] }}">
                                        <span data-type="icon" class="{{ $SocialMediaIcon['icon'] }}"></span>
                                    </td>
                                @elseif($SocialMediaIcon['type'] == 'image')
                                    <td data-type="{{ $SocialMediaIcon['type'] }}" data-icon="https://emcan-group.com{{ $SocialMediaIcon['icon'] }}">
                                        <img class="SocialMediaIcon" style="height: 100px" src="https://emcan-group.com{{ $SocialMediaIcon['icon'] }}" alt="IMG" width="150">
                                    </td>
                                @endif
                                <td>{{ $SocialMediaIcon['title'] }}</td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('trans.close')</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-12 m-b-0 text-center mx-auto mt-2">
                <button class="main-btn waves-effect waves-light" type="submit">@lang('trans.add')</button>
                <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">@lang('trans.cancel')</button>
            </div>
        </div>
    </form>
@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready( function () {
            $('#DataTable').DataTable({
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                oLanguage: {
                    sUrl: '{{ DT_Lang() }}'
                },
            });
        } );
    </script>

    <script type="text/javascript">
        $(document).on("click", "tr", function () {
            type = $(this).first().find('td:first').attr('data-type');
            icon = $(this).first().find('td:first').attr('data-icon');
            if(type == 'icon'){
                $('#icon').val(icon);
                $('#iconbtn').html('<i class="'+icon+'"></i>');
            }
            if(type == 'image'){
                $('#icon').val(icon);
                $('#iconbtn').html("<img width='150' src='"+icon+"'/>");
            }
            $('#iconbtn').removeClass('btn-info');
            $(".modal").modal('hide');
        });
    </script>
@endpush