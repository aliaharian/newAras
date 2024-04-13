<!DOCTYPE html>
<html lang="fa">
<head>
    <title>مشخصات ، قیمت و خرید {{$product->name}} | فروشگاه اینترنتی حوله ارس</title>
    <link rel="canonical"
          href="{{route('shop.product',['product_id'=>$product->id,'product_name'=>str_replace('"','',preg_replace_callback("/\\\\u([a-f0-9]{4})/iu", function($m){return iconv('UCS-4LE','UTF-8',pack('V', hexdec('U'.$m[1])));}, json_encode(str_replace(' ','-',$product->name))))])}}"/>
    <meta name="description"
          content=" خرید اینترنتی {{$product->name}} و قیمت انواع @foreach($product->categories as $category) {{$category->name}} @endforeach از فروشگاه آنلاین حوله ارس . جدیدترین @foreach($product->categories as $category) {{$category->name}} @endforeach با بهترین قیمت در حوله ارس">
    <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/"/>
    <link rel="schema.DCTERMS" href="http://purl.org/dc/terms/"/>

    <meta property="og:site_name" content="فروشگاه اینترنتی حوله ارس"/>
    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:type" content="product"/>
    <meta property="og:title" content="{{$product->name}}"/>
    <meta property="og:url"
          content="{{route('shop.product',['product_id' => $product->id , 'product_name'=>str_replace(' ','-',$product->name)])}}"/>
    <meta property="og:image" content="{{$product->image}}"/>
    <meta property="og:image:secure_url" content="{{$product->image}}"/>
    <meta property="og:image:width" content="720">
    <meta property="og:image:height" content="960">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:alt" content="{{$product->name}}"/>
    <link rel="image_src" href="{{$product->image}}"/>
    <meta property="product:condition" content="new">
    <meta property="product:availability" content="in stock">
    <meta property="og:updated_time" content="{{$product->updated_at}}"/>


    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>

    <meta name="twitter:card" content="product"/>
    <meta name="twitter:site" content="@ArasTowel"/>
    <meta name="twitter:creator" content="حوله ارس"/>
    <meta name="twitter:title" content="{{$product->name}}"/>
    <meta name="twitter:image" content="{{$product->image}}"/>
    <meta http-equiv="content-language" content="fa"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="DC.Identifier"
          content="{{route('shop.product',['product_id' => $product->id , 'product_name'=>str_replace(' ','-',$product->name)])}}"/>
    <meta name="DC.Type" content="image"/>
    <meta name="DC.Title" content="{{$product->name}}"/>
    <meta name="DC.Language" content="fa"/>
    <meta name="robots" content="index, follow"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/product_detail.css">
    @include('includes.headLinks')

    <script defer src="/js/jquery-bootstrap.js"></script>


    {{--    load images--}}
    <script>
        $(document).ready(() => {
            const worker = new Worker('../../js/worker.js')
            worker.postMessage({
                work: "loadProductGallery",
                id: "{{$product->id}}",
                galleryId: "0",
                name: "originalImage",
                url: "{{str_replace("/files/","/getFile/files/",$product->image)}}?w=900&h=900"
            })
            @foreach($product->galleries as $gallery)
            worker.postMessage({
                work: "loadProductGallery",
                id: "{{$product->id}}",
                name: "thumbSmall",
                galleryId: "{{$gallery->id}}",
                url: "{{str_replace("/files/","/getFile/files/",$gallery->address)}}?w=100&h=100&blur=10"
            })
            @endforeach
            @foreach($product->galleries as $gallery)
            worker.postMessage({
                work: "loadProductGallery",
                id: "{{$product->id}}",
                name: "thumbBig",
                galleryId: "{{$gallery->id}}",
                url: "{{str_replace("/files/","/getFile/files/",$gallery->address)}}?w=300&h=300&blur=5"
            })
            @endforeach
            @foreach($product->galleries as $gallery)
            worker.postMessage({
                work: "loadProductGallery",
                id: "{{$product->id}}",
                name: "originalImage",
                galleryId: "{{$gallery->id}}",
                url: "{{str_replace("/files/","/getFile/files/",$gallery->address)}}?w=900&h=900"
            })
            @endforeach

                worker.onmessage = (e) => {
                if (e.data.work === "loadProductGallery") {
                    const elem = $(`#gallery${e.data.id}${e.data.galleryId}`);
                    let flag = false;
                    if (e.data.name === "thumbSmall" && !elem.hasClass("thumbBig") && !elem.hasClass("fullyLoaded")) {
                        flag = true
                    } else if (e.data.name === "thumbBig" && !elem.hasClass("fullyLoaded")) {
                        flag = true
                    } else if (e.data.name === "originalImage") {
                        flag = true
                    }

                    if (flag) {
                        // console.log("url", URL.createObjectURL(e.data.value))
                        elem.attr("src", URL.createObjectURL(e.data.value))
                        elem.css("max-width", "unset")
                        elem.css("margin", "unset")
                        switch (e.data.name) {
                            case "thumbSmall":
                                elem.addClass("thumbSmall")
                                break;
                            case "thumbBig":
                                elem.removeClass("thumbSmall")
                                elem.addClass("thumbBig")
                                break;
                            case "originalImage":
                                elem.removeClass("thumbSmall")
                                elem.removeClass("thumbBig")
                                elem.addClass("fullyLoaded")
                                $(`#overlay${e.data.id}${e.data.galleryId}`).remove();
                                break;
                        }
                    }
                }
            }
        })


    </script>


    <style>
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .c-ui-variant__shape {
            border: 1px solid #bbb7b7;
            width: 30px;
            height: 30px;
            position: absolute;
            right: 0;
            top: 0;
            border-radius: 50%;
        }

        .c-ui-variant {
            float: right;
            margin-right: 13px;
            margin-top: 6px;
            width: 43px;
            height: 50px;
            display: inline-block;
            position: relative;
            margin-bottom: 10px;
            margin-left: 13px;

        }

        .c-ui-variant__shape_selected {
            border: 3px solid #e7e7e7 !important;
            box-shadow: 0 0 11px 0 rgba(0, 0, 0, 0.5);
        }

        .c-ui-variant__shape_selected_after {
            content: '';
            border: solid 2px red;
            position: absolute;
            width: 40px;
            height: 40px;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
        }

        .newprice {
            display: inline-block;
            direction: rtl;
            color: purple;
        }

        .line-through {
            text-decoration: line-through !important;
            display: inline-block;
            direction: rtl;
        }

        .inherit-display {
            display: inline-block;
        }

        .displaynone {
            display: none;
        }

        input[type=radio] {
            opacity: 0;
            position: absolute;
        }

        .c-ui-variant--color .c-ui-variant__check {
            font-weight: normal;
            font-family: roya;
            color: black;
            padding-right: 38px;
            padding-bottom: 6px;
            font-size: 14px;
        }

        .c-ui-variant__check {
            cursor: pointer;
            border: 1px solid #dedede;
            border-radius: 5px;
            color: #6f6f6f;
            padding: 5px 16px;
            font-size: 13px;
            font-size: .929rem;
            line-height: 1.692;
            display: block;
        }

        .selected {
            border: 2px solid purple;
            border-radius: 50%;

        }

        .color-header {
            font-size: 15px;
            margin-bottom: 11px;
            direction: rtl;

            font-weight: 800;
        }

        .color-name {
            text-align: center;
            font-size: 11px;
            width: 60px;
            display: block;
            transform: translate(14px, 40px);
            font-family: 'roya';
            color: #14334c;
            visibility: hidden;
            line-height: 1;
        }

        .color-hover:hover > .color-name {
            visibility: visible;
        }

        .visible {
            visibility: visible;
        }

        .big {
            font-size: 1.2em;
        }

        .small {
            font-size: .7em;
        }

        .square {
            width: .7em;
            height: .7em;
            margin: .5em;
            display: inline-block;
        }

        /* Custom dropdown */
        .custom-dropdown {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            width: 85%;
        }

        .custom-dropdown select {
            width: 100%;
            background-color: #fff;
            color: #000;
            font-size: inherit;
            padding: 1.5em;
            padding-right: 2.5em;
            border: 1px solid #d2d1d1;
            margin: 0;
            border-radius: 3px;
            text-indent: 0.01px;
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            text-align: left !important;
            text-align-last: left !important;
            text-align: -moz-left !important;
            text-align: -webkit-left !important;
            -ms-text-align-last: left !important;
            -moz-text-align-last: left !important;

        }

        .custom-dropdown select option {

            text-align: left !important;
            text-align-last: left !important;
            text-align: -moz-left !important;
            text-align: -webkit-left !important;
            -ms-text-align-last: left !important;
            -moz-text-align-last: left !important;
        }

        /*Hiding the select arrow for IE10*/
        .custom-dropdown select::-ms-expand {
            display: none;
        }

        body {
            text-align: left;
            text-align: -webkit-left;
        }

        .custom-dropdown::before,
        .custom-dropdown::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .custom-dropdown::after { /*  Custom dropdown arrow */
            content: "\25BC";
            height: 1em;
            font-size: .625em;
            line-height: 1;
            right: 1.9em;
            top: 50%;
            margin-top: -.5em;
        }

        .custom-dropdown::before { /*  Custom dropdown arrow cover */
            width: 3em;
            right: 0;
            top: 0;
            bottom: 0;
            border-radius: 0 3px 3px 0;
            background-color: rgb(0, 0, 0);
        }

        .custom-dropdown::after {
            color: #fff;
        }

        .custom-dropdown select[disabled] {
            color: rgba(0, 0, 0, .25);
        }

        @media (max-width: 800px) {
            .w100res {
                width: 100% !important;
            }
        }
    </style>
</head>
<body class="animsition loading">
<input id="variable" value="{{$product->variable}}" hidden>
<input id="productId" value="{{$product->id}}" hidden>
<input id="productQty" value="{{$product->qty}}" hidden>
@include('includes.header')
@if($product->published!=1)
    <h1 class="text-center alert alert-danger">
        این محصول وجود ندارد یا هنوز منتشر نشده
    </h1>


@else
    {{--    <div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm" style="background-color: #f2f2f2;--}}
    {{--padding-top: 5px;--}}
    {{--padding-bottom: 5px;--}}
    {{--margin: 0 38px 0 50px;">--}}
    {{--        <a title="صفحه اصلی" href="{{route('index')}}" class="s-text16">--}}
    {{--            صفحه اصلی--}}
    {{--            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>--}}
    {{--        </a>--}}

    {{--        <a title="فروشگاه حوله ارس" href="{{route('shop')}}" class="s-text16">--}}
    {{--            فروشگاه--}}
    {{--            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>--}}
    {{--        </a>--}}
    @foreach($product->categories as $category)
        {{--            <a title="{{$category->name}}" href="{{route('shop.category', ['category' => $category->english_name])}}"--}}
        {{--               class="s-text16">--}}
        {{--                {{$category->name}}--}}
        {{--                <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>--}}
        {{--            </a>--}}
        @php $categoryname=$category->name @endphp
    @endforeach

    {{--        <span class="s-text17">--}}
    {{--			{{$product->name}}--}}
    {{--		</span>--}}
    {{--    </div>--}}
    <div class="productDetailContainer bgwhite p-t-35 p-b-80">
        <div class="flex-w flex-sb">
            <div class="w-size13 respon5">
                <div class="wrap-slick3 flex-sb flex-w product-images-container">
                    <div class="wrap-slick3-dots"></div>
                    <div class="slick3">
                        <div class="item-slick3 mainimagethumb"
                             data-thumb="<?=Croppa::url($product->image, 86, 115); ?>">
                            <div class="wrap-pic-w zoomi"
                                 style="display: flex;align-items: center;justify-content: center;">
                                <img src="/files/loading.gif"
                                     style="max-width: 40px;margin:50% 0;"
                                     alt="{{$product->name}}"
                                     class="mainimage" id="gallery{{$product->id}}0">
                            </div>
                        </div>
                        @foreach($product->galleries as $gallery)
                            <div class="item-slick3" data-thumb="<?=Croppa::url($gallery->address, 86, 115); ?>"
                                 onclick="changeimage('{{$gallery->address}}')">
                                <div class="wrap-pic-w zoomi"
                                     style="display: flex;align-items: center;justify-content: center;position:relative;">
                                    <img id="gallery{{$product->id}}{{$gallery->id}}"
                                         src="/files/loading.gif"
                                         style="max-width: 40px;margin:50% 0;"
                                         alt="{{$product->name}}">
                                    <div
                                        style="
                                        position: absolute;
                                        left:0;
                                        top:0;
                                        width:100%;
                                        height:100%;
                                        background-color: rgba(0,0,0,0.6);
                                        border-radius: 8px;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                            "
                                        id="overlay{{$product->id}}{{$gallery->id}}">
                                        <div
                                            style="
                                          border: 8px solid #f3f3f3; /* Light grey */
                                          border-top: 8px solid #3498db; /* Blue */
                                          border-radius: 50%;
                                          width: 70px;
                                          height: 70px;
                                          animation: spin 1s linear infinite;

                                        "
                                        >

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class=" respon5 w100res" style="text-align: right;width: calc(51% - 45px);">
                <h4 class="product-detail-name m-text16 p-b-13"
                    style="margin-top:60px;text-align: center;font-size: 25px;direction:rtl;">
                    {{$product->name}}
                </h4>
                <div class="p-b-5 text-center">
                    <span class="s-text8 m-l-35">کد محصول:{{$product->id}}</span>
                    <span class="s-text8">دسته بندی:
                        @foreach($product->categories as $category)
                            <a title="{{$category->name}}"
                               href="{{route('shop.category', ['category' => $category->english_name])}}"> {{$category->name}}</a>
                        @endforeach
					</span>
                </div>
                <div class="p-t-105" style="padding-top: 10px;">
                    @if($product->variable!=0)
                        {{--                        <div class="s-text15 color-header">--}}
                        {{--                            لطفا رنگ مورد نظر خود را انتخاب کنید:--}}
                        {{--                        </div>--}}
                        <div class="flex-m flex-w p-b-10" style="direction: rtl">
                            <div class="product-color-select rs2-select2 rs3-select2 of-hidden" style="width: 100%">
                                @foreach($product->color as $color)
                                    @foreach($colors as $selectedcolor)
                                        @if($selectedcolor->product_id==$product->id && $selectedcolor->color_id==$color->id)
                                            @php $selectedcolorImage=$selectedcolor->image @endphp
                                        @endif
                                    @endforeach
                                    <div class="color-container">
                                        <input type="radio" value="{{$color->id}}" id="selectedfor{{$color->id}}"
                                               name="color"
                                               class="js-variant-selector colors">
                                        <label class="c-ui-variant color-hover" for="selectedfor{{$color->id}}"
                                               data-code="{{$color->english_name}}"
                                               onclick="hilightcolor('color{{$color->id}}'); changeimage('{{str_replace("/files/","/getFile/files/",$selectedcolorImage."?w=900&h=900")}}'); isvalid();">
                                    <span class="c-ui-variant__shape colorpicker" id="color{{$color->id}}"
                                          style="
                                          @if($color->image!=null)
                                              background-image:url({{$color->image}});
                                              background-position: center;
                                              background-size: cover;
                                              background-repeat: no-repeat;
                                          @else
                                              background-color:{{$color->english_name}}

                                          @endif
                                              ">

                                        <div class="c-ui-variant__shape_after" id="color{{$color->id}}after"
                                             style="border-color:{{$color->english_name}}"></div></span>

                                            <span class="color-name"
                                                  id="color{{$color->id}}name">{{$color->name}}</span>
                                        </label>
                                    </div>

                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if($product->variable==2)
                        <div class="productSizeSelection">
                            <p>سایز:</p>
                            <div class="productSizeItemsContainer">
                                @foreach($product->size as $size)

                                    <input type="radio" value="{{$size->id}}" id="selectedforSize{{$size->id}}"
                                           name="size"
                                           class="inputSize sizepicker"
                                           onclick="loadPrice('{{$size->id}}');"
                                    >
                                    <label class="sizeLabel" id="size{{$size->id}}" for="selectedforSize{{$size->id}}"
                                           data-code="{{$size->id}}">
                                        {{$size->name}}
                                    </label>
                                @endforeach
                            </div>
                        </div>


                    @endif


                    <div class="flex-r-m flex-w p-t-10">
                        @if($product->qty!=0)
                            <div class="productCountContainer">
                                <p>تعداد:</p>
                                <div>
                                    <div onClick="changeQty('minus')">
                                        <svg viewBox="0 0 15 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <line x1="0.5" y1="1.03623" x2="14.5" y2="1.03623" stroke="#14334C"
                                                  stroke-width="1.2"></line>
                                        </svg>
                                    </div>
                                    <input type="text" value="1" readonly id="num-product">
                                    <div onClick="changeQty('plus')">
                                        <svg viewBox="0 0 15 14" fill="none">
                                            <line x1="7.46377" y1="2.62269e-08" x2="7.46377" y2="14" stroke="#14334C"
                                                  stroke-width="1.2"></line>
                                            <line x1="0.5" y1="7.03623" x2="14.5" y2="7.03623" stroke="#14334C"
                                                  stroke-width="1.2"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                        @endif


                    </div>

                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 addtocart">
                        @if($product->qty!=0)
                            @if($product->variable!=2)
                                <span class="m-text17" style="display: inline-block">
					@php $hasoff=0 @endphp
                                    @if($product->off->count()>0)
                                        @foreach($product->off as $off)
                                            @if(strtotime($off->start)<time() && strtotime($off->end)>time())
                                                @php $percent=100-$off->percent; $newprice=$product->price*$percent/100;  @endphp
                                                <span style="color: purple;"> {{number_format(($newprice))}}</span>
                                                <span class="inherit-display" style="display: inherit">تومان</span>
                                                <span class="line-through"> {{number_format($product->price)}}</span>
                                                <span class="inherit-display" style="display: inherit">تومان</span>

                                                @php $hasoff=1 @endphp
                                            @endif
                                        @endforeach
                                    @endif

                                    @if($hasoff==0)
                                        <span class="inherit-display" style="display: inherit;">تومان</span>

                                        <span> {{number_format($product->price)}}</span>

                                        <span id="here"> </span>

                                    @endif
				</span>
                            @else
                                <span class="m-text10" id="variable_price" style="    direction: rtl;
    padding-top: 15px;
    display: inline-block;">
                            @php $prices=array('99999999999999'); @endphp
                                    @foreach($sizes as $size)
                                        @if($size->product_id==$product->id)
                                            @php array_push($prices,$price=$size->price); @endphp
                                        @endif
                                    @endforeach
                                    {{number_format(min($prices))}} تومان
				</span>
                            @endif
                        @else
                            <span class="m-text10">
						ناموجود
				</span>
                        @endif
                        <span style="margin:0 10px">•</span>

                        <span>
                            افزودن به سبد خرید
                        </span>
                    </button>
                </div>
                <br>
                <p class="s-text8 p-t-10">
                    {!! $product->short_description !!}
                </p>

                @if($product->long_description!='')
                    <div class="wrap-dropdown-content bo6 p-t-15 p-b-14" style="direction: rtl">
                        <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                            توضیحات
                            <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                            <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                        </h5>

                        <div class="dropdown-content dis-none p-t-15 p-b-23">
                            <p class="s-text8">
                                {!! $product->long_description !!}
                            </p>
                        </div>
                    </div>
                @endif
                @if($product->info!='')

                    <div class="wrap-dropdown-content bo7 p-t-15 p-b-14" style="direction: rtl;">
                        <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4"
                            id="moredetail-selector">
                            اطلاعات اضافه
                            <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                            <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                        </h5>

                        <div class="dropdown-content dis-none p-t-15 p-b-23">
                            <p class="s-text8" id="moredetail">
                                <input hidden id="moredetail-text" type="text" value="{{$product->info}}">
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endif

@include('includes.footer')
@include('includes.copyright')

@include('includes.footerLinks')
<script>
    function hilightcolor(id) {
        $('.colorpicker').removeClass('c-ui-variant__shape_selected');
        $('#' + id).addClass('c-ui-variant__shape_selected');
        $('.c-ui-variant__shape_after').removeClass('c-ui-variant__shape_selected_after');
        $('#' + id + 'after').addClass('c-ui-variant__shape_selected_after');
        $('.color-name').removeClass('visible');
        $('#' + id + 'name').addClass('visible');


    }


    function changeimage(image) {
        if (image !== '') {
            $('.mainimage').prop('src', image);
            $('.mainimagethumb').attr('data-thumb', image);
            $('.slick3-dots li:first-child>img').prop('src', image);
            $('.slick3-dots li:first-child>img').click();
        }
    }

    function isvalid() {
        var variable = $('#variable').val();
        var colorCount = $('input.colors:checked').length;
        if (variable === '1') {
            if (colorCount > 0) {
                $('.addtocart').removeClass('displaynone');
                $('.addtocartfake').addClass('displaynone');

            }
        } else if (variable === '2') {
            var sizeVal = $('.sizepicker').val();
            if (colorCount > 0 && sizeVal !== 'unselected') {
                $('.addtocart').removeClass('displaynone');
                $('.addtocartfake').addClass('displaynone');

            }
        }
    }

    const loadPrice = (sizep) => {
        $('.sizeLabel').removeClass('selectedSize')
        $('#size' + sizep).addClass('selectedSize')
        jQuery.ajax({

                url: "{{ route('loadPrice') }}?timestamp=" + new Date() * 1000,
                method: 'post',
                beforeSend: function (request) {
                    // request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                    request.setRequestHeader("cache-control", "no-cache");

                },
                data: {
                    size: sizep,
                    product_id: $('#productId').val()

                },
                success: function (response) {
                    $('#variable_price').html(response);
                    size = 0;
                },
                error: function () {
                    window.location.reload();
                }
            }
        )
    }
    var size = 0;
    jQuery(document).ready(function () {
        jQuery('.sizepicker').change(function (e) {
            size = $('.sizepicker').val();

            $body = $("body");

            $(document).on({
                ajaxStart: function () {
                    $body.addClass("loading");
                },
                ajaxStop: function () {
                    $body.removeClass("loading");
                }
            });

            jQuery.ajax({

                    url: "{{ route('loadPrice') }}?timestamp=" + new Date() * 1000,
                    method: 'post',
                    beforeSend: function (request) {
                        // request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                        request.setRequestHeader("cache-control", "no-cache");

                    },
                    data: {
                        size: size,
                        product_id: $('#productId').val()

                    },
                    success: function (response) {
                        $('#variable_price').html(response);
                        size = 0;
                    },
                    error: function () {
                        window.location.reload();
                    }
                }
            )
        });
    });

    size = 0;
    var color = 0;

    jQuery(document).ready(function () {
        jQuery('.addtocart').click(function (e) {
            var variable = $('#variable').val();
            if (variable === "1") {
                $('input.colors').each(function () {
                    if ($(this).is(':checked')) {
                        color = this.value;
                    }
                });
            } else if (variable === "2") {
                $('input.colors').each(function () {
                    if ($(this).is(':checked')) {
                        color = this.value;
                    }
                });
                $('input.sizepicker').each(function () {
                    if ($(this).is(':checked')) {
                        size = this.value;
                    }
                });
                // size = $('.sizepicker').val();
            }

            $body = $("body");
            console.log(variable);

            $(document).on({
                ajaxStart: function () {
                    $body.addClass("loading");
                },
                ajaxStop: function () {
                    $body.removeClass("loading");
                }
            });
            if (color == 0 || size == 0) {
                swal("ابتدا رنگ و سایز", "مورد نظر خود را انتخاب کنید", "error");
            } else {
                //get prev cart
                let cart = localStorage.getItem("arasCart");
                if (cart) {
                    cart = JSON.parse(cart);
                }
                const data = {
                    userId: "{{$user?$user->id:""}}",
                    size: size,
                    color: color,
                    product_id: $('#productId').val(),
                    qty: $('#num-product').val()
                };
                if (cart) {
                    cart = [...cart, data]
                } else {
                    cart = [data]
                }

                //save to localstorage
                localStorage.setItem("arasCart", JSON.stringify(cart));
                jQuery.ajax({
                        url: "{{ route('addToCart') }}?timestamp=" + new Date() * 1000,
                        method: 'post',
                        beforeSend: function (request) {
                            request.setRequestHeader("X-CSRF-TOKEN", $('meta[name="csrf-token"]').attr('content'));
                            request.setRequestHeader("cache-control", "no-cache");
                        },
                        data: data,
                        success: function (response) {
                            $('.header-wrapicon2 ').html(response);
                            size = 0;
                            color = 0;
                            Swal.fire({
                                title: "محصول مورد نظر",
                                text: "به سبد خرید افزوده شد",
                                icon: 'success',
                                confirmButtonText: 'مشاهده سبد خرید',
                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                    window.location.replace('/cart');
                                }
                            });
                            // swal({
                            //     title: "محصول مورد نظر",
                            //     text: "به سبد خرید افزوده شد",
                            //     type: "success",
                            //     confirmButtonText: "مشاهده سبد خرید",
                            // })
                        },
                        error: function () {
                            window.location.reload();
                        }
                    }
                )
            }
        });
    });


    function disable() {
        if ($('#productQty').val() - $('#num-product').val() <= 1) {
            $('.btn-num-product-up').addClass('displaynone');
        } else {
            $('.btn-num-product-up').removeClass('displaynone');

        }
    }

    function enable() {
        $('.btn-num-product-up').removeClass('displaynone');

    }


    jQuery(document).ready(function () {
        var flag = false;

        jQuery('#moredetail-selector').click(function (e) {
            if (flag === false) {
                var variable = $('#moredetail-text').val();

                $body = $("body");
                console.log(variable);

                $(document).on({
                    ajaxStart: function () {
                        $body.addClass("loading");
                    },
                    ajaxStop: function () {
                        $body.removeClass("loading");
                    }
                });

                jQuery.ajax({

                        url: "{{ route('more-info') }}",
                        method: 'get',
                        data: {
                            variable: variable

                        },
                        success: function (response) {
                            $('#moredetail ').html(response);
                            flag = true;
                            console.log(flag);
                        }
                    }
                )
            }
        });


    });

    const changeQty = (type) => {
        let val = $('#num-product').val();

        switch (type) {
            case 'plus':
                $('#num-product').val(parseInt(val) + 1);
                break;
            case 'minus':
                $('#num-product').val(parseInt(val) - 1);
                break;
        }
    }
</script>


<script type="application/ld+json">
                {
    "@context": "https://www.schema.org",
    "@type": "Product",
    "name": "{{$product->name}}",
    "alternateName": null,
    "image": [
     @foreach($product->galleries as $gallery)
        {
           "type": "gallery",
           "url": "{{$gallery->address}}",
           "alt": null,
           "title": null
       },
@endforeach
    {
        "type": "gallery",
        "url": "{{$product->image}}",
            "alt": null,
            "title": null
        }

    ],
    "description": "",
    "sku": {{$product->id}},
    "brand": {
        "@type": "Thing",
        "name": "حوله ارس"
    }

}










</script>


</body>
</html>
