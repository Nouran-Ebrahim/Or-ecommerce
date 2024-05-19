@extends('Admin.layout')
@section('pagetitle', __('trans.FAQ'))
@section('content')

<table class="table">
    <tr>
        <td>
            {{ $faq['question_en'] }}
        </td>
        <td>
            {{ $faq['question_ar'] }}
        </td>
    </tr>
    <tr>
        <td>
            {!! $faq['answer_en'] !!}
        </td>
        <td>
            {!! $faq['answer_ar'] !!}
        </td>
    </tr>


</table>

@endsection

