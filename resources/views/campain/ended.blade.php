<!DOCTYPE html>
<html lang="fa" >

<head>
  <meta charset="UTF-8">
  <title>جشنواره های حوله ارس</title>
  <meta name="description" content="  با استفاده از دکمه زیر شما می تونین با وارد کردن شماره تلفن یا ایمیل خودتون بدون هیچ هزینه ای در قرعه کشی جشنواره های حوله ارس شرکت کنید و حوله های دستی و هدیه و کد های تخفیف رایگان برنده شوید!">

  @include('includes.headLinks')
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />

  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

      <link rel="stylesheet" href="/campain/css/style.css">
  <script type="text/javascript" src="/campain/js/Winwheel.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
</head>

<body>
@include('includes.header')
<div style="width: 100%;height: 300px;margin:0;padding: 0;background-image: url('/images/winter/zemestan7.jpg');background-position: center;background-size: cover;background-attachment: fixed;">
<div class="alert alert-info text-center" style="direction: rtl;font-family:'roya';">
  مدت این جشنواره به اتمام رسیده است
</div>

  <div style="position: relative;
width: 300px;">



  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>

  

    <script  src="/campain/js/index.js"></script>
  {{--{!! app('captcha')->render(); !!}--}}


</div>
@include('includes.footer')
@include('includes.copyright')

@include('includes.footerLinks')
</body>

</html>
