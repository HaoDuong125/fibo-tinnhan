@extends('layouts.main', ['disableLocale' => 1])

@section('title', "Etrust - Verify Otp")

@section('content')
<div class="container mt-5 pt-5">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 ">
            <div class="card sec-box-white">
                <div class="card-header">{{ __("login.verify_otp") }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form id="formAction" method="POST" action="{{ route('register.check') }}">
                        @csrf
                        <div class="text-center">
                            <div>
                                <p class="left">{{ __("login.input_6_digits") }}<span
                                        style="font-weight: 500" class="phone-number"></span> </p>
                                <div class="">
                                    <fieldset class='number-code'>
                                        <div>
                                            <input type="hidden" name="type" value="{{$type}}">
                                            <input type="hidden" name="phone" value="{{$phone}}">
                                            <input type="number" name='code-1' class='code-input' required
                                                placeholder="0" autofocus />
                                            <input type="number" name='code-2' class='code-input' required
                                                placeholder="0" />
                                            <input type="number" name='code-3' class='code-input' required
                                                placeholder="0" />
                                            <input type="number" name='code-4' class='code-input' required
                                                placeholder="0" />
                                            <input type="number" name='code-5' class='code-input' required
                                                placeholder="0" />
                                            <input type="number" name='code-6' class='code-input' required
                                                placeholder="0" />
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="error-contact" style="display:none; text-align: left !important;">
                                    <p>{{ __("login.contact_support") }}
                                    </p>
                                    <p>Hotline: <a href="tel:0865654165">0865.654.165</a>
                                    </p>
                                    <p>Email: <a href="mailto:info@foodmap.asia">myfarm@foodmap.asia</a></p>
                                    <p>Fanpage: <a
                                            href="https://www.facebook.com/Foodmap.asia">Etrust</a></p>
                                </div>
                            </div>
                            <div class="mb-70">
                                <div class="left">
                                    <span class="text-label"><span class="time-resend"></span></span>
                                    <span
                                        style="color: #006e82; cursor: pointer; display: none; margin-bottom: -10px"
                                        id="resendOtp">{{ __("login.resend") }}</span>
                                    <br>
                                    <p id="timeValid" class="text-label">{{ __("login.code_valid_5_min") }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button id="verifyOtp" type="button" class="btn btn-primary">
                                {{__("login.continue")}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push("styles")
    <style>
        .number-code {
            margin: 20px 0 20px 0;
        }
        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
        .card-body form input.code-input {
            font-size: 30px;
            width: 40px;
            text-align: center;
            flex: 1 0 1em;
            text-decoration: underline;
        }

        .card-body form input {
            border-radius: 4px;
            color: #000;
            border: 0;
        }

        .card-body form input:invalid {
            box-shadow: none;
        }
    </style>
@endpush

@push('scripts')
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        const inputElements = [...document.querySelectorAll('input.code-input')];
        inputElements.forEach((ele, index) => {
            ele.addEventListener('keydown', (e) => {
                if (e.keyCode === 8 && e.target.value === '') {
                    inputElements[Math.max(0, index - 1)].focus();
                };
            })
            ele.addEventListener('input', (e) => {
                const [first, ...rest] = e.target.value;
                e.target.value = first ?? '';
                const lastInputBox = index === inputElements.length - 1;
                const insertedContent = first !== undefined;
                if (insertedContent && !lastInputBox) {
                    inputElements[index + 1].focus();
                    inputElements[index + 1].value = rest.join('');
                    inputElements[index + 1].dispatchEvent(new Event('input'));
                }
            })
        });
        var d1 = new Date(),
            d2 = new Date(d1);
        d2.setMinutes(d1.getMinutes() + 1);

        $('.time-resend').countdown(d2, function(event) {
            $(this).html(event.strftime('{{ __("login.resend_after") }} %M:%S'));
        }).on('finish.countdown', function(event) {
            $(this).css('display', 'none');
            $('#resendOtp').css('display', 'block');
        });
    })

    $('#resendOtp').on('click', async function(e) {
            var phone = $('input[name="phone"]').val();
            if (!phone) {
                toastr.error('{{__('layout.input_phone')}}');
                return false;
            }
            var thisRegex = /^(0)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/;
            if (!phone.match(thisRegex)) {
                toastr.error('{{__('layout.phone_invalid')}}');
                return false;
            }

            $.ajax({
                type: "GET",
                url: `/check-phone/${phone}`,
                success: function(response) {
                    $('#resendOtp').prop('disabled', false);
                    if (typeof(response.blocked) != 'undefined' && response.blocked) {
                        toastr.error("{{__("login.try_tomorrow")}}");
                        $('#resendOtp').css('display', 'none');
                        $('#verifyOtp').css('display', 'none');
                        $('#timeValid').css('display', 'none');
                        $('.time-resend').hide();
                        $('.error-contact').css('display', 'block');
                        return;
                    }
                    if (response.errors == false) {
                        $('#resendOtp').css('display', 'none');
                        $('.error-contact').hide();
                        $('.time-resend').css('display', 'block');
                        $('input[name="code1"]').focus();
                        //set time resend otp
                        var d1 = new Date(),
                            d2 = new Date(d1);
                        d2.setMinutes(d1.getMinutes() + 1);
                        $('.time-resend').countdown(d2, function(event) {
                            $(this).html(event.strftime('Gửi lại mã sau %M:%S'));
                        }).on('finish.countdown', function(event) {
                            $(this).css('display', 'none');
                            $('#resendOtp').css('display', 'block');
                        });

                        $.ajax({
                            type: 'POST',
                            url: "{{route('send.otp')}}",
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: {
                                phone,
                                'type' : 'resend'
                            },
                            success: function (response) {
                                if (typeof(response.blocked) != 'undefined' && response.blocked) {
                                        toastr.error(response?.message);
                                        $('#resendOtp').css('display', 'none');
                                        $('#verifyOtp').css('display', 'none');
                                        $('#timeValid').css('display', 'none');
                                        $('.time-resend').hide();
                                        $('.error-contact').css('display', 'block');
                                        return;
                                    }
                                if (response.errors){
                                    toastr.error(response?.message);
                                    if (response.problem) {
                                        $('.error-contact').show();
                                        toastr.error(response?.message);
                                        $('#resendOtp').css('display', 'none');
                                        $('#timeValid').css('display', 'none');
                                        $('.time-resend').hide();
                                        $('#verifyOtp').css('display', 'none');
                                    }
                                }
                            },
                            error(xhr) {
                                console.log('err',xhr)
                            },
                        });
                    } else {
                        toastr.error(response?.message);
                        if (response.problem) {
                            $('.error-contact').show();
                            $('.time-resend').hide();
                            $('#timeValid').css('display', 'none');
                            $('#resendOtp').css('display', 'none');
                            $('#verifyOtp').css('display', 'none');
                        }
                    }
                }
            });
        });

    $('#verifyOtp').on('click', async function(e) {
        var phone = $('input[name="phone"]').val();

        var otp = '';
        for (let i = 1; i < 7; i++) {
            otp += $('input[name="code-' + i + '"]').val();
        }

        if (otp.length < 6) {
            toastr.error('{{__('login.invalid_otp')}}');
            return false;
        }

        $.ajax({
            type: 'POST',
            url: "{{route('verify.otp.check')}}",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
               phone,
               otp
            },
            success: function (response) {
                console.log(response)
                if (typeof(response.blocked) != 'undefined' && response.blocked) {
                        toastr.error(response?.message);
                        $('.time-resend').hide();
                        $('.error-contact').css('display', 'block');
                        $('#resendOtp').css('display', 'none');
                        $('#verifyOtp').css('display', 'none');
                        return;
                    }
                if (response.errors == false) {
                    if (response?.type === 'login') {
                        location.reload();
                    } else {
                        $("#formAction").submit();
                    }
                } else {
                    toastr.error(response?.message);
                    if (response.problem) {
                        $('.error-contact').show();
                        $('#resendOtp').css('display', 'none');
                        $('#verifyOtp').css('display', 'none');
                        toastr.error(response?.message);
                    }
                }
            },
            error(xhr) {
                console.log('err',xhr)
            },
        });
        return false;
    });
</script>
@endpush


