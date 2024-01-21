@php
    $lang='en';
@endphp
        <!DOCTYPE html>
<html lang="en-us">
<head>
    <title>Aras Towel - Towel online shopping, Bath Towels, Bathrobe towels, Hand and face wash towels.</title>

    <meta name="description"
          content="
 Aras Towel Brand, Manufacturer of all Types of Towels, Hand washing towel, Bathrobe towel, tries to make customers satisfied
 by providing quality products at reasonable prices.

">

    <meta name="keywords"
          content=" Online store, online shopping, towels, bathrobe, coats, pool, bath, gift towels, Aras' towels, promotional towels.
"/>
    @include('en.includes.headLinks')
    <script defer src="/js/jquery-bootstrap.js"></script>
    <style> @foreach($template as $temp) @if($temp->place=='englishSlide') .item0-slick1 {
            background-image: url('{{$temp->image}}');
        }

        @endif  @if($temp->place=='slide1') .item1-slick1 {
            background-image: url('{{$temp->image}}');
        }

        @endif @if($temp->place=='slide2') .item2-slick1 {
            background-image: url('{{$temp->image}}');
        }

        @endif @if($temp->place=='slide3') .item3-slick1 {
            background-image: url('{{$temp->image}}');
        }

        @endif @if($temp->place=='slide4') .item4-slick1 {
            background-image: url('{{$temp->image}}');
        } @endif @endforeach</style>

    <style>
        .modal-backdrop {
            z-index: -1;
        }

        .instagram {
            background-color: white !important;
        }

        body {
            overflow-y: -moz-scrollbars-vertical;
            overflow-x: hidden;

        }

        body::-webkit-scrollbar {
            width: 0;
            background-color: transparent;
        }

        :-moz-any(#content,#appcontent) browser {
            margin-right: -14px !important;
            overflow-y: scroll;
            margin-bottom: -14px !important;
            overflow-x: scroll;
        }

        .flex-container {
            display: flex;
            flex-wrap: nowrap
        }

        .flex-container > div {
            width: 100px;
            margin: 60px 10px
        }

        .main_menu {
            direction: ltr !important
        }

        .direction-ltr {
            direction: ltr !important
        }

        .founderdesc {
            text-align: left;
            font-size: 12px;
            flex-grow: 6;
            margin: 62px 42px 69px 15px !important;
            padding-right: 25px;
            padding-top: 9px
        }

        @media screen and (max-width: 450px) {
            .founderdesc {
                font-size: 11px;
                flex-grow: 20;
                padding-right: 0
            }

            .flex-container > div {
                margin: 55px 10px
            }
        }

        @media screen and (max-width: 500px) {
            .founderdesc {
                font-size: 11px;
                flex-grow: 20;
                padding-right: 0
            }

            .flex-container > div {
                margin: 55px 10px
            }
        }

        @media (max-width: 770px) and (min-width: 576px) {
            .founderdesc {
                font-size: 11px;
                flex-grow: 20;
                padding-right: 0
            }

            .flex-container > div {
                margin: 25px 10px
            }
        }

        @media (max-width: 1199px) and (min-width: 771px) {
            .flex-container > div {
                margin: 25px 10px
            }
        }


        .videobutton {
            font-family: 'iranSans';
            font-size: 14px;
            line-height: 50px;
            text-align: center;
            left: 145px;
            position: absolute;
            width: 200px;
            height: 50px;
            background: #942683;
            top: 6px;
            border-radius: 10px;
            display: block;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .videobutton:hover {
            color: white;
        }

        /* Two */
        .videobutton {
            color: white !important;

            background-repeat: no-repeat;
            background-position: -200px -200px, -50px -50px;

            background-image: -webkit-linear-gradient(
                    top left,
                    rgba(255, 255, 255, 0.0) 0%,
                    rgba(255, 255, 255, 0.1) 37%,
                    rgba(255, 255, 255, 0.8) 45%,
                    rgba(255, 255, 255, 0.0) 50%
            );

            -moz-background-size: 250% 250%, 100% 100%;
            background-size: 250% 250%, 100% 100%;

            -webkit-transition: background-position 0s ease;
            -moz-transition: background-position 0s ease;
            -o-transition: background-position 0s ease;
            transition: background-position 0s ease;
        }

        .videobutton:hover {
            color: white !important;
            background-position: 0 0, 0 0;
            -webkit-transition-duration: 0.5s;
            -moz-transition-duration: 0.5s;
            transition-duration: 0.5s;
        }

        @media (max-width: 940px) {
            .videobutton {
                display: none;
            }
        }
    </style>
</head>

<body class="animsition loading">
{{--modals--}}
<div class="modalPlace" style="z-index: 1400">

</div>
{{--end modals--}}
@include('en.includes.header')
<section class="slide1">
    <div class="wrap-slick1">
        <div class="slick1">


            @foreach($template as $temp)

                @if($temp->place=='slide1')
                    <div class="item-slick1 item1-slick1">
                        <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">


                            {{--<a href="/promotional-towels?ref=slide" title="سفارش حوله های تبلیغاتی" class="wrap-btn-slide1 w-size1 slide-text" data-appear="zoomIn">--}}
                            {{--<div class="slide-insideText">برای سفارش حوله های تبلیغاتی کلیک کنید</div>--}}

                            {{--</a>--}}
                        </div>
                    </div>
                @endif

                @if($temp->place=='slide2')

                    <div class="item-slick1 item1-slick1">
                        <div class="item-slick1 item2-slick1">
                            <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">

                                {{--<a href="/promotional-towels?ref=slide" title="سفارش حوله های تبلیغاتی" class="wrap-btn-slide1 w-size1 slide-text" data-appear="slideInUp">--}}
                                {{--<div class="slide-insideText">برای سفارش حوله های تبلیغاتی کلیک کنید</div>--}}

                                {{--</a>--}}
                            </div>
                        </div>
                    </div>
                @endif
                @if($temp->place=='slide3')


                    <div class="item-slick1 item1-slick1">
                        <div class="item-slick1 item3-slick1">
                            <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">


                                {{--<a href="/promotional-towels?ref=slide" title="سفارش حوله های تبلیغاتی" class="wrap-btn-slide1 w-size1 slide-text" data-appear="rotateIn">--}}
                                {{--<div class="slide-insideText">برای سفارش حوله های تبلیغاتی کلیک کنید</div>--}}

                                {{--</a>--}}
                            </div>
                        </div>
                    </div>
                @endif
                @if($temp->place=='slide4')


                    <div class="item-slick1 item1-slick1">
                        <div class="item-slick1 item4-slick1">
                            <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">


                                {{--<a href="/promotional-towels?ref=slide" title="سفارش حوله های تبلیغاتی" class="wrap-btn-slide1 w-size1 slide-text" data-appear="rotateIn">--}}
                                {{--<div class="slide-insideText">برای سفارش حوله های تبلیغاتی کلیک کنید</div>--}}

                                {{--</a>--}}
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
</section>
<section class="banner bgwhite p-t-40 p-b-40" style="background-color: #c788bc;height: 150px;" id="cat-section">
    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-50 p-b-170" style="position: relative">

						<span class="caption1-slide1 m-text1 t-center m-b-15">
					Aras’ towel 100% Cotton !
						</span>

        <h2 class="caption2-slide1 xl-text1 t-center m-b-37 slideText">
            THIRSTY TOWEL OF WORLD
        </h2>

        <div class="videobutton" data-toggle="modal" data-target="#modal-video-01" onclick="video()">see clip
        </div>
    </div>
</section>
@php
    $agent=new \Jenssegers\Agent\Agent();
@endphp
<section class="banner bgwhite p-t-60 p-b-40" style="background-color: white">
    <div class="container">
        <div class="row mainheight">
            <div class="col-lg-12 col-md-12 padding-15 pt-0 promo-text">
                <h2>
                    <i class="fa fa-circle color-purple ml-5px"></i>

                    <a href="/en/promotional-towels?ref=homePromo" class="mainpagelink">
                        Promotional towels
                    </a>

                </h2>

                <p class=" pt-0 bp-0 text-justify">

                    Nowadays, organizations and large companies are coerced to advertise to gain fame and excellence. Having vast and updated technology and facilities, and semi-centennial experience in manufacturing different types of towels in different and unique patterns, adverse colors, high quality, and reasonable prices, ARAS towels will guarantee your brand's brilliance, permanency, and continuity. You will be able to choose your desired promotional gift and order in different sizes; with your logo imprinted on it.
                </p>


            </div>


            <div class="col-lg-12 col-md-12 padding-15 pt-0 promo-image">

                <div class="row homerow">
                    @php $c=0; @endphp
                    @foreach($proproducts as $product)
                        @foreach($product->categories as $category)
                            @if($category->english_name=='promotional-towel' && $c<6)
                                @php $c+=1; @endphp
                                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12 padding-15">
                                    <a href="#" data-toggle="modal" data-target="#img_popup"
                                       onclick="modal('{{$product->image}}')">
                                        <img src="<?=Croppa::url($product->image, 545, 362); ?>" class="mainpage-img"
                                             alt="حوله های تبلیغاتی ارس">
                                    </a>
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                     src="<?=Croppa::url($product->logo, 120); ?>"
                                                                                                                     alt=""></div>
                                        <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                    style="font-size: 10px;line-height:33px">{{$product->english_name}}</p>
                                        </div>
                                    </div>
                                </div>


                            @endif
                        @endforeach
                    @endforeach

                </div>
                <div class="col-lg-12 col-md-12 padding-15 pt-0">

                    <a href="/en/promotional-towels?ref=homePromo" style="display: block;margin:auto;bottom:31px"
                       title="حوله های تبلیغاتی" class="wrap-btn-slide1 w-size1 slide-text cat-seemore"
                       data-appear="rotateIn">
                        <div class="slide-insideText" style="margin:auto;">
                            See more examples of promotional towels
                        </div>
                    </a>
                </div>


            </div>

        </div>
    </div>

</section>

<hr class="myhr">


<section class="banner bgwhite p-t-60 p-b-40" style="background-color: white">
    <div class="container">
        <div class="row giftheight">
            <div class="col-lg-12 col-md-12 padding-15 pt-0 promo-text">
                <h2>
                    <i class="fa fa-circle color-purple ml-5px"></i>

                    <a href="/en/gift-pack?ref=homePromo" class="mainpagelink">
                        Gift towels
                    </a>

                </h2>

                <p class=" pt-0 bp-0 text-justify">
                    One of the rich experiences in our lives is the moment we receive or give a gift. Unique and fascinating gifts provided by ARAS towels, having used Kraft papers and other unique ornaments will be packed according to your order and will inscribe an unforgettable memory in your dearests' minds. We have provided the best, so you gift them to your best friends.
                </p>


            </div>


            <div class="col-lg-12 col-md-12 padding-15 pt-0 gift-image">

                <div class="row homerow">

                    @foreach($template as $temp)
                        @if($temp->place=='gift1')
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12 padding-15">
                                <a href="#" data-toggle="modal" data-target="#img_popup"
                                   onclick="modal('{{$temp->image}}')">
                                    <img src="<?=Croppa::url($temp->image, 545, 362); ?>" class="mainpage-img"
                                         alt="حوله های تبلیغاتی ارس">
                                </a>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">Aras Gift Towels</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach

                    @foreach($template as $temp)
                        @if($temp->place=='gift2')
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12 padding-15">
                                <a href="#" data-toggle="modal" data-target="#img_popup"
                                   onclick="modal('{{$temp->image}}')">
                                    <img src="<?=Croppa::url($temp->image, 545, 362); ?>" class="mainpage-img"
                                         alt="حوله های تبلیغاتی ارس">
                                </a>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">Aras Gift Towels</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach

                    @foreach($template as $temp)
                        @if($temp->place=='gift3')
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12 padding-15">
                                <a href="#" data-toggle="modal" data-target="#img_popup"
                                   onclick="modal('{{$temp->image}}')">
                                    <img src="<?=Croppa::url($temp->image, 545, 362); ?>" class="mainpage-img"
                                         alt="حوله های تبلیغاتی ارس">
                                </a>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">Aras Gift Towels</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach


                </div>
                <div class="col-lg-12 col-md-12 padding-15 pt-0">

                    <a href="/en/gift-pack?ref=homePromo" style="display: block;margin:auto;bottom:31px"
                       title="حوله های تبلیغاتی" class="wrap-btn-slide1 w-size1 slide-text cat-seemore"
                       data-appear="rotateIn">
                        <div class="slide-insideText" style="margin:auto;">
                            See more examples of <br>gift towels
                        </div>
                    </a>
                </div>


            </div>

        </div>
    </div>
</section>

<hr class="myhr">

<section class="banner bgwhite p-t-60 p-b-40" style="background-color: white">
    <div class="container">
        <div class="row mainheight">
            <div class="col-lg-12 col-md-12 padding-15 pt-0 promo-text">
                <h2>
                    <i class="fa fa-circle color-purple ml-5px"></i>
                    <a href="/en/product?ref=homePromo" class="mainpagelink">
                        Dimensional and clothing towels
                    </a>
                </h2>

                <p class=" pt-0 bp-0" style="text-align: justify!important;">
                    ARAS towels manufacture different kinds of hand towels, pool towels, bathing towels, dressing gown, and clothing towels. Our dimensional towels have designed in a way that one can use them as desired. Experience the beauty, delicacy, and purity by taking ARAS towels in your hands. Experience an incomparable beauty and comfort by wearing it, and enjoy the diverse patterns and colors of our products.
                </p>


            </div>


            <div class="col-lg-12 col-md-12 padding-15 pt-0 gift-image">

                <div class="row homerow">
                    @foreach($template as $temp)
                        @if($temp->place=='bath1')
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12 padding-15">
                                <a href="#" data-toggle="modal" data-target="#img_popup"
                                   onclick="modal('{{$temp->image}}')">
                                    <img src="<?=Croppa::url($temp->image, 545, 362); ?>" class="mainpage-img"
                                         alt="حوله های تبلیغاتی ارس">
                                </a>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">Aras clothing towels </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach

                    @foreach($template as $temp)
                        @if($temp->place=='bath2')
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12 padding-15">
                                <a href="#" data-toggle="modal" data-target="#img_popup"
                                   onclick="modal('{{$temp->image}}')">
                                    <img src="<?=Croppa::url($temp->image, 545, 362); ?>" class="mainpage-img"
                                         alt="حوله های تبلیغاتی ارس">
                                </a>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">Aras clothing towels </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach

                    @foreach($template as $temp)
                        @if($temp->place=='bath3')
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12 padding-15">
                                <a href="#" data-toggle="modal" data-target="#img_popup"
                                   onclick="modal('{{$temp->image}}')">
                                    <img src="<?=Croppa::url($temp->image, 545, 362); ?>" class="mainpage-img"
                                         alt="حوله های تبلیغاتی ارس">
                                </a>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">Aras clothing towels </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach

                    @foreach($template as $temp)
                        @if($temp->place=='bath4')
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12 padding-15">
                                <a href="#" data-toggle="modal" data-target="#img_popup"
                                   onclick="modal('{{$temp->image}}')">
                                    <img src="<?=Croppa::url($temp->image, 545, 362); ?>" class="mainpage-img"
                                         alt="حوله های تبلیغاتی ارس">
                                </a>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">Aras clothing towels </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach

                    @foreach($template as $temp)
                        @if($temp->place=='bath5')
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12 padding-15">
                                <a href="#" data-toggle="modal" data-target="#img_popup"
                                   onclick="modal('{{$temp->image}}')">
                                    <img src="<?=Croppa::url($temp->image, 545, 362); ?>" class="mainpage-img"
                                         alt="حوله های تبلیغاتی ارس">
                                </a>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">Aras clothing towels </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach

                    @foreach($template as $temp)
                        @if($temp->place=='bath6')
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 col-12 padding-15">
                                <a href="#" data-toggle="modal" data-target="#img_popup"
                                   onclick="modal('{{$temp->image}}')">
                                    <img src="<?=Croppa::url($temp->image, 545, 362); ?>" class="mainpage-img"
                                         alt="حوله های تبلیغاتی ارس">
                                </a>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">Aras clothing towels </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach

                </div>
                <div class="col-lg-12 col-md-12 padding-15 pt-0">

                    <a href="/en/product?ref=homePromo" style="display: block;margin:auto;bottom:31px"
                       title="حوله های تبلیغاتی" class="wrap-btn-slide1 w-size1 slide-text cat-seemore"
                       data-appear="rotateIn">
                        <div class="slide-insideText" style="margin:auto;">see more examples of dimensional towels
                        </div>
                    </a>
                </div>


            </div>

        </div>
    </div>

</section>




<!-- Banner2 -->
<section class="banner2 bg5">
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
                <div class="hov-img-zoom pos-relative">
                    @foreach($template as $temp)

                        @if($temp->place=='video')

                            <img data-src="{{$temp->image}}" width="540" alt="تضمین کیفیت و سلامتی با حوله ارس">
                        @endif
                    @endforeach
                    <div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
                        {{--<span class="m-text9 p-t-45 fs-20-sm small15px"--}}
                        {{--style="direction: rtl!important;text-align: center;font-size: 18px">حوله های تبلیغاتی تاثیر بسیار خوبی بر توسعه کسب و کار دارد. همراه با گذشت زمان و اهمیت مردم نسبت به مسائل زیبایی شناختی، حوله های تبلیغاتی تبدیل به محصول جدید و خلاقانه ای شده اند. حوله های تبلیغاتی با استفاده از نخ های پنبه صد در صد طبیعی و تنوع رنگ و شکل های مختلف (حتی اشکال فانتزی) باعث می شود هریک از دریافت کنندگان احساس و تجربه بصری خوبی داشته باشند.--}}

                        {{--</span>--}}


                        <span class="btn-play s-text4 hov5 cs-pointer p-t-25"
                              style="margin-top: 260px;font-size: 20px;border: 1px white solid;padding: 10px 27px;border-radius: 60px;"
                              data-toggle="modal" data-target="#modal-video-01" onclick="video()">
					<i class="fa fa-play" aria-hidden="true"></i>
					see Clip
				</span>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-video-01" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-body video">
                        </div>

                    </div>

                </div>
            </div>


            <div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15">
                <div class="hov-img-zoom pos-relative">
                    @foreach($template as $temp)

                        @if($temp->place=='video2')

                            <img data-src="{{$temp->image}}" width="540" alt="تضمین کیفیت و سلامتی با حوله ارس">
                        @endif
                    @endforeach
                    <div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15">
                        {{--<span class="m-text9 p-t-45 fs-20-sm small15px"--}}
                        {{--style="direction: rtl!important;text-align: center;font-size: 18px">حوله های تبلیغاتی تاثیر بسیار خوبی بر توسعه کسب و کار دارد. همراه با گذشت زمان و اهمیت مردم نسبت به مسائل زیبایی شناختی، حوله های تبلیغاتی تبدیل به محصول جدید و خلاقانه ای شده اند. حوله های تبلیغاتی با استفاده از نخ های پنبه صد در صد طبیعی و تنوع رنگ و شکل های مختلف (حتی اشکال فانتزی) باعث می شود هریک از دریافت کنندگان احساس و تجربه بصری خوبی داشته باشند.--}}

                        {{--</span>--}}


                        <span class="btn-play s-text4 hov5 cs-pointer p-t-25"
                              style="margin-top: 260px;font-size: 20px;border: 1px white solid;padding: 10px 27px;border-radius: 60px;"
                              data-toggle="modal" data-target="#modal-video-01" onclick="video2()">
					<i class="fa fa-play" aria-hidden="true"></i>
					See Clip
				</span>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>


<!-- Instagram -->
<div class="loadinsta">

</div>




<!-- Shipping -->


<!-- Footer -->
@include('en.includes.more-info-footer')
@include('en.includes.footer')
@include('en.includes.copyright')

@include('en.includes.footerLinks')
<script defer>
    window.addEventListener("load", function () {
        for (var e = document.getElementsByTagName("img"), t = 0; t < e.length; t++) e[t].getAttribute("data-src") && e[t].setAttribute("src", e[t].getAttribute("data-src"))
    }, !1), $("body").on("hidden.bs.modal", ".modal", function () {
        $("video").trigger("pause")
    }), jQuery(document).ready(function () {
        jQuery("#newsletter").click(function (e) {
            "" !== $("#email-news").val() && ($body = $("body"), $(document).on({
                ajaxStart: function () {
                    $body.addClass("loading")
                }, ajaxStop: function () {
                    $body.removeClass("loading")
                }
            }), jQuery.ajax({
                url: "{{ route('newsletter') }}",
                method: "get",
                data: {email: $("#email-news").val()},
                success: function (e) {
                    console.log("newsletterOk")
                }
            }))
        })
    }), $("#newsletter").each(function () {
        $(this).on("click", function () {
            "" !== $("#email-news").val() && swal("ایمیل شما", "با موفقیت به خبرنامه افزوده شد", "success")
        })
    }), $(document).ready(function () {
    });
</script>


<script defer type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "Aras Towel - حوله ارس",
            "image": "https://arastowel.com/svg/final.svg",
            "@id": "https://www.arastowel.com",
            "url": "https://www.arastowel.com",
            "telephone": "+982188932768",
            "priceRange": "IRR",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "تهران - خیابان استاد نجات اللهی (ویلا) - بین خیابان انقلاب و سمیه - کوچه سلمان پاک - پلاک ۱۰ - واحد ۳ - حوله ارس",
                "addressLocality": "تهران",
                "postalCode": "1599674815",
                "addressCountry": "IR"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": 35.70298844842775,
                "longitude": 51.415042339358486
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Saturday",
                    "Sunday"
                ],
                "opens": "09:00",
                "closes": "18:00"
            },
            "sameAs": [
                "https://instagram.com/arastowel/",
                "https://www.linkedin.com/in/arastowel/",
                "https://t.me/arastowel",
                "https://www.facebook.com/Arastowel/",
                "https://twitter.com/TowelAras",
            ]
        }


</script>
@foreach($products as $product)
    @foreach($product->off as $off)
        @if($off->special==1)
            @php($end=$off->end)
        @endif
    @endforeach
@endforeach

@foreach($template as $temp)
    @if($temp->place=='video')
        <script defer type="text/javascript">
            function video() {
                $(".video").html('<video controls style="width: 100%;" ><source src="{{$temp->video}}" type="video/mp4"></video>')
            }


            $("#countDown").countdown("{{@$end}}", function (t) {
                $(this).html(t.strftime('<div class="flex-col-c-m size3 countdown m-l-5 m-r-5">\n\t\t\t\t\t\t\t\t\t<span class="m-text10 p-b-1 days">\n\t\t\t\t\t\t\t\t\t\t%D\n\t\t\t\t\t\t\t\t\t</span>\n\n\t\t\t\t\t\t\t\t<span class="s-text5">\n\t\t\t\t\t\t\t\t\t\tروز\n\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t</div>\n\n\t\t\t\t\t\t\t<div class="flex-col-c-m size3 countdown m-l-5 m-r-5">\n\t\t\t\t\t\t\t\t\t<span class="m-text10 p-b-1 hours">\n\t\t\t\t\t\t\t\t\t\t%H\n\t\t\t\t\t\t\t\t\t</span>\n\n\t\t\t\t\t\t\t\t<span class="s-text5">\n\t\t\t\t\t\t\t\t\t\tساعت\n\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t</div>\n\n\t\t\t\t\t\t\t<div class="flex-col-c-m size3 countdown m-l-5 m-r-5">\n\t\t\t\t\t\t\t\t\t<span class="m-text10 p-b-1 minutes">\n\t\t\t\t\t\t\t\t\t\t%M\n\t\t\t\t\t\t\t\t\t</span>\n\n\t\t\t\t\t\t\t\t<span class="s-text5">\n\t\t\t\t\t\t\t\t\t\tدقیقه\n\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t</div>\n\n\t\t\t\t\t\t\t<div class="flex-col-c-m size3 countdown m-l-5 m-r-5">\n\t\t\t\t\t\t\t\t\t<span class="m-text10 p-b-1 seconds">\n\t\t\t\t\t\t\t\t\t\t%S\n\t\t\t\t\t\t\t\t\t</span>\n\n\t\t\t\t\t\t\t\t<span class="s-text5">\n\t\t\t\t\t\t\t\t\t\tثانیه\n\t\t\t\t\t\t\t\t\t</span>\n\t\t\t\t\t\t\t</div>'))
            });
        </script>
    @endif
@endforeach
@foreach($template as $temp)
    @if($temp->place=='video2')
        <script defer type="text/javascript">
            function video2() {
                $(".video").html('<video controls style="width: 100%;" ><source src="{{$temp->video}}" type="video/mp4"></video>')
            }
        </script>
    @endif
@endforeach
<script defer type="text/javascript">
    $(document).ready(function () {
        var o = !1;
        $(window).scroll(function () {
            var t = $(window).scrollTop();
            $("#cat-section").offset().top - t <= 0 && !1 === o && (o = !0, jQuery.ajax({
                url: "{{ route('php-file') }}",
                method: "get",
                data: {lang: "en"},
                success: function (o) {
                    $(".loadinsta").html(o)
                }
            }))
        })
    });
</script>
<script>
    function modal(d, l) {
        $(".modalPlace").html('<div id="img_popup" class="modal fade" style="background-color: rgba(0,0,0,0.5);z-index: 1400;" role="dialog">\n    <div class="modal-dialog" style="max-width: 743px">\n        <div class="modal-content" style="margin-top:14% ">\n            <div class="modal-body">\n                <p><img style="width: 100%" src="' + d + '"/> </p>\n            </div>\n        </div>\n    </div>\n</div>')
    }
</script>
</body>
</html>
