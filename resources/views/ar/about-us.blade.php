<!DOCTYPE html>
<html lang="ar">
<head>
    <title>عن منشفة ارس</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    @include('ar.includes.headLinks')
    <script defer src="/js/jquery-bootstrap.js"></script>

</head>
<body class="animsition loading">

@include('ar.includes.header')


<!-- Title Page -->
@foreach($template as $temp)
    @if($temp->place=='aboutHeader')
        <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{$temp->image}});">
            <h1 class="l-text2 t-center" style="color: #fff">
                عن منشفة ارس
            </h1>
        </section>
    @endif
@endforeach
<!-- content page -->
<section class="bgwhite p-t-66 p-b-38">
    <div class="container">
        <div class="row">
            <div class="col-md-4 p-b-30">

                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: 0px">
                    <!-- Indicators -->


                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item item1 active">
                            @foreach($template as $temp)
                                @if($temp->place=='about1')
                                    <img alt="about aras towel" src="{{$temp->image}}">
                                @endif
                            @endforeach
                        </div>

                        <div class="item item2">
                            @foreach($template as $temp)
                                @if($temp->place=='about2')
                                    <img alt="مصنع مناشف أرس" src="{{$temp->image}}">
                                @endif
                            @endforeach
                        </div>

                        <div class="item item3">
                            @foreach($template as $temp)
                                @if($temp->place=='about3')
                                    <img alt="online shopping of towel" src="{{$temp->image}}">
                                @endif
                            @endforeach
                        </div>

                        <div class="item item4">
                            @foreach($template as $temp)
                                @if($temp->place=='about4')
                                    <img alt="aras towel packaging" src="{{$temp->image}}">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 p-b-30">
                <h3 class="m-text26 p-t-15 p-b-16" style="text-align: right!important;padding-top: 0;">
                    لمحة عنا
                </h3>

                <p class="p-b-28" style="direction: rtl!important;text-align: right!important;">
                    بدأ نشاط مصنع مناشف أرس في عام 1964، ونحن نعمل الآن بجد لتوسيع نطاق أنشطتنا يومًا بعد يوم. إن مناشف أرس هي نتيجة عمل عائلي موحّد ، وقد جاء هذا الفن لنا لسنوات عديدة من آبائنا واجدادنا في هذه المجال. من خلال دراسة تاريخ إيران العزيزة في هذا المجال ، نجد أننا نرث كنوز غنية في مختلف فنون الصباغة والحياكة والتصميم والتعبئة. كما نثني على جهود آبائنا وأجدادنا لوضع خطة جديدة من خلال الجمع بين الطرق التقليدية لهذه الصناعة والأساليب الجديدة والمعرفة التقنية للعالم اليوم. تماشيا مع الأهداف الرئيسية للشركة ، فإننا نجمع بين الفن والخبرة والأناقة والهدوء جنبا إلى جنب مع ضمان جودة وتنوع التصميم واللون ، ونعلن بفخر أن جودة جميع المنتجات في جميع مراحل النسيج والصباغة والتصميم والخياطة  والتطريز وتصميم التغليف یتم التحکم به من قبل المتخصصين بحيث يتم تقديم منتجات شركة أرس للمناشف عالیة الجودة لعملائنا الأعزاء الذين يستحقون الأفضل.


                </p>


            </div>
        </div>
    </div>
</section>


<!-- Footer -->
@include('ar.includes.footer')
@include('ar.includes.copyright')
@include('ar.includes.footerLinks')


</body>
</html>
