<!DOCTYPE html>
<html lang="fa">

<head>

    <link rel="alternate" href="https://arastowel.com/promotional-towels/{{$product->id}}/{{str_replace(' ','-',$product->name)}}" hreflang="x-default">


    <title>
        {{$product->name}}بافت حوله تبلیغاتی برای
        - فروشگاه اینترنتی حوله ارس
    </title>
    <meta name="description" content="تولید و بافت حوله سازمانی و تبلیغاتی {{ $product->name }}">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="canonical" href="https://arastowel.com/promotional-towels/{{$product->id}}/{{str_replace(' ','-',$product->name)}}" />
    @include('includes.headLinks')
    <meta name="language" content="Fa" />
    <meta name="document-type" content="Public" />
    <meta name="document-rating" content="General" />
    <meta name="resource-type" content="document" />

    {{--seo content--}}

    <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
    <link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" />
    <meta property="og:site_name" content="فروشگاه اینترنتی حوله ارس" />
    <meta property="og:locale" content="fa_IR" />
    <meta property="og:title" content="{{$product->title}}" />
    <meta property="og:url" content="https://arastowel.com/promotional-towels/{{$product->id}}/{{str_replace(' ','-',$product->name)}}" />
    <meta property="og:description" content="{{$product->title}}" />
    <meta property="og:site_name" content="فروشگاه اینترنتی حوله ارس" />

    <meta property="og:image" content="{{$product->image}}">
    <meta property="og:image:width" content="590">
    <meta property="og:image:height" content="590">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:secure_url" content="{{$product->image}}" />
    <meta property="og:image:alt" content="{{$product->name}}" />

    <link rel="image_src" href="{{$product->image}}" />
    <meta property="og:type" content="article" />
    <meta property="article:published_time" content="{{$product->created_at}}" />
    <meta property="article:modified_time" content="{{$product->updated_at}}" />
    <meta property="og:updated_time" content="{{$product->updated_at}}" />
    <meta name="twitter:description" content="{{ $product->name }}" />

    <meta content='text/html; charset=UTF-8' http-equiv='Content-Type' />


    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@ArasTowel" />
    <meta name="twitter:title" content="{{$product->name}}" />
    <meta name="twitter:image" content="{{$product->image}}" />

    <meta http-equiv="content-language" content="fa" />
    <meta name="apple-mobile-web-app-capable" content="yes" />


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <meta name="DC.Identifier" content="https://arastowel.com/promotional-towels/{{$product->id}}/{{str_replace(' ','-',$product->name)}}" />
    <meta name="DC.Type" content="image" />
    <meta name="DC.Title" content="{{$product->name}}" />
    <meta name="DC.Language" content="fa" />

    <meta name="robots" content="index,follow,archive" />

    {{--seo content--}}


    <script defer src="/js/jquery-bootstrap.js"></script>


    <style>
        /*a{*/
        /*	font-family: 'iranSans';*/
        /*	font-weight: 800;*/
        /*}*/
        .blog-detail-txt>ul>li {
            font-size: 25px;
            font-family: iranSans, Montserrat-Regular !important;
            margin: 0;
            list-style-type: disc;
        }

        .blog-detail-txt>ul>li {
            font-size: 25px;
            font-family: iranSans, Montserrat-Regular !important;
            margin: 0;
            list-style-type: disc;
        }

        .share-group li {
            list-style-type: none;

        }

        .blog-detail-txt>div>figure>img {
            width: 100%;
        }

        .blog-detail-txt img {
            width: 100%;
        }

        .tag-item:hover {
            border: 1px solid #4187c7 !important;
        }
    </style>
</head>

<body class="animsition loading">
    @include('includes.header')


    <!-- breadcrumb -->
    <div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm" style="background-color: #eff5f5;padding-top: 5px;padding-bottom: 5px;margin: 0 38px 0 50px;">
        <a href="{{route('index')}}" class="s-text16">
            صفحه اصلی
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>

        <a href="{{route('promotional-towels')}}" class="s-text16">
            حوله های تبلیغاتی
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>

        <span class="s-text17">
            {{$product->name}}
        </span>
    </div>

    <!-- content page -->
    <section class="bgwhite p-t-60 p-b-25" style="direction: rtl;padding:24px;">
        <div class="container" style="max-width:800px !important;">
            <div class="row">
                <div class=" p-b-80">
                    <div>
                        <div class="p-b-40">
                            <div class="blog-detail-img wrap-pic-w">
                                <img src="{{$product->image}}" alt="{{$product->name}}">
                            </div>

                            <div class="blog-detail-txt p-t-33">
                                <h1 class="p-b-11 m-text24 text-center" style="font-size:32px">
                                    {{$product->name}}
                                </h1>
                                <p class="text-center" style="color:#4187c7;font-size:14px;margin-top:5px;margin-bottom:60px">{{$product->persian_date}}</p>



<p>
                                <!-- ////////// -->
                                تولید و بافت حوله تبلیغاتی و سازمانی برای {{ $product->name }} با بالاترین کیفیت و استفاده از مرغوب ترین نوع نخ و پیاده سازی به کمک جدید ترین تکنیک های بافت و رنگرزی توسط مهندسین مجرب حوله های تبلیغاتی ارس.
</p>

                            </div>

                            <div class="flex-m flex-w p-t-20">
                                <span class="s-text20 p-r-20">

                                </span>

                                <div class="wrap-tags flex-w">

                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('includes.footer')
    @include('includes.copyright')

    @include('includes.footerLinks')


    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "Product",
            "name": "حوله تبلیغاتی {{ $product->name }}",
            "image": "{{ $product->image }}",
            "description": "{{ $product->name}}",
            "sku": "ARAS00{{ $product->id }}",
            "offers": {
                "@type": "Offer",
                "url": "https://arastowel.com/promotional-towels/{{$product->id}}/{{str_replace(' ','-',$product->name)}}",
                "priceCurrency": "IRR",
                "availability": "https://schema.org/PreOrder",
                "itemCondition": "https://schema.org/NewCondition"
            },
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "9.9",
                "bestRating": "10",
                "worstRating": "7",
                "ratingCount": "100"
            }
        }
    </script>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "BreadcrumbList",
            "itemListElement": [{
                    "@type": "ListItem",
                    "position": 1,
                    "name": "حوله تبلیغاتی و سازمانی ارس",
                    "item": "https://arastowel.com/"
                }, {
                    "@type": "ListItem",
                    "position": 2,
                    "name": "حوله های تبلیغاتی",
                    "item": "https://arastowel.com/promotional-towels"
                },
                {
                    "@type": "ListItem",
                    "position": 3,
                    "name": "حوله تبلیغاتی {{ $product->name }}",

                    "item": "https://arastowel.com/promotional-towels/{{$product->id}}/{{str_replace(' ','-',$product->name)}}"
                }
            ]
        }
    </script>
</body>

</html>
