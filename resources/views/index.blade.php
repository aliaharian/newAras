@php
    $lang='en';
@endphp
    <!DOCTYPE html>
<html lang="fa">
<head>
    <link rel="alternate" hreflang="en-us" href="https://arastowel.com/en">

    <link rel="alternate" hreflang="ar" href="https://arastowel.com/ar">
    <link rel="alternate" href="https://arastowel.com/" hreflang="x-default">

    <title>حوله ارس - خرید اینترنتی حوله تن پوش، حوله حمام، پالتویی، حوله دست و صورت</title>

    <meta name="description"
          content="برند حوله ارس، تولیدکننده انواع حوله های پالتویی، دستی، استخری، حمام و حوله های تن پوش و تبلیغاتی تلاش می کند تا با ارایه محصولاتی باکیفیت و با قیمت مناسب رضایت شما مشتریان عزیز را جلب نماید.">

    <meta name="keywords"
          content="فروشگاه اینترنتی, خرید آنلاین، حوله, تن پوش, پالتویی, استخری, حمام,  حوله های هدیه,  حوله ارس، حوله های تبلیغاتی"/>
    @include('includes.headLinks')
    <script defer src="/js/jquery-bootstrap.js"></script>
    <style>
        body {
            scrollbar-base-color: transparent !important;
        }

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


        .promo-text {
            max-width: 70%;
            margin: 40px auto 60px;
        }

        .promo-image {
            width: auto;
            padding: 0;
        }

        .gift-image {
            padding: 0;
        }

        @media (max-width: 950px) {
            .promo-text {
                max-width: 100%;
                margin: 0px;
            }
        }


        @media (max-width: 992px) {
            .mainheight {
                height: 1260px;
            }

            .giftheight {
                height: 890px;
            }

        }

        @media (max-width: 768px) {
            .mainheight {
                height: auto;
            }

            .giftheight {
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

        }

    </style>

</head>
<body class="animsition loading">
{{--modals--}}
<div class="modalPlace" style="z-index: 1400">

</div>
{{--end modals--}}
@include('includes.header')

<section class="introSectionHome">
    <div>
        @foreach($template as $temp)
            @if($temp->place=='introLeft')
                <img src="{{$temp->image}}" title="حوله تبلیغاتی ارس" alt="حوله تبلیغاتی ارس"/>
            @endif
        @endforeach
        <div>
            <h2 class="introTitle">
                تشنه ترین حوله دنیا!
            </h2>
            <p class="introSubTitle">
                حوله ارس صد درصد پنبه
            </p>
            <div class="introButton" data-toggle="modal" data-target="#modal-video-01" onclick="video()">مشاهده کلیپ
                بافت
                حوله
            </div>
        </div>
    </div>
    <div style="display: flex;justify-content: center">

        @foreach($template as $temp)
            @if($temp->place=='introRight')
                <img id="introRightImg" style="display: none" src="" title="حوله تبلیغاتی ارس" alt="حوله تبلیغاتی ارس"/>
                <img id="introRightImgLoader" style="max-width: 40px;" src="/files/loading.gif"/>
            @endif
        @endforeach
    </div>
</section>

@php
    $agent=new \Jenssegers\Agent\Agent();
@endphp
<section class="banner bgwhite p-t-60 p-b-40" style="background-color: white">
    <div>
        <div class="row direction-rtl mainheight">
            <div class="col-lg-12 col-md-12 padding-15 pt-0 promo-text">
                <h2 class="direction-rtl text-center" style="margin-bottom: 15px;">
                    <!--<i class="fa fa-circle color-purple ml-5px"></i>-->
                    <a href="/promotional-towels?ref=homePromo" class="mainpagelink" style="font-size:24px">
                        حوله های تبلیغاتی
                    </a>
                </h2>

                <p class="text-center direction-rtl pt-0 bp-0" style="font-size:12px">

                    هدیه ‌های تبلیغاتی کاربردی، ملموس و مناسب، نشان دهنده اعتبار و کیفیت شرکت ‌های بزرگ و هوشمند است.
                    شرکت حوله ارس به این اصل مهم بازاریابی اعتقاد دارد که یک هدیه تبلیغاتی نامناسب، بیش از آنکه به
                    اعتبار برند کمک کند به آن آسیب می‌رساند. بنابراین حوله‌ هایی کاربردی با موارد استفاده بسیار متنوعی
                    را طراحی کرده است تا انتقال دهنده سلیقه ناب، کیفیت و اصالت برند شما به مشتریانتان باشد.
                    حوله ارس با در اختیار داشتن امکانات وسیع و مجهز به تکنولوژی روز دنیا، و
                    با نیم قرن تجربه در تولید انواع حوله، با نقش ها و طرح های بی نظیر، تنوع رنگ و با کیفیت عالی و
                    قیمت مناسب، درخشش ، دوام و بقای نام تجاری شما را فراهم می سازد. شما می توانید به راحتی هدیه
                    تبلیغاتی موردنظر خود را انتخاب کنید و در ابعاد مختلف سفارش دهید؛ طوری که برندو لوگوی شرکت شما بر
                    روی آن حک گردد.
                </p>


            </div>


            <div class="col-lg-12 col-md-12 padding-15 pt-0 promo-image">

                <div class="gridContainer" style="margin-bottom:50px">
                    @foreach($template as $temp)
                        @if($temp->place=='promo1')
                            <div class="singleGrid">

                                <img data-toggle="modal" data-target="#img_popup"
                                     onclick="modal('{{$temp->image}}')"
                                     src="<?=Croppa::url($temp->image, 590, 590); ?>"
                                     alt="{{$temp->text}}">
                                @php
                                    $names = explode("|",$temp->text)
                                @endphp
                                <h3>{{$names[0]}}</h3>
                                <p>{{$names[1]}}</p>
                                <a href="/promotional-towels?ref=homePromo" class="homepageMoreLink">مشاهده بیشتر</a>

                            </div>
                        @endif

                    @endforeach
                    @foreach($template as $temp)
                        @if($temp->place=='promo2')
                            <div class="singleGrid">

                                <img data-toggle="modal" data-target="#img_popup"
                                     onclick="modal('{{$temp->image}}')"
                                     src="<?=Croppa::url($temp->image, 590, 590); ?>"
                                     alt="{{$temp->text}}">
                                @php
                                    $names = explode("|",$temp->text)
                                @endphp
                                <h3>{{$names[0]}}</h3>
                                <p>{{$names[1]}}</p>
                                <a href="/promotional-towels?ref=homePromo" class="homepageMoreLink">مشاهده بیشتر</a>

                            </div>
                        @endif

                    @endforeach
                    @foreach($template as $temp)
                        @if($temp->place=='promo3')
                            <div class="singleGrid">

                                <img data-toggle="modal" data-target="#img_popup"
                                     onclick="modal('{{$temp->image}}')"
                                     src="<?=Croppa::url($temp->image, 590, 590); ?>"
                                     alt="{{$temp->text}}">
                                @php
                                    $names = explode("|",$temp->text)
                                @endphp
                                <h3>{{$names[0]}}</h3>
                                <p>{{$names[1]}}</p>
                                <a href="/promotional-towels?ref=homePromo" class="homepageMoreLink">مشاهده بیشتر</a>

                            </div>
                        @endif

                    @endforeach

                </div>
                <div class="col-lg-12 col-md-12 padding-15 pt-0">

                    <a href="/promotional-towels?ref=homePromo" style="display: block;margin:auto;bottom:31px"
                       title="حوله های تبلیغاتی" class="wrap-btn-slide1 w-size1 slide-text cat-seemore"
                       data-appear="rotateIn">
                        <div class="slide-insideText" style="margin:auto;"> نمونه کار های حوله های
                            تبلیغاتی
                        </div>
                    </a>
                </div>


            </div>

        </div>
    </div>

</section>

<!--<hr class="myhr">-->


<section class="banner bgwhite p-t-60 p-b-40" style="background-color: #eff5f5">
    <div>
        <div class="row direction-rtl giftheight">
            <div class="col-lg-12 col-md-12 padding-15 pt-0 promo-text">
                <h2 class="direction-rtl text-center" style="margin-bottom: 15px;">
                    <!--<i class="fa fa-circle color-purple ml-5px"></i>-->
                    <a href="/gift-pack?ref=homePromo" class="mainpagelink" style="font-size:24px">
                        حوله های هدیه
                    </a>
                </h2>

                <p class="text-center direction-rtl pt-0 bp-0" style="font-size:12px">

                    حس خوب هدیه دادن و هدیه گرفتن، از لحظات شیرین زندگی است.ما با بسته های هدیه حوله ارس این لحظات ناب
                    را برای شما فراهم می سازیم. هدیه های زیبا و بی نظیر حوله ارس، با استفاده از کاغذ کرافت و دیگر
                    تزیینات خاص، به سفارش شما بسته بندی خواهد شد و خاطره ای به یاد ماندنی برای عزیزانتان رقم خواهد زد.
                    ما برترین ها را برای شما تدارک دیده ایم تا شما آن را به بهترین دوستانتان هدیه دهید
                </p>


            </div>


            <div class="col-lg-12 col-md-12 padding-15 pt-0 gift-image">

                <div class="gridContainer" style="margin-bottom:50px">

                    @foreach($template as $temp)
                        @if($temp->place=='gift1')

                            <div class="singleGrid">
                                <a title="حوله هدیه"
                                   href="/product/244/%D8%AD%D9%88%D9%84%D9%87-%D8%AF%D8%B3%D8%AA%DB%8C-%D8%A7%D8%B1%D8%B3-%D9%85%D8%AF%D9%84-%D9%88%DB%8C%D9%86-%28%D9%87%D8%AF%DB%8C%D9%87%29-%D8%B3%D8%A7%DB%8C%D8%B2-%DB%B4%DB%B0*%DB%B6%DB%B0-%D8%B3%D8%A7%D9%86%D8%AA%DB%8C-%D9%85%D8%AA%D8%B1-%D8%A8%D8%B3%D8%AA%D9%87-2-%D8%B9%D8%AF%D8%AF%DB%8C">
                                    <img
                                        {{--                                    data-toggle="modal" data-target="#img_popup"--}}
                                        {{--                                     onclick="modal('{{$temp->image}}')"--}}
                                        src="<?=Croppa::url($temp->image, 590, 590); ?>"
                                        alt="حوله های تبلیغاتی ارس">
                                    @php
                                        $names = explode("|",$temp->text)
                                    @endphp
                                    <h3>{{$names[0]}}</h3>
                                    <p>{{$names[1]}}</p>
                                    <a href="/product/244/%D8%AD%D9%88%D9%84%D9%87-%D8%AF%D8%B3%D8%AA%DB%8C-%D8%A7%D8%B1%D8%B3-%D9%85%D8%AF%D9%84-%D9%88%DB%8C%D9%86-%28%D9%87%D8%AF%DB%8C%D9%87%29-%D8%B3%D8%A7%DB%8C%D8%B2-%DB%B4%DB%B0*%DB%B6%DB%B0-%D8%B3%D8%A7%D9%86%D8%AA%DB%8C-%D9%85%D8%AA%D8%B1-%D8%A8%D8%B3%D8%AA%D9%87-2-%D8%B9%D8%AF%D8%AF%DB%8C"
                                       class="homepageMoreLink">مشاهده بیشتر</a>
                                </a>
                            </div>
                        @endif

                    @endforeach

                    @foreach($template as $temp)
                        @if($temp->place=='gift2')

                            <div class="singleGrid">
                                <a title="حوله هدیه"
                                   href="/product/245/%D8%AD%D9%88%D9%84%D9%87-%D8%AF%D8%B3%D8%AA%DB%8C-%D8%A7%D8%B1%D8%B3-%7C-MR-&-MRS-%7C--%D8%B3%D8%A7%DB%8C%D8%B2-40*60-%D8%A8%D8%B3%D8%AA%D9%87-2-%D8%B9%D8%AF%D8%AF%DB%8C">

                                    <img data-toggle="modal" data-target="#img_popup"
                                         onclick="modal('{{$temp->image}}')"
                                         src="<?=Croppa::url($temp->image, 590, 590); ?>"
                                         alt="حوله های تبلیغاتی ارس">
                                    @php
                                        $names = explode("|",$temp->text)
                                    @endphp
                                    <h3>{{$names[0]}}</h3>
                                    <p>{{$names[1]}}</p>
                                    <a href="/product/245/%D8%AD%D9%88%D9%84%D9%87-%D8%AF%D8%B3%D8%AA%DB%8C-%D8%A7%D8%B1%D8%B3-%7C-MR-&-MRS-%7C--%D8%B3%D8%A7%DB%8C%D8%B2-40*60-%D8%A8%D8%B3%D8%AA%D9%87-2-%D8%B9%D8%AF%D8%AF%DB%8C"
                                       class="homepageMoreLink">مشاهده بیشتر</a>

                                </a>
                            </div>
                        @endif

                    @endforeach

                    @foreach($template as $temp)
                        @if($temp->place=='gift3')

                            <div class="singleGrid">
                                <a title="حوله هدیه"
                                   href="/product/244/%D8%AD%D9%88%D9%84%D9%87-%D8%AF%D8%B3%D8%AA%DB%8C-%D8%A7%D8%B1%D8%B3-%D9%85%D8%AF%D9%84-%D9%88%DB%8C%D9%86-%28%D9%87%D8%AF%DB%8C%D9%87%29-%D8%B3%D8%A7%DB%8C%D8%B2-%DB%B4%DB%B0*%DB%B6%DB%B0-%D8%B3%D8%A7%D9%86%D8%AA%DB%8C-%D9%85%D8%AA%D8%B1-%D8%A8%D8%B3%D8%AA%D9%87-2-%D8%B9%D8%AF%D8%AF%DB%8C">

                                    <img
                                        {{--                                        data-toggle="modal" data-target="#img_popup"--}}
                                        {{--                                         onclick="modal('{{$temp->image}}')"--}}
                                        src="<?=Croppa::url($temp->image, 590, 590); ?>"
                                        alt="حوله های تبلیغاتی ارس">
                                    @php
                                        $names = explode("|",$temp->text)
                                    @endphp
                                    <h3>{{$names[0]}}</h3>
                                    <p>{{$names[1]}}</p>
                                    <a href="/product/244/%D8%AD%D9%88%D9%84%D9%87-%D8%AF%D8%B3%D8%AA%DB%8C-%D8%A7%D8%B1%D8%B3-%D9%85%D8%AF%D9%84-%D9%88%DB%8C%D9%86-%28%D9%87%D8%AF%DB%8C%D9%87%29-%D8%B3%D8%A7%DB%8C%D8%B2-%DB%B4%DB%B0*%DB%B6%DB%B0-%D8%B3%D8%A7%D9%86%D8%AA%DB%8C-%D9%85%D8%AA%D8%B1-%D8%A8%D8%B3%D8%AA%D9%87-2-%D8%B9%D8%AF%D8%AF%DB%8C"
                                       class="homepageMoreLink">مشاهده بیشتر</a>

                                </a>
                            </div>
                        @endif

                    @endforeach


                </div>
                <div class="col-lg-12 col-md-12 padding-15 pt-0">

                    <a href="/gift-pack?ref=homePromo" style="display: block;margin:auto;bottom:31px"
                       title="حوله های تبلیغاتی" class="wrap-btn-slide1 w-size1 slide-text cat-seemore"
                       data-appear="rotateIn">
                        <div class="slide-insideText" style="margin:auto;"> نمونه کار های حوله های
                            هدیه
                        </div>
                    </a>
                </div>


            </div>

        </div>
    </div>
</section>


<section class="banner bgwhite p-t-60 p-b-40" style="background-color: white">
    <div>
        <div class="row direction-rtl mainheight">
            <div class="col-lg-12 col-md-12 padding-15 pt-0 promo-text">
                <h2 class="direction-rtl text-center" style="margin-bottom: 15px;">
                    <!--<i class="fa fa-circle color-purple ml-5px"></i>-->
                    <a href="/promotional-towels?ref=homePromo" class="mainpagelink" style="font-size:24px">
                        حوله های ابعادی و تن پوش
                    </a>
                </h2>

                <p class="text-center direction-rtl pt-0 bp-0" style="font-size:12px">

                    برند حوله ارس، تولید کننده انواع حوله دست و صورت، استخری، حمام، پالتویی و تن پوش است. حوله های
                    ابعادی ما به گونه ای طراحی شده اند که هریک به تنهایی یا با یکدیگر قابل استفاده اند. با در دست
                    داشتن حوله های ارس، زیبایی، لطافت و پاکی را احساس کنید و با برتن کردن حوله های تن پوش، زیبایی
                    چشم نواز و راحتی بی نظیر آن را تجربه کنید و از تنوع رنگ ها و طرح های آنها لذت ببرید.
                </p>


            </div>


            <div class="col-lg-12 col-md-12 padding-15 pt-0 gift-image">

                <div class="gridContainer" style="margin-bottom:50px">
                    @foreach($template as $temp)
                        @if($temp->place=='bath1')
                            <div class="singleGrid">
                                <!--<a href="#" data-toggle="modal" data-target="#img_popup"-->
                            <!--   onclick="modal('{{$temp->image}}')">-->
                                <img src="<?=Croppa::url($temp->image, 590, 590); ?>" data-toggle="modal"
                                     data-target="#img_popup"
                                     onclick="modal('{{$temp->image}}')"
                                     alt="حوله های تبلیغاتی ارس">
                                <!--</a>-->
                                @php
                                    $names = explode("|",$temp->text)
                                @endphp
                                <h3>{{$names[0]}}</h3>
                                <p>{{$names[1]}}</p>
                                <a href="/promotional-towels?ref=homePromo" class="homepageMoreLink">مشاهده بیشتر</a>
                            </div>
                        @endif

                    @endforeach

                    @foreach($template as $temp)
                        @if($temp->place=='bath2')
                            <div class="singleGrid">

                                <img src="<?=Croppa::url($temp->image, 590, 590); ?>" data-toggle="modal"
                                     data-target="#img_popup"
                                     onclick="modal('{{$temp->image}}')"
                                     alt="حوله های تبلیغاتی ارس">
                                @php
                                    $names = explode("|",$temp->text)
                                @endphp
                                <h3>{{$names[0]}}</h3>
                                <p>{{$names[1]}}</p>
                                <a href="/promotional-towels?ref=homePromo" class="homepageMoreLink">مشاهده بیشتر</a>

                            </div>
                        @endif

                    @endforeach

                    @foreach($template as $temp)
                        @if($temp->place=='bath3')
                            <div class="singleGrid">

                                <img src="<?=Croppa::url($temp->image, 590, 590); ?>" data-toggle="modal"
                                     data-target="#img_popup"
                                     onclick="modal('{{$temp->image}}')"
                                     alt="حوله های تبلیغاتی ارس">

                                @php
                                    $names = explode("|",$temp->text)
                                @endphp
                                <h3>{{$names[0]}}</h3>
                                <p>{{$names[1]}}</p>
                                <a href="/promotional-towels?ref=homePromo" class="homepageMoreLink">مشاهده بیشتر</a>

                            </div>
                        @endif

                    @endforeach

                </div>
                <div class="col-lg-12 col-md-12 padding-15 pt-0">

                    <a href="/promotional-towels?ref=homePromo" style="display: block;margin:auto;bottom:31px"
                       title="حوله های تبلیغاتی" class="wrap-btn-slide1 w-size1 slide-text cat-seemore"
                       data-appear="rotateIn">
                        <div class="slide-insideText" style="margin:auto;">
                            نمونه کار های
                            حوله های
                            ابعادی
                        </div>
                    </a>
                </div>


            </div>

        </div>
    </div>

</section>


<!-- Banner2 -->
<section class="banner2 bg5" style="background-color:#e3f2e5;padding:25px 0;">
    <div>
        <div class="row">
            <div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15 homeVideo1">
                <div class="hov-img-zoom pos-relative">
                    @foreach($template as $temp)

                        @if($temp->place=='video')

                            <img data-src="{{$temp->image}}" width="540" alt="تضمین کیفیت و سلامتی با حوله ارس">
                        @endif
                    @endforeach
                    <div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15"
                         style="border-radius:14px;background-color:rgba(0,0,0,0.4);">
                        <img title="حوله تبلیغاتی ارس" alt="حوله تبلیغاتی ارس" src="/images/playIcon.svg"
                             style="width:60px !important;cursor:pointer" data-toggle="modal"
                             data-target="#modal-video-01" onclick="video()"/>

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


            <div class="col-sm-10 col-md-8 col-lg-6 m-l-r-auto p-t-15 p-b-15 homeVideo2">
                <div class="hov-img-zoom pos-relative">
                    @foreach($template as $temp)

                        @if($temp->place=='video2')

                            <img data-src="{{$temp->image}}" width="540" alt="تضمین کیفیت و سلامتی با حوله ارس">
                        @endif
                    @endforeach
                    <div class="ab-t-l sizefull flex-col-c-m p-l-15 p-r-15"
                         style="border-radius:14px;background-color:rgba(0,0,0,0.4);">
                        <img title="حوله تبلیغاتی ارس" alt="حوله تبلیغاتی ارس" src="/images/playIcon.svg"
                             style="width:60px !important;cursor:pointer;"
                             data-toggle="modal" data-target="#modal-video-01" onclick="video2()"/>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>


<!-- Instagram -->
<div class="loadinsta">

</div>


<section class="homeBlogSection  p-t-40 p-b-60">
    <div class="sec-title p-b-35">
        <h3 class="m-text5 t-center">
            بلاگ
        </h3>
    </div>

    <div>
        <div class="gridContainer">
            @foreach($posts as $post)
                <div class="singleGrid">
                    <img title="{{$post->title}}" alt="{{$post->title}}" src="{{$post->image}}"/>
                    <h3>{{$post->title}}</h3>
                    <a href="/blog/{{$post->id}}/{{str_replace(' ','-',$post->title)}}"
                       title="مشاهده مقاله {{$post->title}}" class="homepageMoreLink">مشاهده بیشتر</a>
                </div>


            @endforeach
        </div>

    </div>
</section>


<!-- Footer -->
@include('instaCarousel')
@include('includes.more-info-footer')
@include('includes.footer')
@include('includes.copyright')

@include('includes.footerLinks')
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
       <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "حوله تبلیغاتی ارس | aras towel",
  "image": "https://arastowel.com/images/footer/footerLogo.svg",
  "@id": "arastowel.com",
  "url": "https://arastowel.com",
  "telephone": "+989121331044",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "استاد نجات اللهی کوچه سلمان پاک",
    "addressLocality": "Tehran",
    "postalCode": "1599674815",
    "addressCountry": "IR",
    "addressRegion": "Tehran"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": "35.7028692",
    "longitude": "51.4149565"
  },
  "sameAs": [
    "https://www.instagram.com/arastowel/",
    "https://www.facebook.com/Arastowel/",
    "https://www.pinterest.com/arastowel/",
    "https://www.linkedin.com/in/arastowel?trk=hp-identity-name",
    "https://twitter.com/ArasTowel",
    "https://www.youtube.com/channel/UCbPadIvVrH0MIciIZz52SGA"
  ],
  "openingHoursSpecification": [
    {
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
    }
  ]
}













</script>


</script>

@foreach($template as $temp)
    @if($temp->place=='video')
        <script defer type="text/javascript">
            function video() {
                $(".video").html('<video controls autoplay style="width: 100%;" ><source src="{{$temp->video}}" type="video/mp4"></video>')
            }
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
<script>
    function modal(d, l) {
        $(".modalPlace").html('<div id="img_popup" class="modal fade" style="background-color: rgba(0,0,0,0.5);z-index: 1400;" role="dialog">\n    <div class="modal-dialog" style="max-width: 743px">\n        <div class="modal-content" style="margin-top:14% ">\n            <div class="modal-body">\n                <p><img title="حوله تبلیغاتی ارس" alt="حوله تبلیغاتی ارس" style="width: 100%" src="' + d + '"/> </p>\n            </div>\n        </div>\n    </div>\n</div>')
    }
</script>

<script>
    $(window).on("load", () => {
        const worker = new Worker('./js/worker.js')
        @foreach($template as $temp)
        @if($temp->place=='introRight')
        worker.postMessage("{{$temp->image}}");
        @endif
        @endforeach
        // URL.createObjectURL(image)
        worker.onmessage = (e) => {
            if (e.data.name === "introRight") {
                // console.log("url", URL.createObjectURL(e.data.value))
                $("#introRightImg").attr("src", URL.createObjectURL(e.data.value))
                $("#introRightImg").css("display", "block")
                $("#introRightImgLoader").css("display", "none")

            }
        }
        // console.log("dsvsdvsvd")
    })


</script>
</body>
</html>
