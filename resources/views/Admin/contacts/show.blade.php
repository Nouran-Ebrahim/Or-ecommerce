@extends('Admin.layout')
@section('pagetitle', __('trans.contact'))
@section('content')
    <div class="row">
        <div class="col-2">
            @lang('trans.name')
        </div>
        <div class="col-10">
            {{ $Contact['name'] }}
        </div>

        <div class="col-2">
            @lang('trans.phone')
        </div>
        <div class="col-10">
            {{ $Contact['phone'] }}
        </div>

        <div class="col-2">
            @lang('trans.email')
        </div>
        <div class="col-10">
            {{ $Contact['email'] }}
        </div>

        <div class="col-2">
            @lang('trans.subject')
        </div>
        <div class="col-10">
            {{ $Contact['subject'] }}
        </div>

        <div class="col-2">
            @lang('trans.message')
        </div>
        <div class="col-10">
            <p> {{ $Contact['message'] }}</p>
        </div>
    </div>

@endsection
