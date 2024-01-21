<!DOCTYPE html>
<html lang="fa">
<head>
    <link rel="alternate" hreflang="en-us" href="https://arastowel.com/en/promotional-towels">

    <link rel="alternate" hreflang="ar" href="https://arastowel.com/ar/promotional-towels">
    <link rel="alternate" href="https://arastowel.com/promotional-towels" hreflang="x-default">
    <title>آرشیو حوله های تبلیغاتی ارس، بهترین برای شرکت ها و سازمان ها - فروشگاه اینترنتی حوله ارس</title>
    <link rel="canonical" href="https://arastowel.com/promotional-towels"/>

    <meta name="description"
          content="ما بـا داشتن امکـانات وسیع و مجهز به تکنولـوژی روز دنیا جهت بافت آرم، لوگو و طـرح های مورد نظر شـما روی  حولـه به صور تخـصصی خدمات ارأیه میدهیم. لازم به ذکر است که حوله های تبلیغاتی ما در اندازه، طـرح و  رنگ های متنـوع، قادر به رقابت با بهتـرین حولـه های خارجی است">

    <link rel="stylesheet" href="/css/bootstrap.min.css">

    @include('includes.headLinks')
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
            direction: rtl;
            height: 100%;
            width: 100%;
            transition: .5s ease;
            text-align: right;
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
                margin-right: 10px !important;

            }
        }

        @media (max-width: 430px) {
            .order-form {
                margin-right: 0 !important;
                margin-top: 10px;
            }
        }

        .modal-backdrop {
            z-index: -1;
        }

        .promoparagraph > i {
            font-size: 18px !important;
        }


    </style>
</head>
<body class="animsition loading">

@php
    $agent=new \Jenssegers\Agent\Agent();
@endphp
@if(!$agent->isMobile() && !$agent->isTablet())
    <div class="modalPlace">

    </div>
@endif

@include('includes.header')


<!-- Title Page -->

<section class="banner bgwhite p-t-50 p-b-40" style="background-color: #c788bc;height: 130px;"
         id="cat-section">
    <p class="caption2-slide1 xl-text1 t-center"
       style="font-size: 30px;text-align: center !important;margin: 0;padding: 0;">
        نمونه حوله های تبلیغاتی
    </p>

</section>
<!-- content page -->
<section class="bgwhite p-b-38" style="padding-top: 60px;">
    <div class="container">
        <div class="row" style="padding-bottom: 45px;direction: rtl">
            @php $c=0; @endphp
            @foreach($products as $product)
                @foreach($product->categories as $category)
                    @if($category->english_name=='promotional-towel' && $c>=9)
                        <div class="col-md-4 padding-15">
                            <a href="#" data-toggle="modal" data-target="#img_popup"
                               onclick="modal('{{$product->image}}')">
                                <img src="<?=Croppa::url($product->image, 545, 362); ?>" class="mainpage-img"
                                     alt="حوله های تبلیغاتی ارس">
                            </a>
                        </div>
                    @elseif($category->english_name=='promotional-towel' &&$c<9)
                        @php $c+=1; @endphp
                    @endif
                @endforeach
            @endforeach
        </div>

    </div>
</section>


<!-- Footer -->
@include('includes.footer')
@include('includes.copyright')

@include('includes.footerLinks')

<script>
    function modal(name, alt) {
        $('.modalPlace').html('<div id="img_popup" class="modal fade" style="background-color: rgba(0,0,0,0.5);z-index: 1400;" role="dialog">\n' +
            '    <div class="modal-dialog" style="max-width: 743px">\n' +
            '        <div class="modal-content" style="margin-top:14% ">\n' +
            '            <div class="modal-body">\n' +
            '                <p><img style="width: 100%" src="' + name + '"/> </p>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </div>\n' +
            '</div>');
    }
</script>
</body>
</html>
