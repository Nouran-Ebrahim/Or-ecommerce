@extends('Admin.layout')
@section('pagetitle', __('trans.categories'))
@section('content')
    <form action="{{ route('admin.branch.categories.update',$Branch) }}" method="POST">
        @csrf
        <table class="table dataTable" id="DataTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th><input type="checkbox" id="ToggleSelectAll" class="main-btn"></th>
                    <th style="text-align:center;">@lang('trans.title_ar')</th>
                    <th style="text-align:center;">@lang('trans.title_en')</th>
                    <th style="text-align:center;">@lang('trans.image')</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-center" data-table="categories">
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><input type="checkbox" @checked($Branch->categories->pluck('id')->contains($category->id)) class="DTcheckbox" value="{{ $category->id }}" name="categories[]"></td>
                        <td><a href="{{ route('admin.branch.category.products',['branch' => $Branch ,'category' => $category ]) }}">{{ $category->title_ar }}</a></td>
                        <td><a href="{{ route('admin.branch.category.products',['branch' => $Branch ,'category' => $category ]) }}">{{ $category->title_en }}</a></td>
                        <td><a href="{{ route('admin.branch.category.products',['branch' => $Branch ,'category' => $category ]) }}"><img src="{{ asset($category->image) }}"  style="width:100px;height:100px;border:0"></a></td>
                        <td><a href="{{ route('admin.branch.category.products',['branch' => $Branch ,'category' => $category ]) }}"><i class="fas fa-edit"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="clearfix"></div>
        <div class="col-12 my-4">
            <div class="button-group">
                <button type="submit" class="main-btn btn-hover w-100 text-center">
                    {{ __('trans.Submit') }}
                </button>
            </div>
        </div>
    </form>
@endsection
