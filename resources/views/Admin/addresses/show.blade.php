@extends('Admin.layout')
@section('pagetitle',__('trans.addresses'))
@section('content')

<table class="table">
    <tbody class="text-center">

        <tr>
            <td>{{  __('trans.client') . ':' }}</td>
            <td>{{ $address->client->name }}</td>
        </tr>
        <tr>
            <td>{{  __('trans.lat') . ':' }}</td>
            <td>{{ $address['lat'] }}</td>
        </tr>
        <tr>
            <td>{{  __('trans.long') . ':' }}</td>
            <td>{{ $address['long'] }}</td>
        </tr>
        <tr>
            <td>{{  __('trans.additionalDirection') . ':' }}</td>
            <td>{{ $address['additional_directions'] }}</td>
        </tr>

    </tbody>
</table>

@endsection
