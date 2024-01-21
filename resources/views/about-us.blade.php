<!DOCTYPE html>
<html lang="fa">
<head>
    <link rel="alternate" hreflang="en-us" href="https://arastowel.com/en/about-us">

    <link rel="alternate" hreflang="ar" href="https://arastowel.com/ar/about-us">
    <link rel="alternate" href="https://arastowel.com/about-us" hreflang="x-default">
    <title>درباره ی حوله ارس - فروشگاه اینترنتی حوله ارس</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">

    @include('includes.headLinks')
    <script defer src="/js/jquery-bootstrap.js"></script>

</head>
<body class="animsition loading">

@include('includes.header')


<!-- Title Page -->
@foreach($template as $temp)
    @if($temp->place=='aboutHeader')
        <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{$temp->image}});">
            <h1 class="l-text2 t-center" style="color: #fff">
                درباره حوله ارس
            </h1>
        </section>
    @endif
@endforeach
<!-- content page -->
<section class="bgwhite p-t-66 p-b-38">
    <div class="container">
        <div class="row">
            <div class="col-md-4 p-b-30">

                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: 0">
                    <!-- Indicators -->


                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item item1 active">
                            @foreach($template as $temp)
                                @if($temp->place=='about1')
                                    <img alt="درباره حوله ارس" src="{{$temp->image}}">
                                @endif
                            @endforeach
                        </div>

                        <div class="item item2">
                            @foreach($template as $temp)
                                @if($temp->place=='about2')
                                    <img alt="کارخانه حوله ارس" src="{{$temp->image}}">
                                @endif
                            @endforeach
                        </div>

                        <div class="item item3">
                            @foreach($template as $temp)
                                @if($temp->place=='about3')
                                    <img alt="کارخانه تولیدی فروشگاه اینترنتی ارس" src="{{$temp->image}}">
                                @endif
                            @endforeach
                        </div>

                        <div class="item item4">
                            @foreach($template as $temp)
                                @if($temp->place=='about4')
                                    <img alt="تولید و بسته بندی حوله ارس" src="{{$temp->image}}">
                                @endif
                            @endforeach
                        </div>
                         <div class="item item5">
                            @foreach($template as $temp)
                                @if($temp->place=='about5')
                                    <img alt="تولید و بسته بندی حوله ارس" src="{{$temp->image}}">
                                @endif
                            @endforeach
                        </div>
                         <div class="item item6">
                            @foreach($template as $temp)
                                @if($temp->place=='about6')
                                    <img alt="تولید و بسته بندی حوله ارس" src="{{$temp->image}}">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 p-b-30">
                <h3 class="m-text26 p-t-15 p-b-16" style="text-align: right!important;padding-top: 0;">
                    داستان ما
                </h3>


                <p class="p-b-28" style="direction: rtl!important;text-align: justify!important;font-size: 12px">
                فعالیت کارخانه حوله ارس در سال ۱۳۴۲ آغاز شده است و اکنون سخت تلاش می‌کنیم تا دامنه فعالیت‌های خود را
                روز‌به‌روز گسترش دهیم. حوله ارس حاصل یک فعالیت تجاری متحد خانوادگی است که در طی سال‌های متمادی این
                هنر از پدران و بزرگان این عرصه، برای ما به یادگار مانده است.
                <br />
                با بررسی تاریخچه ایران عزیز در این زمینه، در‌می‌یابیم که وارث گنجینه‌ای غنی از هنرهای مختلف رنگرزی،
                بافندگی، طراحی و بسته‌بندی می‌باشیم. ما نیز با ارج نهادن به زحمات پدران و نیاکان خود بر‌آن هستیم تا
                با تلفیق شیوه‌های سنتی این صنعت با روش‌های نوین و دانش فنی و تکنولوژی روز دنیا، طرحی نو دراندازیم.
                <br />

                در راستای اهداف اصلی شرکت، ترکیبی از هنر، تخصص، لطافت و آرامش را همراه با تضمین کیفیت و تنوع طرح و
                رنگ برای شما به ارمغان آورده‌ایم و با کمال افتخار اعلام می‌نماییم که کیفیت همه محصولات در تمامی
                مراحل بافت، رنگرزی، طراحی، دوخت، گلدوزی، طراحی بسته‌بندی توسط متخصصان امر کنترل می‌گردد تا تولیدات
                شرکت حوله ارس در حد اعلای خود به شما مشتری عزیز که شایسته بهترین‌ها هستید، تقدیم گردد.
                <br />

                <b>حوله ارس</b>
                 تحت شماره ۳۴۲۶۰۰ ثبت برند شده است. در ضمن <b>"حوله ارس تشنه ترین حوله دنیا"</b> با شماره ۳۴۶۲۳۹ ثبت گردیده است.
                هرگونه استفاده از این نام، لوگو و شعار تبلیغاتی پپیگرد قانونی دارد.
            </p>


            </div>
        </div>
    </div>
</section>


<!-- Footer -->
@include('includes.footer')
@include('includes.copyright')
@include('includes.footerLinks')


</body>
</html>
