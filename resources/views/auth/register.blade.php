<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name=”robots” content=”noindex,nofollow”>

    <title>ثبت نام در حوله ارس</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="https://statics.arastowel.com/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://statics.arastowel.com/css/material-design.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/css/login.css">
    <link href="https://statics.arastowel.com/css/font-awesome.min.css" rel="stylesheet"/>
    <style>
        #signin2 {
            text-decoration: none;
            color: white;
        }

        #signin2:hover {
            background-color: #d72521;
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>

<div class="main">

    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title text-sm-center" style="    font-size: 24px;
    width: 200px;
    height: 40px;">ثبت نام در حوله ارس</h2>
                    <form method="POST" action="register" class="register-form" id="register-form">
                        @csrf

                        @if ($errors->has('name'))
                            <div class=" alert alert-danger text-center" style="direction: rtl" role="alert">
                                {{ $errors->first('name') }}
                            </div>
                        @endif

                        @if ($errors->has('email'))
                            <div class=" alert alert-danger text-center" style="direction: rtl" role="alert">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        @if ($errors->has('password'))
                            <div class=" alert alert-danger text-center" style="direction: rtl" role="alert">
                                {{ $errors->first('password') }}
                            </div>
                        @endif


                        <div class="form-group">
                            <label for="name"><i class="fa fa-user material-icons-name"></i></label>
                            <input type="text" name="name" id="name" placeholder="نام" value="{{ old('name') }}"
                                   required autofocus/>
                        </div>

                        <div class="form-group">
                            <label for="name"><i class="fa fa-user material-icons-name"></i></label>
                            <input type="text" name="last_name" id="last_name" placeholder="نام خانوادگی" required/>
                        </div>

                        <div class="form-group">
                            <label for="mobile"><i class="fa fa-phone"></i></label>
                            <input type="number" name="mobile" id="mobile" placeholder="موبایل" required/>
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="fa fa-lock"></i></label>
                            <input type="password" name="password" required id="pass" placeholder="کلمه عبور"/>
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="fa fa-lock"></i></label>
                            <input type="password" name="password_confirmation" required id="password_confirmation"
                                   placeholder="تکرار کلمه عبور"/>
                        </div>

                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="ثبت نام"/>
{{--                            <a href="/auth/google" style="background-color: #fd2c27;" id="signin2" class="form-submit">--}}
{{--                                ثبت نام با گوگل <i class="fa fa-google"> </i></a>--}}
                        </div>
                        {{--     app('captcha')->render(); --}}

                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="/images/103.jpg" alt="ثبت نام در ارس"></figure>
                    <a href="{{route('index')}}" class="signup-image-link">بازگشت به صفحه اصلی</a>
                    <a href="{{route('login')}}" class="signup-image-link">قبلا در حوله ارس ثبت نام کرده اید؟ وارد
                        شوید</a>
                </div>
            </div>
        </div>
    </section>


</div>

<!-- JS -->
<script src="https://statics.arastowel.com/js/login.js"></script>

</body>
</html>
