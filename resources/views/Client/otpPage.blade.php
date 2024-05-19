@extends('Client.layouts.layout')
@section('content')
    <section class="send-email container section-top">
        <h3>@lang('trans.CHECK YOUR PHONE')</h3>
        <p>
            @lang('trans.Please check your messages and enter the 6 digit code below.')
        </p>

        <form action="{{ route('client.sendOtp') }}" method="POST" class="send-mail">
            @csrf
            <input type="hidden" name="ssh" value="{{ $id }}">
            <div class="mb-3 d-flex gap-2">
                <input name="digit1" type="text" class="form-control rounded-2 border border-2 py-3 code-input"
                    aria-describedby="OtpInput" maxlength="1">
                <input name="digit2" type="text" class="form-control rounded-2 border border-2 py-3 code-input"
                    aria-describedby="OtpInput" maxlength="1">
                <input name="digit3" type="text" class="form-control rounded-2 border border-2 py-3 code-input"
                    aria-describedby="OtpInput" maxlength="1">
                <input name="digit4" type="text" class="form-control rounded-2 border border-2 py-3 code-input"
                    aria-describedby="OtpInput" maxlength="1">
                <input name="digit5" type="text" class="form-control rounded-2 border border-2 py-3 code-input"
                    aria-describedby="OtpInput" maxlength="1">
                <input name="digit6" type="text" class="form-control rounded-2 border border-2 py-3 code-input"
                    aria-describedby="OtpInput" maxlength="1">

            </div>
            <div class="otp fs-4 pb-4"> @lang('trans.Resend otp within')
                <span class="counter">60</span>
                <span>@lang('trans.Seconds')</span>
            </div>

            <!-- <div class="mb-3 form-check">
                                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> -->
            <button type="submit" class="btn btn-send my-3">@lang('trans.confirm')</button>
            <div class="d-flex justify-content-center">
                <a type="button" class="text-secondary fs-3 py-2 fw-medium text-decoration-underline resend">
                    @lang('trans.Resent code again')
                </a>
            </div>
        </form>
    </section>
@endsection



@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const codeInputs = document.querySelectorAll('.code-input');

            codeInputs.forEach((input, index) => {
                input.addEventListener('input', function() {
                    if (this.value.length === 1) {
                        if (index < codeInputs.length - 1) {
                            codeInputs[index + 1].focus();
                        }
                    }
                });

                // Prevent inputs from exceeding 1 character
                input.addEventListener('keypress', function(e) {
                    if (this.value.length >= 1) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(() => {
            // Selecting elements
            var counterElement = $('.counter');
            var otpElement = $('.otp');
            var resendElement = $('.resend');
            var confirmCreationButton = $('#ConfirmCreation');

            var count = 60;
            var intervalId;
            var initialCount = count;

            function updateCounter() {
                counterElement.text(count);
                count--;
                if (count < 0) {
                    clearInterval(intervalId);
                    otpElement.fadeOut(100, function() {
                        resendElement.fadeIn(1000);
                    });
                }
            }
            startCountdown();

            // Function to start the countdown
            function startCountdown() {
                count = initialCount;
                counterElement.text(count);
                intervalId = setInterval(updateCounter, 1000); // Set interval only once
            }

            // Event listener for the button click
            resendElement.on('click', function() {
                resendElement.fadeOut(100, function() {
                    otpElement.fadeIn(1000);
                    clearInterval(intervalId);
                    startCountdown();
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            const codeInputs = document.querySelectorAll('.code-input');

            codeInputs.forEach((input, index) => {
                input.addEventListener('input', function() {
                    if (this.value.length === 1) {
                        if (index < codeInputs.length - 1) {
                            codeInputs[index + 1].focus();
                        }
                    }
                });

                // Prevent inputs from exceeding 1 character
                input.addEventListener('keypress', function(e) {
                    if (this.value.length >= 1) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
    <script>
        $('.resend').on('click', function() {
            var client_id = "{{ $id }}";
            //  console.log(client_id)

            $.ajax({
                url: '{{ route('client.resend') }}',
                type: "POST",
                data: {
                    ssh: client_id,
                    "_token": "{{ csrf_token() }}"
                },

                success: function(response) {
                    // Handle the response
                    console.log(1);

                    // count = 60
                    // otpElement.fadeOut(1000);
                    // clearInterval(intervalId);
                    // startCountdown();
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    // console.log(5)
                    console.error(xhr.responseText);
                }
            })
        })
    </script>
@endpush
