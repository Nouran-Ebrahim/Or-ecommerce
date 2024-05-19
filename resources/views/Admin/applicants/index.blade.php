@extends('Admin.layout')
@section('pagetitle', __('trans.applicants'))
@section('content')
<div class="row">

    <div class="my-2 col-6 text-sm-end">
        <button type="button" id="DeleteSelected" onclick="DeleteSelected('careers')" class="btn btn-dark" disabled>@lang('trans.Delete_Selected')</button>
    </div>
</div>
    <table class="table table-bordered data-table text-center" id="DataTable">
        <thead>
            <tr>
                <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th>
                <th>#</th>
                <th>#</th>
                <th>@lang('trans.Name')</th>
                <th>@lang('trans.Email')</th>
                <th>@lang('trans.Phone')</th>
                <th>@lang('trans.address')</th>
                <th>@lang('trans.file')</th>
                {{-- <th>@lang('trans.addresses')</th> --}}
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Clients as $Client)
                <tr>
                    <td><input type="checkbox" class="DTcheckbox" value="{{ $Client->id }}"></td>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ \App\Models\Country::where('country_code', $Client->country_code)->first()->image }}"
                            style="height: 30px;"></td>
                    <td>{{ $Client->first_name . ' ' . $Client->last_name }}</td>
                    <td>{{ $Client->email }}</td>
                    <td>{{ $Client->phone }}</td>
                    <td>{{ $Client->address }}</td>
                    <td><a href="{{ $Client->file }}" download>@lang('trans.DownloadCv')</a></td>
                    <td>
                        <form class="formDelete" method="POST" action="{{ route('admin.applicants.destroy', $Client->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="button" class="btn btn-flat show_confirm" data-toggle="tooltip" title="Delete"><i
                                    class="fa-solid fa-eraser"></i></button>
                        </form>
                    </td>


                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
