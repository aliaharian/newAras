
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name=”robots” content=”noindex,nofollow”>

    <title>ورود به حوله ارس</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="https://statics.arastowel.com/css/bootstrap.min.css">


    <!-- Main css -->
    <link rel="stylesheet" href="/css/login.css">
    <link href="https://statics.arastowel.com/css/font-awesome.min.css" rel="stylesheet" />
    <style>
        #signin2{
            text-decoration: none;
            color: white;
        }
        #signin2:hover{
            background-color: #d72521;
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>

<div class="main">


    <!-- Sing in  Form -->
    <section class="sign-in" >
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="https://statics.arastowel.com/images/102.jpg" alt="ورود یه حوله ارس"></figure>
                    <a href="{{route('index')}}" class="signup-image-link">بازگشت به صفحه اصلی</a>
                    <a href="{{route('register')}}" class="signup-image-link">حساب کاربری ندارید؟ ثبت نام کنید</a>
                    <a href="{{ route('password.request') }}" class="signup-image-link">کلمه عبور خود را فراموش کرده اید؟ کلیک کنید</a>
                </div>
                <div class="signin-form" style="    margin-top: 16px;">
                    <h2 class="form-title text-md-center" style="    font-size: 24px;
    width: 200px;
    height: 40px;">ورود به حوله ارس</h2>
                        <form method="POST" action="{{ route('login') }}" class="register-form" id="login-form">
                            @csrf

                            @if ($errors->has('email'))
                                <div class="alert alert-danger text-center" style="direction: rtl" role="alert">
                                        {{ $errors->first('email') }}
                                    </div>
                            @endif
                            @if ($errors->has('password'))
                                <div class="alert alert-danger text-center" style="direction: rtl" role="alert">
                                        {{ $errors->first('password') }}
                                    </div>
                            @endif
                        <div class="form-group">
                            <label for="mobile" ><i class="fa fa-phone material-icons-name"></i></label>
                            <input type="number" name="mobile"  id="mobile" placeholder="موبایل" required autofocus/>
                        </div>


                            <div class="form-group">
                                <label for="password"><i class="fa fa-lock"></i></label>
                                <input type="password" value="" name="password" id="password" required placeholder="کلمه عبور"/>
                            </div>

                            <div class="form-group">
                                <label for="password"><i class="fa fa-lock"></i></label>
                            </div>


                        <div class="form-group">
                            <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" {{ old('remember') ? 'checked' : '' }} />
                            <label for="remember-me" class="label-agree-term"><span><span></span></span>مرا به خاطر داشته باش</label>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="signin" class="form-submit" value="ورود"/>
{{--                            <a href="/auth/google" style="background-color: #fd2c27;" id="signin2" class="form-submit"> ورود با گوگل <i class="fa fa-google"> </i></a>--}}
                        </div>
                    </form>
                    {{--<div class="social-login">--}}
                        {{--<span class="social-label">یا از این طریق وارد شوید: </span>--}}
                        {{--<ul class="socials">--}}
                            {{--<li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>--}}
                            {{--<li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>--}}
                            {{--<li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </section>

</div>

<!-- JS -->

</body>
</html>
