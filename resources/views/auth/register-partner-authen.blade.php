@extends('layouts.main')

@section('title', "Etrust - Register")

@section('content')
<main id="main" class="page-product-detail ">
    <div class="container" style="margin-top: 6rem">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-6 my-5 py-5 px-4 sec-box-white">
                    @if(auth()->user()->register_partner_status == App\Enums\ERegisterPartnerStatus::NOT_YET)
                        <form method="POST" action="{{ route('user.register.partner.post') }}">
                            @csrf
                            <h3 class="text-center text-uppercase">{{ __("layout.register_partner") }}</h3>

                            <div class="form-outline my-3 ">
                                <label class="form-label" for="company_name">{{ __("register.company_name") }}<span class="require">*</span></label>
                                <input type="text" id="company_name" name="company_name" class="form-control @error('company_name') is-invalid @enderror" required value="{{ old('company_name') }}" placeholder="{{ __("register.company_name") }}"/>
                                @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline my-3 ">
                                <label class="form-label" for="company_name">{{ __("register.note") }}<span class="require">*</span></label>
                                <textarea name="note" id="note" class="form-control" cols="30" rows="5" placeholder="{{ __("register.note") }}" required>{{ old('note') }}</textarea>
                            </div>

                            <div class="text-center text-lg-start">
                                <button type="submit" class="btn btn-primary" style="padding-left: 1rem; padding-right: 1rem;">{{ __("layout.register") }}</button>
                            </div>
                        </form>
                    @elseif(auth()->user()->register_partner_status == App\Enums\ERegisterPartnerStatus::CANCEL)
                        <h5 class="text-danger text-center">{{ __("register.account_ban") }}</h5>
                    @elseif(auth()->user()->register_partner_status == App\Enums\ERegisterPartnerStatus::PENDING)
                        <h5 class="text-primary text-center">{{ __("register.awaiting_approval") }}</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push("styles")
    <style>
        .type_of_account {
            cursor: pointer;
            border: 1px solid gray;
            padding: 1rem;
            border-radius: 10px
        }
        .type_of_account.active {
            border: 3px solid #006e82;

        }
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
        .h-custom {
            height: calc(100% - 73px);
        }
        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
@endpush

@push("scripts")
    <script>
        $(".type_of_account").click(function() {
            $(".type_of_account").removeClass("active");
            $(this).addClass("active");
            if ($(this).data('type_of_account') == "individual") {
                $(".company_el").addClass("d-none");
                $("input[name='type_account']").val(1);
            } else {
                $(".company_el").removeClass("d-none");
                $("input[name='type_account']").val(2);
            }
        });
    </script>
@endpush
