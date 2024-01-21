<!DOCTYPE html>
<html lang="fa">
<head>
	<title>فرم سفارش حوله های تبلیغاتی - فروشگاه اینترنتی حوله ارس</title>

	<meta name="description" content="پیشنهاد ویژه ما برای هدایای تبلیغاتی شما . بافت آرم ، لوگو و طرح های مورد نظر شما روی حوله تخصص ماست. حوله های تبلیغاتی ما در اندازه ، طرح و رنگ های متنوع و چشم نواز با بهترین حوله های خارجی رقابت می کند.">

	<link rel="stylesheet" href="/css/bootstrap.min.css">

	@include('includes.headLinks')
	<script defer src="/js/jquery-bootstrap.js"></script>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/form/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/form/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/form/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/form/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/form/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/form/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/form/vendor/noui/nouislider.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/form/css/util.css">
	<link rel="stylesheet" type="text/css" href="/form/css/main.css">
	<!--===============================================================================================-->
</head>
<body class="animsition loading">

@include('includes.header')


<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(/files/232.jpg);">

	</section>

	<!-- content page -->
	<section class="bgwhite p-t-66 p-b-38" style="background: #e6e6e6">
		<div class="container">
			<div class="row">

				<div class="col-md-12 p-b-30">

					<div class="container-contact100">
						<div class="wrap-contact100">
							@if(isset($pm))
								<h1 class="alert alert-success">{{$pm}}</h1>
								@endif
							<form class="contact100-form validate-form" id="root" onsubmit="check()" action="{{route('send-promotional-form')}}" method="post" enctype="multipart/form-data">
								@csrf
								<span class="contact100-form-title">
					فرم سفارش حوله های تبلیغاتی
				</span>

								<div class="wrap-input100 validate-input bg1" data-validate="لطفا نام و نام خانوادگی را وارد کنید">
									<input class="input100" type="text" name="name" placeholder="نام و نام خانوادگی خود را وارد کنید">
								</div>

								<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "لطفا ایمیل خود را به درستی وارد کنید">
									<input class="input100" type="text" name="email" placeholder="ایمیل خود را وارد کنید">
								</div>

								<div class="wrap-input100 bg1 validate-input rs1-wrap-input100" data-validate="لطفا شماره تماس خود را وارد کنید">
									<input class="input100" type="text" name="phone" placeholder="شماره تماس خود را وارد کنید">
								</div>

								<div class="wrap-input100 bg1 ">
									<input class="input100" type="text" name="site" placeholder="وب سایت خود را وارد کنید">
								</div>

								<div class="wrap-input100 bg1" style="margin-bottom: 0;background: white;border:none;font-size: 15px">
								<span class="label-input100">فایل مربوط به طرح سفارشی</span>
								</div>

								<div class="wrap-input100 bg1 ">
									<input class="input100" type="file" name="file">
								</div>

								<div class="wrap-input100 input100-select bg1">
									<div>
										<select class="js-select2 service" name="service">
											<option value="انتخاب نشده">لطفا نوع حوله تبلیغاتی خود را انتخاب کنید</option>
											<option value="حوله دست و صورت سفارشی با ابعاد ۳۰ * ۳۰">حوله دست و صورت سفارشی با ابعاد ۳۰ * ۳۰</option>
											<option value="حوله دست و صورت سفارشی با ابعاد ۵۰ * ۳۰">حوله دست و صورت سفارشی با ابعاد ۵۰ * ۳۰</option>
											<option value="حوله دست و صورت سفارشی با ابعاد ۶۰ * ۳۰">حوله دست و صورت سفارشی با ابعاد ۶۰ * ۳۰</option>
											<option value="حوله دست و صورت سفارشی با ابعاد ۴۰ * ۸۰">حوله دست و صورت سفارشی با ابعاد ۴۰ * ۸۰</option>
											<option value="حوله دست و صورت سفارشی با ابعاد ۴۵ * ۹۰">حوله دست و صورت سفارشی با ابعاد ۴۵ * ۹۰</option>

											<option value="حوله سفارشی استخر و سونا با ابعاد ۱۴۰ * ۷۰">حوله سفارشی استخر و سونا با ابعاد ۱۴۰ * ۷۰</option>
											<option value="حوله سفارشی استخر و سونا با ابعاد ۱۴۰ * ۸۰">حوله سفارشی استخر و سونا با ابعاد ۱۴۰ * ۸۰</option>
											<option value="حوله سفارشی استخر و سونا با ابعاد ۱۵۰ * ۷۰">حوله سفارشی استخر و سونا با ابعاد ۱۵۰ * ۷۰</option>
											<option value="حوله سفارشی استخر و سونا با ابعاد ۱۵۰ * ۹۰">حوله سفارشی استخر و سونا با ابعاد ۱۵۰ * ۹۰</option>
											<option value="حوله سفارشی استخر و سونا با ابعاد ۱۰۰ * ۱۶۰">حوله سفارشی استخر و سونا با ابعاد ۱۰۰ * ۱۶۰</option>
											<option value="حوله تن پوش">حوله تن پوش</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>

								<div class="w-full dis-none js-show-service">
									<div class="wrap-contact100-form-radio">
										<span class="label-input100">نوع بافت لوگو یا طرح سفارشی بر روی حوله</span>
										<div class="contact100-form-radio m-t-15">
											<input class="input-radio100" id="radio1" type="radio" name="type_product" value="بافت روی خاب حوله" checked="checked">
											<label class="label-radio100" for="radio1">
												بافت روی خاب حوله
											</label>
										</div>

										<div class="contact100-form-radio">
											<input class="input-radio100" id="radio2" type="radio" name="type_product" value="بافت روی بردر حوله">
											<label class="label-radio100" for="radio2">
												بافت روی بردر حوله
											</label>
										</div>

										<div class="contact100-form-radio">
											<input class="input-radio100" id="radio3" type="radio" name="type_product" value="بافت روی بردر و خاب حوله با هم">
											<label class="label-radio100" for="radio3">
												بافت روی بردر و خاب حوله با هم
											</label>
										</div>

										<div class="contact100-form-radio">
											<input class="input-radio100" id="radio4" type="radio" name="type_product" value="گلدوزی">
											<label class="label-radio100" for="radio4">
												گلدوزی
											</label>
										</div>

										<div class="contact100-form-radio">
											<input class="input-radio100" id="radio5" type="radio" name="type_product" value="چاپ">
											<label class="label-radio100" for="radio5">
												چاپ
											</label>
										</div>
									</div>

									<div class="wrap-input100 validate-input bg1"  data-validate="لطفا تعداد حوله ی مورد نظر خود را وارد کنید">
										<input class="input100" type="text" name="qty" placeholder="تعداد حوله ی مورد نظر خود را وارد کنید">
									</div>
								</div>

								<div class="wrap-input100 bg100 rs1-alert-validate" >
									<textarea class="input100" name="message" placeholder="توضیحات مورد نظر خود را وارد کنید"></textarea>
								</div>

								<div class="container-contact100-form-btn">
									<button class="contact100-form-btn" type="submit">
						<span>
							ارسال
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
									</button>
								</div>
							</form>
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
<!--===============================================================================================-->
<script src="/form/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="/form/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="/form/vendor/bootstrap/js/popper.js"></script>
<script src="/form/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="/form/vendor/select2/select2.min.js"></script>
<script>
    $(".js-select2").each(function(){
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });


        $(".js-select2").each(function(){
            $(this).on('select2:close', function (e){
                if($(this).val() == "انتخاب نشده") {
                    $('.js-show-service').slideUp();
                }
                else {
                    $('.js-show-service').slideUp();
                    $('.js-show-service').slideDown();
                }
            });
        });
    })
</script>
<!--===============================================================================================-->
<script src="/form/vendor/daterangepicker/moment.min.js"></script>
<script src="/form/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="/form/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="/form/vendor/noui/nouislider.min.js"></script>
<script>
    var filterBar = document.getElementById('filter-bar');

    noUiSlider.create(filterBar, {
        start: [ 1500, 3900 ],
        connect: true,
        range: {
            'min': 1500,
            'max': 7500
        }
    });

    var skipValues = [
        document.getElementById('value-lower'),
        document.getElementById('value-upper')
    ];

    filterBar.noUiSlider.on('update', function( values, handle ) {
        skipValues[handle].innerHTML = Math.round(values[handle]);
        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
    });

    function check() {
        if($('.service').val()==='none'){
            return false;
        }
        else{
            return true;
        }
    }

</script>
<!--===============================================================================================-->
<script src="/form/js/main.js"></script>

</body>
</html>
