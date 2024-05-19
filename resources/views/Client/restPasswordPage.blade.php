@extends('Client.layouts.layout')
@section('content')
    <section class="send-email container section-top">
        <h3>@lang('trans.RESET PASSWORD')</h3>
        <form action="{{ route('client.restPassword') }}" method="POST" class="send-mail">
            @csrf
            <input type="hidden" name="ssh" value="{{ $id }}">
            <input name="password" type="password" placeholder="@lang('trans.password')" />
            @error('password')
                <p class="alert alert-danger" style='color:red;'>{{ $message }}</p>
            @enderror
            <input name="password_confirmation" type="password" placeholder="@lang('trans.confirmPassword')" />
            <button type="submit" class="btn btn-send">@lang('trans.RESET PASSWORD')</button>
        </form>
    </section>
@endsection



@push('js')
@endpush
