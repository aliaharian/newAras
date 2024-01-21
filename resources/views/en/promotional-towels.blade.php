<!DOCTYPE html>
<html lang="en-us">
<head>
    <title>Aras towel - Aras promotional towels , best choice for organizations and corporations</title>
    <link rel="canonical" href="https://arastowel.com/en-promotional-towels"/>

    <meta name="description" content="We are equipped with a wide array of facilities and world class technology to present your desired woven logos, and patterns on towels. It should be noted that our advertising towels in a variety of sizes, designs and colors are able to compete with the best of foreign towels brands.
">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    @include('en.includes.headLinks')
    <script defer src="/js/jquery-bootstrap.js"></script>

    <style>

        .item .image {
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
        }

        .item .middle {
            transition: .3s ease;
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            text-align: center;
        }

        .item:hover .middle {
            opacity: 0.7;
        }

        .text {
            direction: ltr;
            height: 100%;
            width: 100%;
            transition: .5s ease;
            text-align: left;
            transform: translateY(80%);
            font-family: roya;
            color: white;
            font-size: 16px;
            padding: 16px 32px;
            letter-spacing: 4px;
        }

        .item:hover .text {
            letter-spacing: 0;
        }

        @media (max-width: 460px) {
            .order-form {
                margin-left: 10px !important;

            }
        }

        @media (max-width: 430px) {
            .order-form {
                margin-left: 0 !important;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body class="animsition loading">
@php
    $agent=new \Jenssegers\Agent\Agent();
@endphp
@if(!$agent->isMobile() && !$agent->isTablet())
    <div class="modal fade" id="myModal" role="dialog" style="z-index: 999999">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="width: 565px;">

                <div class="modal-body">
                    @foreach($template as $temp)

                        @if($temp->place=='promotionalImage')
                            <img src="{{$temp->image}}" style="width: 100%">
                        @endif
                    @endforeach
                </div>

            </div>

        </div>
    </div>
@endif

@include('en.includes.header')


<!-- Title Page -->
@foreach($template as $temp)

    @if($temp->place=='promotionalHeader')
        <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{$temp->image}});">

            @endif
            @endforeach
        </section>

        <!-- content page -->
        <section class="bgwhite p-t-16 p-b-38">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 p-b-2">

                        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: 51px;">
                            <!-- Indicators -->


                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    @foreach($template as $temp)

                                        @if($temp->place=='promotionalImage')
                                            <img src="/files/promotional/detailpromo.jpg" data-toggle="modal"
                                                 data-target="#myModal"
                                                 style="cursor: pointer">
                                        @endif
                                    @endforeach
                                </div>


                            </div>

                            @php
                                $agent=new \Jenssegers\Agent\Agent();
                            @endphp
                            @if(!$agent->isMobile() && !$agent->isTablet())
                                <div class="modal fade" id="myModalgol" role="dialog" style="z-index: 999999">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content" style="width: 565px;">

                                            <div class="modal-body">
                                                <img src="/images/goldoozi.jpg" style="width: 100%;">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            @endif

                            <div style="margin-bottom: 25px">
                                <!-- Indicators -->


                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="/images/goldoozi.jpg" class="image"
                                             style="width:100%;margin-top: 82px;">
                                        <div class="middle" data-toggle="modal" data-target="#myModalgol"
                                             style="cursor: pointer;">
                                            <div class="text">Embroidery on advertising towels</div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-8 p-b-2">
                        <h1 class="m-text26 p-t-15 p-b-16"
                            style="text-align: left!important;padding-top: 50px;padding-bottom: 15px;">
                            Promotional Towels
                        </h1>
                        <div class="p-b-28" style="direction: ltr!important;text-align: justify!important;">
                            <p>
                                Our special offer for your promotional gifts:

                            </p>
                            <p>
                                Aras' towels, with the full range of technologies available in the world today, offers the best promotional service to our valued customers.
                            </p>

                                            <p>
                                Putting your logo and designs on your towel is our specialty.

                            </p>

                                            <p>
                                Promotional towels in a variety of sizes, designs, and eye-catching colors compete with the best towels in the world.
                            </p>

                                            <p>
                                Our kinds of promotional towels are presented in the best quality and in the following ways:
                            </p>

                                            <p>
                            -    Promotional towels with logo texture on the border and surface of the towel

                            </p>

                                            <p>
                                - Promotional towels with logo texture on the border alone or on the surface alone

                            </p>

                                            <p>
                                - Promotional towels with reactive printing

                            </p>

                                            <p>
                                - Promotional towels with embroidery, especially for low numbers

                            </p>

                                            <p>
                                It should be noted that in order to provide a variety of tastes, the material and texture style of Aras' towels are diverse and are presented in the following ways:

                            </p>

                                            <p>
                                - thread both side towels (non-velvet loop), both sides of the towel have the same shape.
                            </p>

                                            <p>
                                Types of the thread:
                            </p>

                                            <p>
                                - Rings  thread 20.2, 100% cotton

                            </p>

                                            <p>
                                - Open  thread 20.2, 100% cotton

                            </p>

                                            <p>
                                The thread is not rough and recommended.
                            </p>

                                            <p>
                                All designs and colors on our site are noteworthy.
                            </p>

                            <p>
                                <img src="data:image/png;base64,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bnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1sbnM6ZXhpZj0iaHR0cDovL25zLmFkb2JlLmNvbS9leGlmLzEuMC8iIHhtcDpDcmVhdGVEYXRlPSIyMDE4LTExLTA0VDE0OjE2OjAyKzAzOjMwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAxOC0xMS0yM1QxMTo0ODoxMCswMzozMCIgeG1wOk1ldGFkYXRhRGF0ZT0iMjAxOC0xMS0yM1QxMTo0ODoxMCswMzozMCIgZGM6Zm9ybWF0PSJpbWFnZS9wbmciIHBob3Rvc2hvcDpDb2xvck1vZGU9IjMiIHBob3Rvc2hvcDpJQ0NQcm9maWxlPSJEaXNwbGF5IiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjgzODkwMjUzLTliNjUtNGQ1NS05NWYzLTEwMGM3Yzg4N2M4ZCIgeG1wTU06RG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOjI0YTA2ZTZkLTBiMjUtZTg0MS1iMTI3LTEzZTQzZDY3MmE4NSIgeG1wTU06T3JpZ2luYWxEb2N1bWVudElEPSJ4bXAuZGlkOjZjOWU1YjkyLTlkZTYtNDU0Yi04OGE2LTkwYzMyNTNkMWNiOSIgZXhpZjpQaXhlbFhEaW1lbnNpb249IjE5NCIgZXhpZjpQaXhlbFlEaW1lbnNpb249IjIwMCI+IDx4bXBNTTpIaXN0b3J5PiA8cmRmOlNlcT4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjZjOWU1YjkyLTlkZTYtNDU0Yi04OGE2LTkwYzMyNTNkMWNiOSIgc3RFdnQ6d2hlbj0iMjAxOC0xMS0wNFQxNDoxNzoxOSswMzozMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIENDIChNYWNpbnRvc2gpIiBzdEV2dDpjaGFu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"
                                     style="width:20px"/> +98 21 8893 2768 &nbsp;<br/>
                                <img src="/files/mobile_footer-20x36.png" style="margin-left:3px;width:20px"/> +98 912
                                725 7962&nbsp;</p>

                            <p><img src="/files/mailfooter-20x13.png" style="margin-left:3px;width:20px"/><a
                                        href="mailto:info@arastowel.com"> info[at]arastowel.com </a></p>

                            <a href="https://arastowel.com/en/blog/7"
                               style="display: inline-block;text-align: center;line-height: 40px;width: 280px;height: 40px;border-radius: 5px;"
                               class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                                click here for more information
                            </a>
                            {{--<a href="{{route('order-en-promotional-towels')}}" style="display: inline-block;text-align: center;line-height: 40px;margin-left: 30px;width: 200px;height: 40px;border-radius: 5px;" class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4 order-form">--}}
                            {{--فرم ثبت سفارش حوله های تبلیغاتی--}}
                            {{--</a>--}}

                        </div>


                    </div>
                </div>
                <div class="row" id="promo-row">


                    @foreach($products as $product)
                        @foreach($product->categories as $category)
                            @if($category->english_name=='promotional-towel')
                                @php
                                    $agent=new \Jenssegers\Agent\Agent();
                                @endphp
                                @if(!$agent->isMobile() && !$agent->isTablet())
                                    <div class="modal fade" id="myModal{{$product->id}}" role="dialog"
                                         style="z-index: 999999">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content" style="width: 565px;">

                                                <div class="modal-body">
                                                    <img alt="{{$product->english_name}}" src="{{$product->image}}"
                                                         style="width: 100%">
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                @endif

                                <div class="col-md-4 getheight">
                                    <div style="margin-bottom: 25px">
                                        <!-- Indicators -->


                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">
                                            <div class="item active">
                                                <img src="{{$product->image}}" alt="{{$product->english_name}}"
                                                     class="image" style="width:100%;">
                                                <div class="middle" data-toggle="modal"
                                                     data-target="#myModal{{$product->id}}" style="cursor: pointer;">
                                                    <div class="text">{{$product->english_name}}</div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endforeach

                </div>
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-4 col-sm-4 col-xs-4 col-4"></div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-xs-4 col-4" style="margin-top: 40px">
                        {{--@if($products->count()>3)--}}

                        {{--<button onclick="showAll()"--}}
                        {{--class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">--}}
                        {{--بارگذاری بیشتر--}}

                        {{--</button>--}}
                        {{--@endif--}}
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-4 col-sm-4 col-xs-4 col-4"></div>
                </div>
            </div>
        </section>


        <!-- Footer -->
        @include('en.includes.footer')
        @include('en.includes.copyright')

        @include('en.includes.footerLinks')

        {{--<script>--}}
        {{--var orgHeight=0;--}}
        {{--var height=0;--}}
        {{--$(window).on('load', function () {--}}
        {{--height = $('.getheight').outerHeight();--}}
        {{--orgHeight = $('#promo-row').outerHeight();--}}

        {{--$('#promo-row').css('height', height + 'px');--}}
        {{--$('#promo-row').css('overflow', 'hidden');--}}

        {{--});--}}

        {{--function showAll() {--}}
        {{--window.setInterval(function(){--}}
        {{--var nowHeight = $('#promo-row').outerHeight();--}}
        {{--if(nowHeight<orgHeight){--}}
        {{--nowHeight=nowHeight+10;--}}
        {{--$('#promo-row').css('height', nowHeight + 'px');--}}
        {{--}--}}
        {{--}, 8);--}}
        {{--}--}}

        {{--$(window).on('resize', function(){--}}
        {{--$('#promo-row').css('height', 'auto');--}}
        {{--height = $('.getheight').outerHeight();--}}
        {{--orgHeight = $('#promo-row').outerHeight();--}}


        {{--});--}}
        {{--</script>--}}

</body>
</html>
