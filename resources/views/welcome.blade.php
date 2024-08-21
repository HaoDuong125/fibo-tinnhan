<!DOCTYPE html>
@php
    $bgStatus = array(
        0 => "#006e82",
        1 => "#f7941d",
        2 => "#0A923C",
    );

    $campaign_running = [
        0 => [
                "id" => 10,
                "name" => "NHẬN NUÔI ONG TA - A LƯỚI (HUẾ) - ĐỢT 21",
                "start_at" => "2024-03-12 09:05:00",
                "finished_at" => "2024-03-23 09:05:00",
                "total_products" => 35,
                "sold" => 34,
                "thumbnail" => "https://food-map.s3.amazonaws.com/myfarm/campaign/V8v85jyu7PycDHFuAGgLYJt1GeOMh7h1I2nA8urY.png",
                "short_description" => "When you insert data to the tableName table your first id will be IDC00000001 and second IDC00000002 goes like that. I hope it helps!",
                "image_info_campaign" => "https://food-map.s3.amazonaws.com/myfarm/campaign/Hw6l8FY6dQQnUYmigf7j4PBL07RfCc79xsDZupZr.jpg",
                "status" => "running",
                "slug" => "nhan-nuoi-ong-ta-a-luoi-hue-dot-21",
                "code" => "MF00240312090639",
                "price" => 3000000
            ],
        1 => [
                "id" => 25,
                "name" => "Nuôi gà cùng A Lưới",
                "start_at" => "2024-03-25 16:00:00",
                "finished_at" => "2024-04-25 16:00:00",
                "total_products" => 100,
                "sold" => 23,
                "thumbnail" => "https://food-map.s3.amazonaws.com/myfarm/campaign/um1BRnj6QnYdDdaFmI9G5PTdBCJgGXD61aQ6YZHI.jpg",
                "short_description" => "Hơn hết chính là bạn đã góp sức bảo vệ hệ sinh thái rừng nguyên sinh tại A Lưới và bảo tồn loài ong đang có nguy cơ sụt giảm nghiêm trọng trên toàn cầu.",
                "image_info_campaign" => "https://food-map.s3.amazonaws.com/myfarm/campaign/um1BRnj6QnYdDdaFmI9G5PTdBCJgGXD61aQ6YZHI.jpg",
                "status" => "running",
                "slug" => "nuoi-ga-cung-a-luoi",
                "code" => "MF00240325160353",
                "price" => 1400000
            ],
        2 => [
                "id" => 25,
                "name" => "Nuôi gà cùng A Lưới",
                "start_at" => "2024-03-25 16:00:00",
                "finished_at" => "2024-04-25 16:00:00",
                "total_products" => 100,
                "sold" => 23,
                "thumbnail" => "https://food-map.s3.amazonaws.com/myfarm/campaign/um1BRnj6QnYdDdaFmI9G5PTdBCJgGXD61aQ6YZHI.jpg",
                "short_description" => "Hơn hết chính là bạn đã góp sức bảo vệ hệ sinh thái rừng nguyên sinh tại A Lưới và bảo tồn loài ong đang có nguy cơ sụt giảm nghiêm trọng trên toàn cầu.",
                "image_info_campaign" => "https://food-map.s3.amazonaws.com/myfarm/campaign/um1BRnj6QnYdDdaFmI9G5PTdBCJgGXD61aQ6YZHI.jpg",
                "status" => "running",
                "slug" => "nuoi-ga-cung-a-luoi",
                "code" => "MF00240325160353",
                "price" => 1400000
            ],
        3 => [
                "id" => 25,
                "name" => "Nuôi gà cùng A Lưới",
                "start_at" => "2024-03-25 16:00:00",
                "finished_at" => "2024-04-25 16:00:00",
                "total_products" => 100,
                "sold" => 23,
                "thumbnail" => "https://food-map.s3.amazonaws.com/myfarm/campaign/um1BRnj6QnYdDdaFmI9G5PTdBCJgGXD61aQ6YZHI.jpg",
                "short_description" => "Hơn hết chính là bạn đã góp sức bảo vệ hệ sinh thái rừng nguyên sinh tại A Lưới và bảo tồn loài ong đang có nguy cơ sụt giảm nghiêm trọng trên toàn cầu.",
                "image_info_campaign" => "https://food-map.s3.amazonaws.com/myfarm/campaign/um1BRnj6QnYdDdaFmI9G5PTdBCJgGXD61aQ6YZHI.jpg",
                "status" => "running",
                "slug" => "nuoi-ga-cung-a-luoi",
                "code" => "MF00240325160353",
                "price" => 1400000
            ],
        ];
    $campaign_coming = [
        0 => [
            "id" => 28,
            "name" => "NHẬN NUÔI ONG DÚ - A LƯỚI (HUẾ)",
            "start_at" => "2024-09-01 08:57:00",
            "finished_at" => "2024-09-30 08:58:00",
            "total_products" => 100,
            "sold" => 0,
            "thumbnail" => "https://food-map.s3.amazonaws.com/myfarm/campaign/TE1XB3XfVjhFiXxbK4HEcHNQKPnl1wZgxUSkjm6J.jpg",
            "short_description" => "Chỉ với 3 triệu đồng, bạn có thể nhận nuôi một tổ ong dú tại huyện miền núi biên giới A Lưới (Huế) và thu hoạch mật ong hoa rừng nguyên chất.",
            "image_info_campaign" => "https://food-map.s3.amazonaws.com/myfarm/campaign/wPYjjUnLRe17mbRDOpXn1ykgU7FhzRHQrCImhBGZ.png",
            "status" => "comming_soon",
            "slug" => "nhan-nuoi-ong-du-a-luoi-hue",
            "code" => "MF00240326090049",
            "price" => 3000000
        ],
        1 => [
            "id" => 29,
            "name" => "TRỒNG RỪNG TRÀM THU MẬT HOA",
            "start_at" => "2024-10-01 09:01:00",
            "finished_at" => "2024-10-30 09:01:00",
            "total_products" => 10000,
            "sold" => 0,
            "thumbnail" => "https://food-map.s3.amazonaws.com/myfarm/campaign/o9VAvQWw6h1s9xHRMuy2ADQBl9BTrg3PP9LUvxV7.jpg",
            "short_description" => "Với mỗi cây tràm được trồng, bạn không chỉ góp phần phủ xanh những cánh rừng tại huyện miền núi biên giới A Lưới mà còn có thể thu hoạch mật ong hoa rừng nguyên chất.",
            "image_info_campaign" => "https://food-map.s3.amazonaws.com/myfarm/campaign/U0mGvmv7YuKd71wyVWZLbdqW2K03amjxok7tyGdN.png",
            "status" => "comming_soon",
            "slug" => "trong-rung-tram-thu-mat-hoa",
            "code" => "MF00240326090516",
            "price" => 199000
        ],
        2 => [
            "id" => 30,
            "name" => "NUÔI GÀ THẢ VƯỜN",
            "start_at" => "2024-11-01 09:08:00",
            "finished_at" => "2024-11-30 09:08:00",
            "total_products" => 100,
            "sold" => 0,
            "thumbnail" => "https://food-map.s3.amazonaws.com/myfarm/campaign/X3Mi3mDTmTruCnQSW7JpUNTEJdQnmWcLmkSXMfQ8.png",
            "short_description" => "Nhận nuôi gà con - Thu hoạch trứng vàng",
            "image_info_campaign" => "https://food-map.s3.amazonaws.com/myfarm/campaign/r1VA9gtTls9k97DHoFHCrkwkhjGFkzWG1O4XMo5r.png",
            "status" => "comming_soon",
            "slug" => "nuoi-ga-tha-vuon",
            "code" => "MF00240326091156",
            "price" => 500000
        ]
    ];

    $campaign_finished = [
        0 => [
            "id" => 26,
            "name" => "NHẬN NUÔI ONG TA - A LƯỚI (HUẾ) - ĐỢT 1",
            "start_at" => "2024-03-25 00:12:00",
            "finished_at" => "2024-04-25 00:13:00",
            "total_products" => 50,
            "sold" => 37,
            "thumbnail" => "https://food-map.s3.amazonaws.com/myfarm/campaign/OyOURrypPT5zPNVIZWSLjHwtyyqGxWJgJzC3xkaC.png",
            "short_description" => "Chỉ với 3 triệu đồng, bạn có thể nhận nuôi ngay 01 tổ ong và thu hoạch mật ong hoa rừng nguyên chất trong vòng 3 năm.",
            "image_info_campaign" => "https://food-map.s3.amazonaws.com/myfarm/campaign/QrWig4Ccl3khprcwXVw5dX6vDdbwBg5Ao3VEdIoM.png",
            "status" => "finished",
            "slug" => "nhan-nuoi-ong-ta-a-luoi-hue-dot-1",
            "code" => "MF00240326001905",
            "price" => 3000000
        ],
    ];
@endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Etrust</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        {{-- <link rel="stylesheet" href="css/owl.carousel.min.css"> --}}
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

        {{-- <script src="js/owl.carousel.min.js"></script> --}}

        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" /> --}}
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script> --}}


        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <style>
            html, body, .container-table {
                height: 100%;
            }
            .main-container {
                margin-top: 7rem
            }
            a {
                text-decoration: none;
            }
            .container-table {
                display: table;
            }
            .vertical-center-row {
                display: table-cell;
                vertical-align: middle;
            }
            .carousel-inner img {
                width: 100%;
                height: 100%;
            }
            .sec-box-white {
                border-radius: 5px;
                overflow: hidden;
                background-color: #fff;
                -webkit-box-shadow: 0 0 10px rgba(0, 0, 0, 0.06);
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.06);
                margin: 16px 0;
            }
            .box-news .title-box {
                display: block;
                line-height: 30px;
                overflow: hidden;
                font-weight: 700;
                text-transform: uppercase;
                color: #fff;
                margin-bottom: 10px
            }
            .box-news .title-box span {
                float: left;
                background-color: #006e82;
                padding: 0 10px;
                position: relative;
            }
            .box-news .title-box span:after {
                content: '';
                position: absolute;
                left: 100%;
                top: 0;
                border-top: 15px solid #006e82;
                border-bottom: 15px solid #006e82;
                border-right: 10px solid transparent;
            }
            .list-b-1 {
                margin-bottom: 10px;
            }
            .item-group {
                background-color: #fff;
                padding: 10px 0;
                border-radius: 8px;
                margin: 0px;
                color: #006e82;
            }
            .img-news {
                width: 100%;
                aspect-ratio: 5/3;
            }
            .entry-head {
                border-bottom: 1px solid #eee;
                padding: 16px 0;
            }
            .menu-text {
                padding: 16px;
                background-color: #006e82;
                color: #fff;
                font-size: 17px;
                font-weight: 700
            }
            .slide-button-wrapper {
                position: absolute;
                width: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 40px;
                border-radius: 50px;
                background-color: #93D2DB;
            }
            .img-full {
                width: 100%;
                aspect-ratio: 25/17;
            }
            .status-wrapper {
                position: absolute;
                top: 5px;
                right: 0px;
                z-index: 10;
                background-color: #006e82;
                padding: 8px 0;
                padding-left: 4px;
                border-top-right-radius: 4px;
                border-bottom-right-radius: 4px;
                width: 120px;
                border: 2px solid #fff;
            }
            .triangle-left {
                top: 5px;
                right: 120px;
                width: 0;
                height: 0;
                border-top: 20px solid transparent;
                border-bottom: 20px solid transparent;
                border-right: 32px solid #fff;
                position: absolute;
                z-index: 99;
            }
            .triangle-left:after {
                content: '';
                width: 0;
                height: 0;
                border-top: 18px solid transparent;
                border-bottom: 18px solid transparent;
                border-right: 30px solid var(--my-status-var);
                position: absolute;
                top: -18px;
                left: 4px;
            }
            .status-text {
                color: #fff;
                font-size: 14px;
                font-weight: 600;
                text-transform: uppercase;
            }
            .progress-bar-container {
                display: flex;
                align-items: center;
                margin-bottom: 0px;
                margin-top: -24px;
            }
            .progress-current {

            }
            .percent-text {
                display:flex;
                align-items: center;
                justify-content: center;
                background-color: #fff;
                border-radius: 50px;
                height: 40px;
                width: 45px;
                border: 2px solid #006e82;
                z-index: 999;
            }
            .button-group {
                position: absolute;
                bottom: -16px;
                left: 0px;
                width: 100%;
            }
            .button-container {
                display: flex;
                align-items: center;
                justify-content: center;
                align-self: center;
                z-index: 999;
            }
            .button-wrapper {
                border-radius: 4px;
                margin: 0 10px;
                color: #fff;
                font-size: 15px;
                font-weight: 600;
                display: flex;
                align-items: center;
                text-align: center;
                justify-content: center;
                text-transform: uppercase;
                width: 40%;
                height: 40px;
                cursor: pointer;
            }
            .farm-btn {
                background-color: #006e82;
            }
            .item {
                margin: 10px;
                position: relative;
                padding-bottom: 80px;
                overflow: visible;
                border: 1px solid #eee;
                border-radius: 8px;
            }
            .item:hover {
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            }
            .item .price {
                color: #006e82;
                font-weight: bold;
                font-size: 20px;
            }
            .title-wrapper {
                padding: 15px;
                background-color: #006e82;
                text-align: center;
                font-size: 16px;
                font-weight: 700;
                color: #fff;
                text-transform: uppercase;
            }
            .title-join {
                margin: 10px 0;
                color: #006e82;
                font-size: 15px;
                font-weight: 600;
                text-transform: uppercase;
                text-align: center;
            }
            .footer-img {
                width: 150px;
                margin: auto;
                margin-top: 5px;
                margin-bottom: 20px;
            }
            .campaign-title {
                font-size: 17px !important;
                text-transform: capitalize;
                line-height: 1.5 !important;
                height: 44px;
            }
        </style>
    </head>
    <body>
        @include('layouts.header')
        <div class="container container-table">
            <div class="row">
                <div class="row main-container">
                    <div class="col-lg-9 col-md-8">
                        <section id="Gslider" class="carousel slide d-none d-md-block d-lg-block" data-ride="carousel">
                            {{-- <ol class="carousel-indicators">
                                @foreach($banners as $key=>$banner)
                                    <li data-target="#Gslider" data-slide-to="{{$key}}" class="{{(($key==0)? 'active' : '')}}"></li>
                                @endforeach
                            </ol> --}}
                            <div class="carousel-inner" role="banner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="https://food-map.s3.ap-southeast-1.amazonaws.com/storage/media/g2J0qyIGDCG6LjEtgdTgVQfGb1kbfdsWrKkP63IH.jpg" alt="MyFarm banner" width="1100" height="500">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="https://food-map.s3.ap-southeast-1.amazonaws.com/storage/media/I9dzq36nVVc6CUsg8mRTS6V1XfNf3bQ486FlHp9h.png" alt="MyFarm banner" width="1100" height="500">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="https://food-map.s3.ap-southeast-1.amazonaws.com/storage/media/g2J0qyIGDCG6LjEtgdTgVQfGb1kbfdsWrKkP63IH.jpg" alt="MyFarm banner" width="1100" height="500">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </section>
                    </div>
                    <div class="col-lg-3 col-md-4 show-992">
                        <div class="box-news">
                            <a class="title-box"><span>Thông tin My Farm</span></a>
                            <div class="list-b-1">
                                <a class="item-group row">
                                    <div class="col-6">
                                        <img class="lazy-hidden img-news" data-lazy-type="image" data-lazy-src="https://food-map.s3.ap-southeast-1.amazonaws.com/storage/media/g2J0qyIGDCG6LjEtgdTgVQfGb1kbfdsWrKkP63IH.jpg" src="https://food-map.s3.ap-southeast-1.amazonaws.com/storage/media/g2J0qyIGDCG6LjEtgdTgVQfGb1kbfdsWrKkP63IH.jpg" importance="high">
                                    </div>
                                    <div class="col-6">
                                        <div class="line-4">Mật ong rừng là gì? Bạn đã biết đến mật ong rừng tại A lưới chưa?</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="box-news">
                            <div class="list-b-1">
                                <a class="item-group row">
                                    <div class="col-6">
                                        <img class="lazy-hidden img-news" data-lazy-type="image" data-lazy-src="https://food-map.s3.ap-southeast-1.amazonaws.com/storage/media/g2J0qyIGDCG6LjEtgdTgVQfGb1kbfdsWrKkP63IH.jpg" src="https://food-map.s3.ap-southeast-1.amazonaws.com/storage/media/g2J0qyIGDCG6LjEtgdTgVQfGb1kbfdsWrKkP63IH.jpg" importance="high">
                                    </div>
                                    <div class="col-6">
                                        <div class="line-4">Mật ong rừng là gì? Bạn đã biết đến mật ong rừng tại A lưới chưa?</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="box-news">
                            <div class="list-b-1">
                                <a class="item-group row">
                                    <div class="col-6">
                                        <img class="lazy-hidden img-news" data-lazy-type="image" data-lazy-src="https://food-map.s3.ap-southeast-1.amazonaws.com/storage/media/g2J0qyIGDCG6LjEtgdTgVQfGb1kbfdsWrKkP63IH.jpg" src="https://food-map.s3.ap-southeast-1.amazonaws.com/storage/media/g2J0qyIGDCG6LjEtgdTgVQfGb1kbfdsWrKkP63IH.jpg" importance="high">
                                    </div>
                                    <div class="col-6">
                                        <div class="line-4">Mật ong rừng là gì? Bạn đã biết đến mật ong rừng tại A lưới chưa?</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($campaign_running) > 0)
                <section id="running-campaign" class="sec-box-white">
                    <div class="entry-head">
                            <span class="menu-text">Chiến dịch đang diễn ra</span>
                    </div>
                    <!-- first -->
                    {{-- <div class="owl-carousel owl-flex s-nav" paramowl="margin=18" style="margin-top: 10px"> --}}
                    <div id="campaign-running" class="carousel slide d-none d-md-block d-lg-block" data-ride="carousel">
                        <div class="slide carousel-inner" role="listbox">
                        @foreach (array_chunk($campaign_running, 6) as $key => $list)
                            <div class="row carousel-item {{(($key==0)? 'active' : '')}}" style="padding: 16px 24px; margin: 0px; display: flex">
                            @foreach ($list as $campaign)
                                @if ($campaign['status'] == "canceled")
                                    @continue
                                @endif
                                @php($percent = (int) ($campaign['sold'] / $campaign['total_products'] * 100))
                                <div class="col-md-2 col-6" style="flex: 0 0 33.3%; max-width: 33.3%; padding:16px">
                                <div class="item">
                                    <a
                                    {{-- href="{{ route('campaign.show', ['slug' => $campaign['slug']]) }}"  --}}>
                                        <img class="lazy-hidden img-full " data-lazy-type="image" data-lazy-src="{{$campaign['thumbnail']}}" src="{{$campaign['thumbnail']}}">
                                    </a>
                                    <div class="progress-bar-container">
                                        <div style="background-color:#006e82; height: 8px ;width: {{$percent}}%"></div>
                                        <div class="percent-text" style="margin-left: {{-18 * ($percent / 100)}}px">
                                            <span style="font-size: 11px; font-weight: 600; text-align: center">{{$percent}}%</span>
                                        </div>
                                        <div style="background-color: #c2c2c2; height: 8px ;width: {{100 - $percent}}%"></div>
                                    </div>
                                    <div class="divtext" style="padding: 0 12px">
                                        <h3 class="line-2 campaign-title">
                                            <a
                                            {{-- href="{{ route('campaign.show', ['slug' => $campaign['slug']]) }}" --}}
                                            >{{$campaign['name']}}</a>
                                        </h3>
                                        <span class="line-2">{{$campaign['short_description']}} </span>
                                        <div class="price" style="margin-bottom: 10px">
                                            {{($campaign['price'])}}
                                        </div>
                                        <div>Ngày bắt đầu: {{ empty($campaign['start_at']) ? '' : Illuminate\Support\Carbon::parse($campaign['start_at'])->format('d/m/Y H:i')}}</div>
                                        <div>Ngày kết thúc: {{ empty($campaign['finished_at']) ? '' : Illuminate\Support\Carbon::parse($campaign['finished_at'])->format('d/m/Y H:i')}}</div>
                                    </div>
                                    <div class="button-group">
                                        <div class="button-container">
                                            <a
                                            {{-- href="{{ route('campaign.show', ['slug' => $campaign['slug']]) }}"  --}}
                                            class="button-wrapper farm-btn button-checkout" data-tab="first" style="{{$percent == 100 ? "cursor: not-allowed" : ""}}">Tham gia</a>
                                            {{-- <a class="button-wrapper farm-btn button-show" data-url_image="{{$campaign['image_info_campaign']}}" data-tab="first">Thông tin</a> --}}
                                        </div>
                                    </div>
                                </div>
                                </div>
                            @endforeach
                            </div>
                        @endforeach
                        </div>
                        @if (count($campaign_running) > 6)
                        <a class="carousel-control-prev" href="#campaign-running" role="button" data-slide="prev">
                            <span class="slide-button-wrapper" style="left: 0">
                                <span class="carousel-control-prev-icon" aria-hidden="true" style="height: 20px"></span>
                                <span class="sr-only">Previous</span>
                            </span>
                        </a>
                        <a class="carousel-control-next" href="#campaign-running" role="button" data-slide="next">
                            <span class="slide-button-wrapper" style="right: 0">
                                <span class="carousel-control-next-icon" aria-hidden="true" style="height: 20px"></span>
                                <span class="sr-only">Next</span>
                            </span>
                        </a>
                        @endif
                    </div>
                </section>
            @else
                <div id="running-campaign"></div>
            @endif

            @if (count($campaign_coming) > 0)
                <section id="running-campaign" class="sec-box-white">
                    <div class="entry-head">
                            <span class="menu-text">Chiến dịch sắp diễn ra</span>
                    </div>
                    <!-- first -->
                    {{-- <div class="owl-carousel owl-flex s-nav" paramowl="margin=18" style="margin-top: 10px"> --}}
                    <div id="campaign-running" class="carousel slide d-none d-md-block d-lg-block" data-ride="carousel">
                        <div class="slide carousel-inner" role="listbox">
                        @foreach (array_chunk($campaign_coming, 6) as $key => $list)
                            <div class="row carousel-item {{(($key==0)? 'active' : '')}}" style="padding: 16px 24px; margin: 0px; display: flex">
                            @foreach ($list as $campaign)
                                @if ($campaign['status'] == "canceled")
                                    @continue
                                @endif
                                @php($percent = (int) ($campaign['sold'] / $campaign['total_products'] * 100))
                                <div class="col-md-2 col-6" style="flex: 0 0 33.3%; max-width: 33.3%; padding:16px">
                                <div class="item">
                                    <a
                                    {{-- href="{{ route('campaign.show', ['slug' => $campaign['slug']]) }}"  --}}>
                                        <img class="lazy-hidden img-full " data-lazy-type="image" data-lazy-src="{{$campaign['thumbnail']}}" src="{{$campaign['thumbnail']}}">
                                    </a>
                                    <div class="progress-bar-container">
                                        <div style="background-color:#006e82; height: 8px ;width: {{$percent}}%"></div>
                                        <div class="percent-text" style="margin-left: {{-18 * ($percent / 100)}}px">
                                            <span style="font-size: 11px; font-weight: 600; text-align: center">{{$percent}}%</span>
                                        </div>
                                        <div style="background-color: #c2c2c2; height: 8px ;width: {{100 - $percent}}%"></div>
                                    </div>
                                    <div class="divtext" style="padding: 0 12px">
                                        <h3 class="line-2 campaign-title">
                                            <a
                                            {{-- href="{{ route('campaign.show', ['slug' => $campaign['slug']]) }}" --}}
                                            >{{$campaign['name']}}</a>
                                        </h3>
                                        <span class="line-2">{{$campaign['short_description']}} </span>
                                        <div class="price" style="margin-bottom: 10px">
                                            {{($campaign['price'])}}
                                        </div>
                                        <div>Ngày bắt đầu: {{ empty($campaign['start_at']) ? '' : Illuminate\Support\Carbon::parse($campaign['start_at'])->format('d/m/Y H:i')}}</div>
                                        <div>Ngày kết thúc: {{ empty($campaign['finished_at']) ? '' : Illuminate\Support\Carbon::parse($campaign['finished_at'])->format('d/m/Y H:i')}}</div>
                                    </div>
                                    <div class="button-group">
                                        <div class="button-container">
                                            <a
                                            {{-- href="{{ route('campaign.show', ['slug' => $campaign['slug']]) }}"  --}}
                                            {{-- class="button-wrapper farm-btn button-checkout" data-tab="first" style="{{$percent == 100 ? "cursor: not-allowed" : ""}}">Tham gia</a> --}}
                                            <a class="button-wrapper farm-btn button-show" data-url_image="{{$campaign['image_info_campaign']}}" data-tab="first">Thông tin</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            @endforeach
                            </div>
                        @endforeach
                        </div>
                        @if (count($campaign_coming) > 6)
                        <a class="carousel-control-prev" href="#campaign-running" role="button" data-slide="prev">
                            <span class="slide-button-wrapper" style="left: 0">
                                <span class="carousel-control-prev-icon" aria-hidden="true" style="height: 20px"></span>
                                <span class="sr-only">Previous</span>
                            </span>
                        </a>
                        <a class="carousel-control-next" href="#campaign-running" role="button" data-slide="next">
                            <span class="slide-button-wrapper" style="right: 0">
                                <span class="carousel-control-next-icon" aria-hidden="true" style="height: 20px"></span>
                                <span class="sr-only">Next</span>
                            </span>
                        </a>
                        @endif
                    </div>
                </section>
            @endif

            @if (count($campaign_finished) > 0)
                <section id="running-campaign" class="sec-box-white">
                    <div class="entry-head">
                            <span class="menu-text">Chiến dịch đã kết thúc</span>
                    </div>
                    <!-- first -->
                    {{-- <div class="owl-carousel owl-flex s-nav" paramowl="margin=18" style="margin-top: 10px"> --}}
                    <div id="campaign-running" class="carousel slide d-none d-md-block d-lg-block" data-ride="carousel">
                        <div class="slide carousel-inner" role="listbox">
                        @foreach (array_chunk($campaign_finished, 6) as $key => $list)
                            <div class="row carousel-item {{(($key==0)? 'active' : '')}}" style="padding: 16px 24px; margin: 0px; display: flex">
                            @foreach ($list as $campaign)
                                @if ($campaign['status'] == "canceled")
                                    @continue
                                @endif
                                @php($percent = (int) ($campaign['sold'] / $campaign['total_products'] * 100))
                                <div class="col-md-2 col-6" style="flex: 0 0 33.3%; max-width: 33.3%; padding:16px">
                                <div class="item">
                                    <a
                                    {{-- href="{{ route('campaign.show', ['slug' => $campaign['slug']]) }}"  --}}>
                                        <img class="lazy-hidden img-full " data-lazy-type="image" data-lazy-src="{{$campaign['thumbnail']}}" src="{{$campaign['thumbnail']}}">
                                    </a>
                                    <div class="progress-bar-container">
                                        <div style="background-color:#006e82; height: 8px ;width: {{$percent}}%"></div>
                                        <div class="percent-text" style="margin-left: {{-18 * ($percent / 100)}}px">
                                            <span style="font-size: 11px; font-weight: 600; text-align: center">{{$percent}}%</span>
                                        </div>
                                        <div style="background-color: #c2c2c2; height: 8px ;width: {{100 - $percent}}%"></div>
                                    </div>
                                    <div class="divtext" style="padding: 0 12px">
                                        <h3 class="line-2 campaign-title">
                                            <a
                                            {{-- href="{{ route('campaign.show', ['slug' => $campaign['slug']]) }}" --}}
                                            >{{$campaign['name']}}</a>
                                        </h3>
                                        <span class="line-2">{{$campaign['short_description']}} </span>
                                        <div class="price" style="margin-bottom: 10px">
                                            {{($campaign['price'])}}
                                        </div>
                                        <div>Ngày bắt đầu: {{ empty($campaign['start_at']) ? '' : Illuminate\Support\Carbon::parse($campaign['start_at'])->format('d/m/Y H:i')}}</div>
                                        <div>Ngày kết thúc: {{ empty($campaign['finished_at']) ? '' : Illuminate\Support\Carbon::parse($campaign['finished_at'])->format('d/m/Y H:i')}}</div>
                                    </div>
                                    <div class="button-group">
                                        <div class="button-container">
                                            <a
                                            {{-- href="{{ route('campaign.show', ['slug' => $campaign['slug']]) }}"  --}}
                                            {{-- class="button-wrapper farm-btn button-checkout" data-tab="first" style="{{$percent == 100 ? "cursor: not-allowed" : ""}}">Tham gia</a> --}}
                                            <a class="button-wrapper farm-btn button-show" data-url_image="{{$campaign['image_info_campaign']}}" data-tab="first">Thông tin</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            @endforeach
                            </div>
                        @endforeach
                        </div>
                        @if (count($campaign_finished) > 6)
                        <a class="carousel-control-prev" href="#campaign-running" role="button" data-slide="prev">
                            <span class="slide-button-wrapper" style="left: 0">
                                <span class="carousel-control-prev-icon" aria-hidden="true" style="height: 20px"></span>
                                <span class="sr-only">Previous</span>
                            </span>
                        </a>
                        <a class="carousel-control-next" href="#campaign-running" role="button" data-slide="next">
                            <span class="slide-button-wrapper" style="right: 0">
                                <span class="carousel-control-next-icon" aria-hidden="true" style="height: 20px"></span>
                                <span class="sr-only">Next</span>
                            </span>
                        </a>
                        @endif
                    </div>
                </section>
            @endif

            <section class="sec-box-white" style="background: transparent; box-shadow: none; margin-bottom: 0px; padding-bottom: 0px">
                <div class="title-wrapper">
                    TẠI SAO NÊN THAM GIA CÙNG CHÚNG TÔI?
                </div>
                <div class="row" style="margin-top:-1px">
                    <img src="https://food-map.s3.ap-southeast-1.amazonaws.com/storage/media/HfUnp6r9L7VfU4F0xVCe80JLB7s1tfjz1hCfFUgb.png" style="width: 100%" alt="">
                </div>
                <div class="button-container" style="margin-top: 20px">
                    <a class="button-wrapper farm-btn button-join" style="width: 280px; font-size: 17px">Tham gia ngay</a>
                </div>
            </section>
        </div>

        @include('layouts.footer')
        <script type='text/javascript'>
            $(document).ready(function(){
                $(".button-join").on('click', function(event) {
                    console.log('join')
                    $('html,body').animate({
                        scrollTop: $("#running-campaign").offset().top - 100
                    }, 1000);
                });
            });

        </script>
    </body>
</html>

