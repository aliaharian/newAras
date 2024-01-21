@php
$lang='en';
@endphp
<!DOCTYPE html>
<html lang="ar">
<head>
    <title>مناشف ارس – شراء روب حمام عبر الإنترنت، منشفة حمام، منشفة  معطف، منشفة للوجه واليدين
    </title>

    <meta name="description"
          content="تنتج علامة مناشف ارس التجارية أنواع روب الحمام، المناشف اليدوية، مناشف المسابح، مناشف الحمام ومعاطف المناشف ومناشف الدعايات وتسعى لنيل استحسان الزبائن الأعزاء عن طريق تقديم منتجات عالية الجودة بأسعار مناسبة.

">

    <meta name="keywords"
          content="المتجر الإلكتروني، التسوق الإلكتروني، منشفة، روب حمام، معطف حمام، منشفة مسبح، حمام، مناشف هدية، مناشف ارس، مناشف الدعايات
عن مناشف ارس – المتجر الالكتروني لمناشف ارس
المدونة- متجر مناشف ارس الالكتروني"/>
    @include('ar.includes.headLinks')
    <script defer src="/js/jquery-bootstrap.js"></script>
    <style>@foreach($template as $temp) @if($temp->place=='slide1') .item1-slick1 { background-image: url('{{$temp->image}}');} @endif @if($temp->place=='slide2') .item2-slick1 { background-image: url('{{$temp->image}}');} @endif @if($temp->place=='slide3') .item3-slick1 { background-image: url('{{$temp->image}}');} @endif @if($temp->place=='slide4') .item4-slick1 { background-image: url('{{$temp->image}}'); } @endif @endforeach</style>

    <style>
        body {
            scrollbar-base-color: transparent !important;
        }

        @foreach($template as $temp) @if($temp->place=='slide1') .item1-slick1 {
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
        }

        @endif @endforeach

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

        .promo-text {
            left: 149px;
            position: absolute;
            right: 149px;
            width: auto;
            padding-right: 68px;
            padding-left: 65px;
            padding-bottom: 30px;
        }

        .promo-image {
            width: auto;
            right: 149px;
            left: 149px;
            padding: 0;
            margin-top: 205px;
            position: absolute;
        }

        .gift-image {
            width: auto;
            right: 149px;
            left: 149px;
            padding: 0;
            margin-top: 145px;
            position: absolute;
        }
        .myhr{
            right: 145px;
            left: 145px;
            position: absolute;
            width: auto;
        }

        .mainheight{
            height: 925px;
        }

        .giftheight{
            height: 525px;
        }

        @media (max-width: 1334px) {
            .promo-image {
                margin-top: 235px;

            }

            .gift-image {
                margin-top: 175px;

            }

        }

        @media (max-width: 1194px) {
            .promo-image {
                margin-top: 265px;

            }
            .gift-image {
                margin-top: 205px;

            }

        }
        @media (max-width: 1078px) {
            .promo-image {
                margin-top: 295px;

            }
            .gift-image {
                margin-top: 235px;

            }

        }
        @media (max-width: 1003px) {
            .promo-image {
                margin-top: 325px;

            }
            .gift-image {
                margin-top: 265px;

            }

        }
        @media (max-width: 992px) {
            .mainheight{
                height: 1260px;
            }
            .giftheight{
                height: 890px;
            }

        }

        @media (max-width: 768px) {
            .mainheight{
                height:auto;
            }
            .giftheight{
                height: auto;
            }
            .promo-image {
                width: unset;
                right: unset;
                left: unset;
                padding: unset;
                position: initial;
                margin-top: 0;

            }
            .gift-image {
                width: unset;
                right: unset;
                left: unset;
                padding: unset;
                position: initial;
                margin-top: 0;
            }

            .promo-text {
                left: unset;
                position: initial;
                right: unset;
                width: unset;
                padding-right: 68px;
                padding-left: 65px;
                padding-bottom: unset;
            }

        }

    </style>

</head>
<body class="animsition loading">
{{--modals--}}
<div class="modalPlace" style="z-index: 1400">

</div>
{{--end modals--}}
@include('ar.includes.header')
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
					 مناشف أرس 100٪ قطن
						</span>

        <h2 class="caption2-slide1 xl-text1 t-center m-b-37 slideText">
            المناشف الأكثر قوة امتصاص في العالم
        </h2>

        <div class="videobutton" data-toggle="modal" data-target="#modal-video-01" onclick="video()">مشاهده کلیپ بافت
            حوله
        </div>
    </div>
</section>
@php
    $agent=new \Jenssegers\Agent\Agent();
@endphp
<section class="banner bgwhite p-t-60 p-b-40" style="background-color: white">
    <div class="container">
        <div class="row direction-rtl mainheight">
            <div class="col-lg-12 col-md-12 padding-15 pt-0 promo-text">
                <h2 class="direction-rtl">
                    <i class="fa fa-circle color-purple ml-5px"></i>
                    <a href="/ar/promotional-towels?ref=homePromo" class="mainpagelink">
                        مناشف الترويجية والدعایات
                    </a>
                </h2>

                <p class="text-right direction-rtl pt-0 bp-0" style="text-align: justify!important;">

                    في عالم التجارة الحدیث ، تحتاج المؤسسات والشركات للإعلان لتصبح معروفة وبالتالي لتصل إلى ذروتها . مناشف أرس مع مجموعة واسعة من التكنولوجيا والمرافق ذات المستوى العالمي ، مع نصف قرن من الخبرة في إنتاج المناشف وتصاميم فريدة من نوعها ، وایضاً مجموعة متنوعة من الألوان ، ونوعية ممتازة وأسعار معقولة ، تضمن تألق وبقاء العلامة التجارية الخاصة بك في الذاکرات. يمكنك بسهولة اختيار الهدية الترويجية التي تريدها وطلبها بأبعاد مختلفة ، بحيث يتم طبع وتسجيل العلامة التجاریة والشعار الخاص بك عليها بعدها
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
                                    <div class="row direction-rtl" style="margin-top: 10px">
                                        <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                     src="<?=Croppa::url($product->logo, 120); ?>"
                                                                                                                     alt=""></div>
                                        <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                    style="font-size: 10px;line-height:33px">{{$product->arabic_name}}</p>
                                        </div>
                                    </div>
                                </div>


                            @endif
                        @endforeach
                    @endforeach

                </div>
                <div class="col-lg-12 col-md-12 padding-15 pt-0">

                    <a href="/ar/promotional-towels?ref=homePromo" style="display: block;margin:auto;bottom:31px"
                       title="حوله های تبلیغاتی" class="wrap-btn-slide1 w-size1 slide-text cat-seemore"
                       data-appear="rotateIn">
                        <div class="slide-insideText" style="margin:auto;">
                            رؤية المزيد من الأمثلة على المناشف الترويجية
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
        <div class="row direction-rtl giftheight">
            <div class="col-lg-12 col-md-12 padding-15 pt-0 promo-text">
                <h2 class="direction-rtl">
                    <i class="fa fa-circle color-purple ml-5px"></i>
                    <a href="/ar/gift-pack?ref=homePromo" class="mainpagelink">
                        مناشف الهدايا
                    </a>
                </h2>

                <p class="text-right direction-rtl pt-0 bp-0" style="text-align: justify!important;">

                    یعد الشعور حین استلام الهدایا أو في وقت اعطاءها للأخرین من أجمل لحظات الحياة . نحن نقدم هذه اللحظات النقية مع مناشف أرس للهدایا. سيتم تغليف مناشف هدایا أرس الجمیلة عند طلبك باستخدام ورق كرافت وأضافات جمیلة أخرى ، وبالتالي ستخلق لحظات لا تنسى لأحبائك. لقد وفرنا الأفضل لك حتى تتمكن من تقدیمها لأصدقائك کهدایا.
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
                                <div class="row direction-rtl" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">مناشف الهدايا </p>
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
                                <div class="row direction-rtl" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">مناشف الهدايا </p>
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
                                <div class="row direction-rtl" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">مناشف الهدايا </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach


                </div>
                <div class="col-lg-12 col-md-12 padding-15 pt-0">

                    <a href="/ar/gift-pack?ref=homePromo" style="display: block;margin:auto;bottom:31px"
                       title="حوله های تبلیغاتی" class="wrap-btn-slide1 w-size1 slide-text cat-seemore"
                       data-appear="rotateIn">
                        <div class="slide-insideText" style="margin:auto;">
                            رؤية المزيد من الأمثلة على المناشف الهدایا
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
        <div class="row direction-rtl mainheight">
            <div class="col-lg-12 col-md-12 padding-15 pt-0 promo-text">
                <h2 class="direction-rtl">
                    <i class="fa fa-circle color-purple ml-5px"></i>
                    <a href="/ar/product?ref=homePromo" class="mainpagelink">
                        مناشف الأبعادیة وروب الحمام
                    </a>
                </h2>

                <p class="text-right direction-rtl pt-0 bp-0" style="text-align: justify!important;">

                    علامة أرس التجاریة ، هي شركة تصنع مناشف اليد ومناشف الخاصة بالمسابح والحمام وایضًا روب الحمام. تم تصميم مناشف الأبعادیة لدينا بحيث يمكن استخدامها بمفردها أو مع بعضها البعض. اشعر بالجمال والرقى والنقاء مع مناشف أرس واستمتع بجمال روب الحمام الجذابة والراحة الفريدة وتمتع بتنوع الألوان والتصاميم الخاصة بها.
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
                                <div class="row direction-rtl" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">مناشف الأبعادیة وروب الحمام </p>
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
                                <div class="row direction-rtl" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">مناشف الأبعادیة وروب الحمام </p>
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
                                <div class="row direction-rtl" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">مناشف الأبعادیة وروب الحمام </p>
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
                                <div class="row direction-rtl" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">مناشف الأبعادیة وروب الحمام </p>
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
                                <div class="row direction-rtl" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">مناشف الأبعادیة وروب الحمام </p>
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
                                <div class="row direction-rtl" style="margin-top: 10px">
                                    <div class="col-md-3 col-sm-3 col-xs-3 col-3" style="padding-left: 5px"><img style="width: 100%"
                                                                                                                 src="<?=Croppa::url($temp->logo, 120); ?>"
                                                                                                                 alt=""></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9 col-9" style="padding-right: 0"><p
                                                style="font-size: 10px;line-height:33px">مناشف الأبعادیة وروب الحمام </p>
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach

                </div>
                <div class="col-lg-12 col-md-12 padding-15 pt-0">

                    <a href="/ar/product?ref=homePromo" style="display: block;margin:auto;bottom:31px"
                       title="حوله های تبلیغاتی" class="wrap-btn-slide1 w-size1 slide-text cat-seemore"
                       data-appear="rotateIn">
                        <div class="slide-insideText" style="margin:auto;">
                            رؤية المزيد من الأمثلة على المناشف الأبعادیة
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
					 شاهد المقطع
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
							<span class="m-text9 p-t-45 fs-20-sm small15px"
                                  style="direction: rtl!important;text-align: center;font-size: 18px;padding-top:140px;">
                            </span>


                        <span class="btn-play s-text4 hov5 cs-pointer p-t-25"
                              style="margin-top: 100px;font-size: 20px;border: 1px white solid;padding: 10px 27px;border-radius: 60px;"
                              data-toggle="modal" data-target="#modal-video-01" onclick="video2()">
					<i class="fa fa-play" aria-hidden="true"></i>
					 شاهد المقطع
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
@include('ar.includes.more-info-footer')
@include('ar.includes.footer')
@include('ar.includes.copyright')

@include('ar.includes.footerLinks')
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
                $(".video").html('<video controls autoplay style="width: 100%;" ><source src="{{$temp->video}}" type="video/mp4"></video>')
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
                $(".video").html('<video controls autoplay style="width: 100%;" ><source src="{{$temp->video}}" type="video/mp4"></video>')
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
                data: {lang: "ar"},
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
