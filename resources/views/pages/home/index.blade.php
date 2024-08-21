@extends('layouts.main')
@section('title', "My Farm")

@push('meta')
<meta name="keywords" content="trong cay nuoi con, foodmap, myfarm">
<meta name="description" content="Chương trình trải nghiệm thực tế, trồng cây nuôi con cùng bà con nông dân với chi phí thấp, để nhận được sản phẩm chất lượng">
<meta property="og:title" content="Etrust Tin Nhắn ">
<meta property="og:description" content="Chương trình trải nghiệm thực tế, trồng cây nuôi con cùng bà con nông dân với chi phí thấp, để nhận được sản phẩm chất lượng">
<meta property="og:image" content="https://food-map.s3.ap-southeast-1.amazonaws.com/storage/media/JrrMHTjY0PQw15z675QRk4vQ1umXk33U7DPbOZHf.jpg">
@endpush

@section('content')
<div class="container container-table">
    <div class="row main-container">
        <div class="col-lg-9 col-md-8">
            <div class="swiper-container bannerSwiper">
                <div class="swiper-wrapper">
                    @foreach ($listBanners as $key => $banner)
                    <div class="swiper-slide banner-swiper-slide">
                        <a href="{{$banner['link']}}" class="{{!empty($banner['link']) ? "" : "disabled-link"}}">
                            <img src="{{$banner['image']}}" alt="MyFarm banner" width="1100" height="500" class="banner-img">
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-button-next banner-button-next"></div>
                <div class="swiper-button-prev banner-button-prev"></div>
            </div>
        </div>
        <div class="col-lg-3 col-12 news-container d-none d-md-flex">
            @foreach ($news as $key => $new)
                @if($key == 0 && !empty($new))
                    <div class="box-news">
                        <div class="title-box">
                            <span>{{ __("layout.myfarm_news") }}</span>
                        </div>
                        <a class="item-group row" href="/blog-detail/{{$new->slug}}" target="_blank">
                            <div class="col-6" style="overflow: hidden; padding: 0">
                                <img class="lazy-hidden img-news" data-lazy-type="image" data-lazy-src="{{$new->image}}" src="{{$new->image}}" importance="high">
                            </div>
                            <div class="col-6">
                                <div class="line-3" style="font-size: 13px; font-weight: 600">{{$new->name}}</div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
            @foreach ($listExtraBanners as $key => $banner)
                <a class="extra-banner-wrapper {{!empty($banner['link']) ? "" : "disabled-link"}}" href="{{$banner['link']}}">
                    <img src="{{$banner['image']}}" alt="MyFarm banner" class="banner-small">
                </a>
            @endforeach
        </div>
    </div>

    @if (count($listRunningCampaign) > 0)
        <section id="running-campaign" class="sec-box-white">
            <div class="entry-head">
                    <span class="menu-text">{{ __("layout.campaign_running") }}</span>
            </div>
            <div class="swiper-container runningSwiper">
                <div class="swiper-wrapper">
                    @foreach ($listRunningCampaign as $campaign)
                        @if ($campaign['status'] == "canceled")
                            @continue
                        @endif
                        @php
                            $percent = (int) ($campaign['sold'] / $campaign['total_products'] * 100);
                            if (session('my_locale') == 'en') {
                                $campaign['name'] = $campaign['name_en'] ?? $campaign['name'];
                                $campaign['thumbnail'] = $campaign['thumbnail_en'] ?? $campaign['thumbnail'];
                                $campaign['short_description'] = $campaign['short_description_en'] ?? $campaign['short_description'];
                            }
                        @endphp
                        <div class="col-12 campaign-item swiper-slide">
                            <div class="item">
                                <a href="{{ route('campaign.show', ['slug' => $campaign['slug']]) }}" class="text-black text-decoration-none">
                                    <img class="lazy-hidden img-full" data-lazy-type="image" data-lazy-src="{{$campaign['thumbnail']}}" src="{{$campaign['thumbnail']}}">
                                    <div class="progress-bar-container">
                                        <div style="background-color:#006e82; height: 8px ;width: {{$percent}}%"></div>
                                        <div class="percent-text" style="margin-left: {{-18 * ($percent / 100)}}px">
                                            <span style="font-size: 11px; font-weight: 600; text-align: center">{{$percent}}%</span>
                                        </div>
                                        <div style="background-color: #c2c2c2; height: 8px ;width: {{100 - $percent}}%"></div>
                                    </div>
                                    <div class="divtext" style="padding: 0 12px">
                                        <h3 class="line-2 campaign-title">
                                            <b>{{$campaign['name']}}</b>
                                        </h3>
                                        <span class="line-2 campaign-desc">{{$campaign['short_description']}} </span>
                                        <div class="price" style="margin-bottom: 5px">
                                            {{number_format($campaign['price'], 0, ',', '.')}} đ
                                        </div>
                                        <div>{{ __("layout.start_date") }}: {{ empty($campaign['start_at']) ? '' : Illuminate\Support\Carbon::parse($campaign['start_at'])->format('d/m/Y')}}</div>
                                        <div>{{ __("layout.end_date") }}: {{ empty($campaign['finished_at']) ? '' : Illuminate\Support\Carbon::parse($campaign['finished_at'])->format('d/m/Y')}}</div>
                                    </div>
                                </a>
                                <div class="button-group">
                                    <div class="button-container">
                                        <a href="{{ route('campaign.show', ['slug' => $campaign['slug']]) }}"
                                        class="button-wrapper farm-btn button-checkout text-decoration-none" data-tab="first" style="{{$percent == 100 ? "cursor: not-allowed" : ""}}">{{ __("layout.join") }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next campaign-running-next swiper-next"></div>
                <div class="swiper-button-prev campaign-running-prev swiper-prev"></div>
            </div>
        </section>
    @else
        <div id="running-campaign"></div>
    @endif

    @if (count($listCommingCampaign) > 0)
        <section id="comming-campaign" class="sec-box-white">
            <div class="entry-head">
                    <span class="menu-text">{{ __("layout.campaign_comming_soon") }}</span>
            </div>
            <div class="swiper-container commingSwiper">
                <div class="swiper-wrapper">
                    @foreach ($listCommingCampaign as $campaign)
                        @if ($campaign['status'] == "canceled")
                            @continue
                        @endif
                        @php
                            $percent = (int) ($campaign['sold'] / $campaign['total_products'] * 100);
                            if (session('my_locale') == 'en') {
                                $campaign['name'] = $campaign['name_en'] ?? $campaign['name'];
                                $campaign['thumbnail'] = $campaign['thumbnail_en'] ?? $campaign['thumbnail'];
                                $campaign['short_description'] = $campaign['short_description_en'] ?? $campaign['short_description'];
                                $campaign['image_info_campaign'] = $campaign['image_info_campaign_en'] ?? $campaign['image_info_campaign'];
                                $campaign['image_info_campaign_mb'] = $campaign['image_info_campaign_mb_en'] ?? $campaign['image_info_campaign_mb'];
                            }
                        @endphp
                        <div class="col-12 campaign-item swiper-slide">
                            <div class="item">
                                <a class="text-black" style="pointer-events:none">
                                    <img class="lazy-hidden img-full " data-lazy-type="image" data-lazy-src="{{$campaign['thumbnail']}}" src="{{$campaign['thumbnail']}}">
                                    <div class="progress-bar-container">
                                        <div style="background-color:#006e82; height: 8px ;width: {{$percent}}%"></div>
                                        <div class="percent-text" style="margin-left: {{-18 * ($percent / 100)}}px">
                                            <span style="font-size: 11px; font-weight: 600; text-align: center">{{$percent}}%</span>
                                        </div>
                                        <div style="background-color: #c2c2c2; height: 8px ;width: {{100 - $percent}}%"></div>
                                    </div>
                                    <div class="divtext" style="padding: 0 12px">
                                        <h3 class="line-2 campaign-title">
                                            <b>{{$campaign['name']}}</b>
                                        </h3>
                                        <span class="line-2 campaign-desc">{{$campaign['short_description']}} </span>
                                        <div class="price" style="margin-bottom: 5px">
                                            {{number_format($campaign['price'], 0, ',', '.')}} đ
                                        </div>
                                        <div>{{ __("layout.start_date") }}: {{ empty($campaign['start_at']) ? '' : Illuminate\Support\Carbon::parse($campaign['start_at'])->format('d/m/Y')}}</div>
                                        <div>{{ __("layout.end_date") }}: {{ empty($campaign['finished_at']) ? '' : Illuminate\Support\Carbon::parse($campaign['finished_at'])->format('d/m/Y')}}</div>
                                    </div>
                                </a>
                                <div class="button-group">
                                    <div class="button-container">
                                        <a class="button-wrapper farm-btn button-show" data-url_image="{{$campaign['image_info_campaign']}}" data-url_image_mb="{{$campaign['image_info_campaign_mb']}}">{{ __("layout.information") }}</a>
                                        <a class="button-wrapper farm-btn register-mail" data-campaign_id="{{$campaign['id']}}" data-tab="first">{{ __("layout.care") }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next campaign-comming-next swiper-next"></div>
                <div class="swiper-button-prev campaign-comming-prev swiper-prev"></div>
            </div>
        </section>
    @endif

    @if (count($listFinishedCampaign) > 0)
        <section id="finished-campaign" class="sec-box-white">
            <div class="entry-head">
                <span class="menu-text">{{ __("layout.campaign_finished") }}</span>
            </div>
            <div class="swiper-container finishedSwiper">
                <div class="swiper-wrapper">
                    @foreach ($listFinishedCampaign as $campaign)
                        @if ($campaign['status'] == "canceled")
                            @continue
                        @endif
                        @php
                            $percent = (int) ($campaign['sold'] / $campaign['total_products'] * 100);
                            if (session('my_locale') == 'en') {
                                $campaign['name'] = $campaign['name_en'] ?? $campaign['name'];
                                $campaign['thumbnail'] = $campaign['thumbnail_en'] ?? $campaign['thumbnail'];
                                $campaign['short_description'] = $campaign['short_description_en'] ?? $campaign['short_description'];
                                $campaign['image_info_campaign'] = $campaign['image_info_campaign_en'] ?? $campaign['image_info_campaign'];
                            }
                        @endphp
                        <div class="col-12 campaign-item swiper-slide">
                            <div class="item">
                                <a class="text-black  text-decoration-none" href="{{ route('campaign.show', ['slug' => $campaign['slug']]) }}">
                                    <img class="lazy-hidden img-full " data-lazy-type="image" data-lazy-src="{{$campaign['thumbnail']}}" src="{{$campaign['thumbnail']}}">
                                    <div class="progress-bar-container">
                                        <div style="background-color:#006e82; height: 8px ;width: {{$percent}}%"></div>
                                        <div class="percent-text" style="margin-left: {{-18 * ($percent / 100)}}px">
                                            <span style="font-size: 11px; font-weight: 600; text-align: center">{{$percent}}%</span>
                                        </div>
                                        <div style="background-color: #c2c2c2; height: 8px ;width: {{100 - $percent}}%"></div>
                                    </div>
                                    <div class="divtext" style="padding: 0 12px">
                                        <h3 class="line-2 campaign-title">
                                            <b>{{$campaign['name']}}</b>
                                        </h3>
                                        <span class="line-2 campaign-desc">{{$campaign['short_description']}} </span>
                                        <div class="price" style="margin-bottom: 5px">
                                            {{number_format($campaign['price'], 0, ',', '.')}} đ
                                        </div>
                                        <div>{{ __("layout.start_date") }}: {{ empty($campaign['start_at']) ? '' : Illuminate\Support\Carbon::parse($campaign['start_at'])->format('d/m/Y')}}</div>
                                        <div>{{ __("layout.end_date") }}: {{ empty($campaign['finished_at']) ? '' : Illuminate\Support\Carbon::parse($campaign['finished_at'])->format('d/m/Y')}}</div>
                                    </div>
                                </a>
                                <div class="button-group">
                                    <div class="button-container">
                                        <a class="button-wrapper farm-btn button-show" href="{{ route('campaign.show', ['slug' => $campaign['slug']]) }}" >{{ __("layout.information") }}</a>
                                        {{-- <a class="button-wrapper farm-btn button-show" data-url_image="{{$campaign['image_info_campaign']}}" data-url_image_mb="{{$campaign['image_info_campaign_mb']}}" >{{ __("layout.information") }}</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next campaign-finished-next swiper-next"></div>
                <div class="swiper-button-prev campaign-finished-prev swiper-prev"></div>
            </div>
        </section>
    @endif

    @php
        $banner_join = "/images/banner_vn.png";
        $banner_join_mb = "/images/banner_mb_vn.png";
        if (session('my_locale') == 'en') {
            $banner_join = "/images/banner_en.png";
            $banner_join_mb = "/images/banner_mb_en.png";
        }
    @endphp

    <section class="sec-box-white" style="background: transparent; box-shadow: none; margin-bottom: 0px; padding-bottom: 0px">
        <div class="title-wrapper">
            {{ __("layout.why_join_us") }}
        </div>
        <div class="row" style="margin-top:-1px">
            <img class="d-none d-md-block" src="{{$banner_join}}" style="width: 100%" alt="">
            <img class="d-md-none d-block" src="{{$banner_join_mb}}" style="width: 100%" alt="">
        </div>
        <div class="button-container mt-5">
            <a class="button-wrapper farm-btn button-join" style="width: 280px; font-size: 17px">{{ __("layout.join_now") }}</a>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="showInfoCampaign" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <img src="/assets/images/no-image.svg" class="imgInfoCampaignModal" alt="">
        </div>
    </div>

    <div class="modal fade" id="farmRegisterMail" tabindex="-1" aria-labelledby="farmRegisterMailLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="farmRegisterMaillLabel">{{__("layout.leave_information")}}</h5>
                    <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('campaign.register.mail') }}" id="mailRegisterCare" method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="myfarm_campaign_id" id="myfarm_campaign_id">
                        <div class="form-group">
                            <label for="register_mail" class="col-form-label">{{__("layout.email_or_phone")}}</label>
                            <input type="text" name="register_mail" class="form-control" id="register_mail">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">{{__("layout.close")}}</button>
                        <button type="button" id="submit-mail" class="btn btn-primary" style="background-color: #006e82; border-color: #006e82">{{__("layout.send_info")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style type="text/css">
    .main-container {
        /* margin-left: 0px; */
    }
    .campaign-item {
        flex: 0 0 33.3%;
        max-width: 33.3%;
        padding: 16px;
        /* width: auto; */
    }
    .farm-btn {
        color: #fff !important;
    }
    .swiper-container {
        position: relative;
        overflow: hidden;
        list-style: none;
        padding: 0;
        z-index: 1;
        max-width: 100vw;
    }
    .bannerSwiper {
      max-width: 68vw;
      max-height: calc(68vw * 190 / 457 );
      margin: 0px;
    }

    .banner-swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
    }

    .banner-swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
    .news-container {
        max-height: calc(68vw * 190 / 457 );
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .box-news {
        background-color: #fff;
        border-radius: 4px
    }
    .banner-small {
        width: 100%;
        aspect-ratio: 100/39;
        border-radius: 4px;
    }
    .campaign-desc {
        height: 44px;
    }
    .modal-content {
        margin: 33% auto;
    }
    .item-group:hover img {
        transition-duration: 500ms;
        -webkit-transform: scale(1.05);
        -ms-transform: scale(1.05);
        transform: scale(1.05);
    }
    .item-group {
        padding: 10px;
    }
    .swiper-slide-blank {
        width: 0 !important;
    }
    .banner-img {
        border-radius: 4px !important
    }
    a.disabled-link {
        pointer-events: none;
        cursor: default;
    }
    @media only screen and (max-width: 992px) {
        .news-container {
            max-height: 100%;
            margin-top: 12px;
        }
        .bannerSwiper {
            max-width: 100vw;
            max-height: calc(100vw * 190 / 457 );
            width: calc(100vw - 24px );
            margin-left: auto;
            margin-right: auto
        }
        .extra-banner-wrapper {
            padding: 6px;
        }
    }
    @media only screen and (max-width: 767px) {
        .news-container {
            display: none
        }
        .list-b-1 {
            margin-bottom: 0px;
        }
        .box-news .title-box {
            margin-bottom: 5px;
        }
        .item-group {
            padding: 4 15px;
        }
        .campaign-item {
            flex: 1;
            max-width: 100%;
            padding: 16px;
        }
        .carousel-item {
            display: block !important;
        }
        .campaign-item {
            flex: 0 0 100%;
            max-width: 100%;
            padding: 16px;
        }
        .swiper-container {
            max-width: calc(100vw - 24px );
        }
        .modal-content {
            width: 90%;
        }
    }
    </style>
@endpush

@push('scripts')
<script type='text/javascript'>
    let width = screen.width;
    $(document).ready(function(){
        localStorage.setItem("showChangePassword", "hide");

        $(".button-join").on('click', function(event) {
            $('html,body').animate({
                scrollTop: $("#running-campaign").offset().top - 100
            }, 0);
        });

        $(".closeModal").on('click', function(event) {
            $('#showInfoCampaign').modal('hide');
            $('#farmRegisterMail').modal('hide');
        });

        $(".button-show").on('click', function(event) {
            var source = $(this).data(width > 768 ? 'url_image' : 'url_image_mb');
            $(".imgInfoCampaignModal").attr("src", source);
            $('#showInfoCampaign').modal('show');
        });

        $(".register-mail").on('click', function(event) {
            $("#myfarm_campaign_id").val($(this).data("campaign_id"));
            $("#register_mail").val();
            $('#farmRegisterMail').modal('show');
        });

        $('#submit-mail').on('click', async function(e) {
            var email = $('input[name="register_mail"]').val();
            console.log(email);
            if (!email) {
                notifierAWESome.warning('Bạn chưa nhập thông tin!');
                $(this).prop('disabled', false);
                return false;
            }

            if (validateEmail(email)) {
                $("form#mailRegisterCare").submit();
                return false;
            }

            var thisRegex = /(84|0[3|5|7|8|9])+([0-9]{8})\b/g;

            if(email.match(thisRegex)){
                $("form#mailRegisterCare").submit();
                return false;
            }

            notifierAWESome.warning('Thông tin số điện thoại hoặc email không hợp lệ! Vui lòng kiểm tra lại!');
            $(this).prop('disabled', false);
            return false;

        });

        const validateEmail = (email) => {
            return email.match(
                /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
        };
    });
    var $runningLength = {{count($listRunningCampaign)}};
    var $commingLength = {{count($listCommingCampaign)}};
    var $finishedLength = {{count($listFinishedCampaign)}};

    var swiper = new Swiper(".bannerSwiper", {
        loop: true,
        navigation: {
            nextEl: ".banner-button-next",
            prevEl: ".banner-button-prev",
        },
    });

    var swiperRunning = new Swiper(".runningSwiper", {
        navigation: {
            nextEl: ".campaign-running-next",
            prevEl: ".campaign-running-prev",
        },
        slidesPerView: width > 768 ? 6 : 1,
        grid: {
            fill: 'row',
            rows:( width > 768 && $runningLength > 3) ? 2 : 1,
        }
    });

    var swiperComming = new Swiper(".commingSwiper", {
        navigation: {
            nextEl: ".campaign-comming-next",
            prevEl: ".campaign-comming-prev",
        },
        slidesPerView: width > 768 ? 6 : 1,
        grid: {
            fill: 'row',
            rows:( width > 768 && $commingLength > 3) ? 2 : 1,
        }
    });

    var swiperFinished = new Swiper(".finishedSwiper", {
        navigation: {
            nextEl: ".campaign-finished-next",
            prevEl: ".campaign-finished-prev",
        },
        slidesPerView: width > 768 ? 6 : 1,
        grid: {
            fill: 'row',
            rows:( width > 768 && $finishedLength > 3) ? 2 : 1,
        }
    });
</script>
@endpush


