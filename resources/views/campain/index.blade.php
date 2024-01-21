<!DOCTYPE html>
<html lang="fa" >

<head>
  <meta charset="UTF-8">
  <title>جشنواره نوروز ۹۸ حوله ارس</title>
  <meta name="description" content="  با استفاده از دکمه زیر شما می تونین با وارد کردن شماره تلفن یا ایمیل خودتون بدون هیچ هزینه ای در قرعه کشی جشنواره نوروز ۹۸ حوله ارس شرکت کنید و حوله های دستی و هدیه و کد های تخفیف رایگان برنده شوید!">

  @include('includes.headLinks')
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />

  <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

      <link rel="stylesheet" href="/campain/css/style.css">
  <script type="text/javascript" src="/campain/js/Winwheel.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
</head>

<body>
@include('includes.header')
<div style="width: 100%;height: 1200px;margin:0;padding: 0;background-image: url('/images/bahar1.jpg');background-position: center;background-size: cover;background-attachment: fixed;">
<div class="alert alert-info text-center" style="direction: rtl;font-family:'roya';background-color: #4ebf4a;color: white">
  <h1 class="text-center">
  به جشنواره نوروز ۹۸ حوله ارس خوش آمدید:)
  </h1>
  <br>
  با استفاده از دکمه زیر شما می تونین با وارد کردن شماره تلفن یا ایمیل خودتون بدون هیچ هزینه ای در قرعه کشی جشنواره نوروز ۹۸ حوله ارس شرکت کنید.
  <br>
  فقط کافیست پس از وارد کردن شماره تلفن همراه یا ایمیل خود، کد تاییدی را که به ایمیل یا شماره تلفن همراه شما ارسال می گردد را وارد کنید تا گردونه ی شانس شما بچرخد!
  <br>
  پس از مشخص شدن جایزه ی شما، برای چگونگی استفاده از جوایز، از طریق ایمیل، پیامک یا تماس تلفنی با شما در ارتباط خواهیم بود.
</div>

  <div style="position: relative;
margin: 100px auto;
height: 100px;
width: 300px;">
    <div id="error" class="alert alert-danger" style="top: 20px;
position: absolute;transition: all 0.5s">شماره موبایل یا ایمیل وارد شده نادرست است</div>
<form class="grop-from" id="signup">
  <div class="form-head"><span class="text"> </span><i class="icon-placeholder"></i></div>
  <div class="form-body"><span class="error-text">Please Fill Out This Field</span>
    <div class="form-controls">
      <input id="control-name" placeholder="ایمیل یا شماره تلفن همراه"/>
      <input id="control-phone" placeholder="کد تایید ارسال شده"/>
    </div>
  </div><a class="form-action"><i class="icon-action"></i></a>
</form>
  </div>
  <div style="height: 0;
    width: 40px;
    margin: 20px auto;">
    <div style="  width: 0;
  height: 0;
  border-left: 20px solid transparent;
  border-right: 20px solid transparent;

  border-top: 20px solid #000;"></div>
  </div>
  <div style="width: 375px;margin: 35px auto;height: 375px;">
    <canvas id="canvas" width="375" height="375">
      <p style="{color: white}" align="center">Sorry, your browser doesn't support canvas. Please try another.</p>
    </canvas>
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
