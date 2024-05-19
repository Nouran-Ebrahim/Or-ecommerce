@extends('Admin.layout')
@section('pagetitle', __('trans.sliders'))
@section('content')

<table class="table">
    <tbody class="text-center">
        <div class="text-center">
            <img src="{{ $Image['image'] }}" alt="IMG" class="img-thumbnail rounded mx-auto" style="max-width: 300px">
        </div>

        <tr>
            <td>{{  __('trans.title_ar') . ':' }}</td>
            <td>{{ $Image['title_ar'] }}</td>
        </tr>
        <tr>
            <td>{{  __('trans.title_en') . ':' }}</td>
            <td>{{ $Image['title_en'] }}</td>
        </tr>
        <tr>
            <td>{{  __('trans.desc_ar') . ':' }}</td>
            <td>{!! $Image['desc_ar'] !!}</td>
        </tr>
        <tr>
            <td>{{  __('trans.desc_en') . ':' }}</td>
            <td>{!! $Image['desc_en'] !!}</td>
        </tr>
        <tr>
            <td>{{  __('trans.status') . ':' }}</td>
            <td colspan="2">{{ $Image['status'] ? __('trans.visible') : __('trans.hidden') }}</td>
        </tr>
    </tbody>
</table>

@endsection
