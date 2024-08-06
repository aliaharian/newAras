@include("includes.getUserIp")
@php
    $user_ip = getUserIP();
             $agent = new \Jenssegers\Agent\Agent();
             $user_platform = $agent->platform();
             $user_browser = $agent->browser();
         $pre_order=\App\Pre_order::where('user_ip',$user_ip)->where('user_platform',$user_platform)->where('user_browser',$user_browser)->get();
         $template = \App\templateSetting::all();
         @endphp
<div class="modal">
    <div class="animsition-loading-1">
        <div data-loader="ball-scale">
        </div>
    </div>
</div>


<div class="wrap_header fixed-header2 trans-0-4">
    <a title="حوله ارس" href="{{route('index')}}" class="logo">
        <img src="/images/footer/footerLogo.svg" height="50" alt="حوله ارس" title="حوله ارس">
    </a>

    <div class="wrap_menu">
        <nav class="menu">
            <ul class="main_menu">
                <li>
                    <a title="صفحه اصلی حوله ارس" href="{{route('index')}}">صفحه اصلی</a>
                </li>
                <li>
                    <a title="درباره حوله ارس" href="{{route('about-us')}}">درباره ما</a>
                </li>
                <li>
                    <a title="خرید اینترنتی حوله" href="{{route('shop')}}">فروشگاه</a>
                </li>
                <li>
                    <a title="فروشگاه اینترنتی" href="{{route('promotional-towels')}}">حوله های تبلیغاتی</a>
                </li>
                <li>
                    <a title="فروشگاه اینترنتی" href="{{route('shop.category', ['category' => 'bathrobe-towel'])}}">حوله
                        تن پوش</a>
                </li>

                <li>
                    <a title="حوله های هدیه" href="{{route('gift-pack')}}">حوله های هدیه</a>
                </li>
                <li>
                    <a title="بلاگ حوله ارس" href="{{route('blog')}}">بلاگ</a>
                </li>
                <li>
                    <a title="تماس با حوله ارس" href="{{route('contact-us')}}">تماس با ما</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="header-icons">
        <a title="ورود به حوله ارس" href="{{route('login')}}" class="header-wrapicon1 dis-block">
            @if(\Illuminate\Support\Facades\Auth::check())
                <img src="/svg/logged_user.svg" class="header-icon1" alt="ورود به حوله ارس" title="ورود به حوله ارس"
                     width="28">
            @else
                <img src="/svg/user.svg" class="header-icon1" alt="ورود به حوله ارس" title="ورود به حوله ارس"
                     width="28">
            @endif
        </a>

        <span class="linedivide1"></span>

        <div class="header-wrapicon2">

            <img src="/svg/cart.svg" style="height: 28px" alt="سبد خرید" class="opencart">
            <span class="header-icons-noti">{{$pre_order->count()}}</span>

            <div class="header-cart header-dropdown c-navi-list__dropdown c-navi-list__basket-dropdown js-dropdown-menu"
                 style="display: block;">
                @if($pre_order->count()!=0)

                    <div class="c-navi-list__basket-header">
                        <div class="c-navi-list__basket-total">
                            @php $total_price=0;$off_total_price=0; @endphp
                            @foreach($pre_order as $order)
                                @php
                                    $off_total_price+=($order->off_price*$order->qty);
                                    $total_price+=($order->price*$order->qty);
                                @endphp
                            @endforeach
                            <span>مبلغ کل خرید:</span>
                            <span style="font-size: 17px;color: purple">
		{{number_format($off_total_price)}}تومان
			</span>
                        </div>

                    </div>
                @else
                    <div class="alert alert-info">برای شروع خرید به صفحه فروشگاه مراجعه کنید</div>
                @endif

                <ul class="c-navi-list__basket-list">
                    @foreach($pre_order as $order)

                        <li class="js-mini-cart-item">
                            <button class="c-navi-list__basket-item-remove" style="text-align: center"
                                    id="{{$order->id}}" onclick="deleteorder(this.id);">X
                            </button>

                            <div class="c-navi-list__basket-item-content">
                                <div class="c-navi-list__basket-item-image">
                                    <img alt="{{\App\Product::find($order->product_id)->name}}"
                                         title="{{\App\Product::find($order->product_id)->name}}"
                                         src="{{$order->image}}" width="45">
                                </div>
                                <div class="c-navi-list__basket-item-details">
                                    <div class="c-navi-list__basket-item-title">
                                        {{\App\Product::find($order->product_id)->name}}
                                    </div>
                                    <div class="c-navi-list__basket-item-params">
                                        <div class="c-navi-list__basket-item-props">
                                            <span> {{$order->qty}} عدد</span>
                                            @if($order->color_id!=0||$order->size_id!=0)
                                                &nbsp;
                                                <span>رنگ
                                                    {{\App\Color::find($order->color_id)->name}}
									</span>
                                            @endif
                                            @if($order->size_id!=0)
                                                <span>سایز
                                                    {{\App\size::find($order->size_id)->name}}
									</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </li>
                    @endforeach


                </ul>
                @if($pre_order->count()!=0)
                    <a title="ثبت سفارش و ارسال" href="{{route('shipping')}}" class="c-navi-list__basket-submit"
                       style="left:10px">ثبت سفارش و ارسال</a>
                    <a title="مشاهده سبد خرید" href="{{route('cart')}}" class="c-navi-list__basket-submit"
                       style="right:10px">مشاهده سبد خرید</a>

                @else
                    <a title="صفحه اصلی" href="{{route('index')}}" class="c-navi-list__basket-submit" style="left:10px">صفحه
                        اصلی</a>
                    <a title="فروشگاه" href="{{route('shop')}}" class="c-navi-list__basket-submit" style="right:10px">فروشگاه</a>
                @endif
            </div>


        </div>
        <span class="linedivide1"></span>

        <!--<select class="js-example-basic-single" onchange="redirectlang()">-->
        <!--	<option value="fa" selected>&nbsp;&nbsp;فارسی&nbsp;&nbsp;</option>-->
        <!--	<option value="en">English</option>-->
        <!--	<option value="ar">&nbsp;&nbsp;العربیه&nbsp;&nbsp;</option>-->
        <!--</select>-->

    </div>
</div>

<div class="flex-c-m size22 bg0 s-text21 pos-relative direction-rtl" style="background-color:#a7c6e9;color:#14334c">
    جهت هرگونه مشاوره در خدمت شما هستیم. تلفن:
    <a href="tel:+989121331044" class=" hovblack" style="color:#14334c;margin-right:3px;direction: ltr;font-size:12px;">

        ۰۹۱۲-۱۳۳۱۰۴۴

    </a>

    &nbsp;


</div>

<header class="header2">
    <div class="container-menu-header-v2 p-t-26" style="background: #fff">
        <div class="topbar2">
            <div class="topbar-social">
                <a title="فیسبوک" href="https://www.facebook.com/Arastowel/" target="_blank"
                   class="topbar-social-item fa fa-facebook"></a>
                <a title="اینستاگرام" href="https://www.instagram.com/arastowel/" target="_blank"
                   class="topbar-social-item fa fa-instagram"></a>
                <a title="پینترست" href="https://www.pinterest.com/arastowel/"
                   class="topbar-social-item fa fa-pinterest-p" target="_blank"></a>
                <a title="لینکدین" href="https://www.linkedin.com/in/arastowel?trk=hp-identity-name" target="_blank"
                   class="topbar-social-item fa fa-linkedin"></a>
                <a title="توییتر" href="https://twitter.com/ArasTowel" class="topbar-social-item fa fa-twitter"
                   target="_blank"></a>
                <a title="یوتوب" href="https://www.youtube.com/channel/UCbPadIvVrH0MIciIZz52SGA" target="_blank"
                   class="topbar-social-item fa fa-youtube"></a>
            </div>

            <a title="حوله ارس" href="{{route('index')}}" class="logo2">
                <img src="/images/footer/footerLogo.svg" height="50" alt="حوله ارس" title="حوله ارس">
            </a>

            <div class="topbar-child2" style="direction: ltr">


                <a title="ورود به حوله ارس" href="{{route('login')}}" class="header-wrapicon1 dis-block">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <img src="/svg/logged_user.svg" width="28" class="header-icon1" alt="کاربر وارد شده">
                    @else
                        <img src="/svg/user.svg" class="header-icon1" alt="ورود به حوله ارس" title="ورود به حوله ارس"
                             width="28">
                    @endif                </a>

                <span class="linedivide1"></span>

                <div class="header-wrapicon2">

                    <img src="/svg/cart.svg" style="height: 28px" alt="سبد خرید" class="opencart">
                    <span class="header-icons-noti">{{$pre_order->count()}}</span>

                    <div
                        class="header-cart header-dropdown c-navi-list__dropdown c-navi-list__basket-dropdown js-dropdown-menu"
                        style="display: block;">
                        @if($pre_order->count()!=0)

                            <div class="c-navi-list__basket-header">
                                <div class="c-navi-list__basket-total">
                                    @php $total_price=0;$off_total_price=0; @endphp
                                    @foreach($pre_order as $order)
                                        @php
                                            $off_total_price+=($order->off_price*$order->qty);
                                            $total_price+=($order->price*$order->qty);
                                        @endphp
                                    @endforeach
                                    <span>مبلغ کل خرید:</span>
                                    <span style="font-size: 17px;color: purple">
		{{number_format($off_total_price)}}تومان
			</span>
                                </div>

                            </div>
                        @else
                            <div class="alert alert-info">برای شروع خرید به صفحه فروشگاه مراجعه کنید</div>
                        @endif

                        <ul class="c-navi-list__basket-list">
                            @foreach($pre_order as $order)

                                <li class="js-mini-cart-item">
                                    <button class="c-navi-list__basket-item-remove" style="text-align: center"
                                            id="{{$order->id}}" onclick="deleteorder(this.id);">X
                                    </button>

                                    <div class="c-navi-list__basket-item-content">
                                        <div class="c-navi-list__basket-item-image">
                                            <img alt="{{\App\Product::find($order->product_id)->name}}" width="45"
                                                 src="{{$order->image}}">
                                        </div>
                                        <div class="c-navi-list__basket-item-details">
                                            <div class="c-navi-list__basket-item-title">
                                                {{\App\Product::find($order->product_id)->name}}
                                            </div>
                                            <div class="c-navi-list__basket-item-params">
                                                <div class="c-navi-list__basket-item-props">
                                                    <span> {{$order->qty}} عدد</span>
                                                    @if($order->color_id!=0||$order->size_id!=0)
                                                        &nbsp;
                                                        <span>رنگ
                                                            {{\App\Color::find($order->color_id)->name}}
									</span>
                                                    @endif
                                                    @if($order->size_id!=0)
                                                        <span>سایز
                                                            {{\App\size::find($order->size_id)->name}}
									</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </li>
                            @endforeach


                        </ul>
                        @if($pre_order->count()!=0)
                            <a title="ثبت سفارش و ارسال" href="{{route('shipping')}}" class="c-navi-list__basket-submit"
                               style="left:10px">ثبت سفارش و ارسال</a>
                            <a title="مشاهده سبد خرید" href="{{route('cart')}}" class="c-navi-list__basket-submit"
                               style="right:10px">مشاهده سبد خرید</a>

                        @else
                            <a title="صفحه اصلی" href="{{route('index')}}" class="c-navi-list__basket-submit"
                               style="left:10px">صفحه اصلی</a>
                            <a title="فروشگاه" href="{{route('shop')}}" class="c-navi-list__basket-submit"
                               style="right:10px">فروشگاه</a>
                        @endif
                    </div>


                </div>

                <span class="linedivide1"></span>

                <!--<select class="js-example-basic-single redirectlang2" onchange="redirectlang2()">-->
                <!--	<option value="fa">&nbsp;&nbsp;فارسی&nbsp;&nbsp;</option>-->
                <!--		<option value="en">English</option>-->

                <!--		<option value="ar">&nbsp;&nbsp;العربیه&nbsp;&nbsp;</option>-->
                <!--</select>-->
            </div>
        </div>

        <div class="wrap_header mm_grand_parent">

            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a title="صفحه اصلی" href="{{route('index')}}">صفحه اصلی</a>
                        </li>
                        <li>
                            <a title="درباره ما" href="{{route('about-us')}}">درباره ما</a>
                        </li>
                        <li>
                            <a title="فروشگاه اینترنتی" href="{{route('shop')}}">فروشگاه</a>
                        </li>
                        <li class="mm_parent">
                            <a title="فروشگاه اینترنتی" href="{{route('promotional-towels')}}">حوله های تبلیغاتی</a>
                            <div class="mm_menu">
                                @foreach($template as $temp)
                                    @if($temp->place=='promoMenu1' || $temp->place=='promoMenu2' || $temp->place=='promoMenu3' || $temp->place=='promoMenu4')
                                        <a href="{{$temp->link}}">
                                            <div>
                                                <img data-toggle="modal" data-target="#img_popup"
                                                     src="<?=Croppa::url($temp->image, 590, 590); ?>"
                                                     alt="{{$temp->text}}">
                                                <h4>{{$temp->text}}</h4>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                        <li class="mm_parent">
                            <a title="فروشگاه اینترنتی"
                               href="{{route('shop.category', ['category' => 'bathrobe-towel'])}}">حوله تن پوش</a>
                            <div class="mm_menu">
                                @foreach($template as $temp)
                                        @if($temp->place=='bathrobeMenu1' || $temp->place=='bathrobeMenu2' || $temp->place=='bathrobeMenu3' || $temp->place=='bathrobeMenu4')
                                            <a href="{{$temp->link}}">
                                                <div>
                                                    <img data-toggle="modal" data-target="#img_popup"
                                                         src="<?=Croppa::url($temp->image, 590, 590); ?>"
                                                         alt="{{$temp->text}}">
                                                    <h4>{{$temp->text}}</h4>
                                                </div>
                                            </a>
                                        @endif
                                @endforeach
                            </div>
                        </li>
                        <li>
                            <a title="حوله های هدیه" href="{{route('gift-pack')}}">حوله های هدیه</a>
                        </li>

                        <li>
                            <a title="بلاگ" href="{{route('blog')}}">بلاگ</a>
                        </li>


                        <li>
                            <a title="تماس با ما" href="{{route('contact-us')}}">تماس با ما</a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="header-icons">

            </div>
        </div>
    </div>

    <div class="wrap_header_mobile">
        <a title="حوله ارس" href="{{route('index')}}" class="logo-mobile">
            <img src="/images/footer/footerLogo.svg" height="50" alt="حوله ارس">
        </a>

        <div class="btn-show-menu">
            <div class="header-icons-mobile">
                <a title="ورود به حوله ارس" href="{{route('login')}}" class="header-wrapicon1 dis-block">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        <img src="/svg/logged_user.svg" class="header-icon1" width="28" alt="ورود به حوله ارس">
                    @else
                        <img src="/svg/user.svg" class="header-icon1" alt="ورود به حوله ارس" title="ورود به حوله ارس"
                             width="28">
                    @endif                </a>


                <div class="header-wrapicon2">

                    <img src="/svg/cart.svg" style="height: 28px" alt="سبد خرید" class="opencart"
                         style="visibility:hidden">
                    <span class="header-icons-noti" style="visibility:hidden">{{$pre_order->count()}}</span>

                    <div
                        class="header-cart header-dropdown c-navi-list__dropdown c-navi-list__basket-dropdown js-dropdown-menu"
                        style="display: block;">
                        @if($pre_order->count()!=0)

                            <div class="c-navi-list__basket-header">
                                <div class="c-navi-list__basket-total">
                                    @php $total_price=0;$off_total_price=0; @endphp
                                    @foreach($pre_order as $order)
                                        @php
                                            $off_total_price+=($order->off_price*$order->qty);
                                            $total_price+=($order->price*$order->qty);
                                        @endphp
                                    @endforeach
                                    <span>مبلغ کل خرید:</span>
                                    <span style="font-size: 17px;color: purple">
		{{number_format($off_total_price)}}تومان
			</span>
                                </div>

                            </div>
                        @else
                            <div class="alert alert-info">برای شروع خرید به صفحه فروشگاه مراجعه کنید</div>
                        @endif

                        <ul class="c-navi-list__basket-list">
                            @foreach($pre_order as $order)

                                <li class="js-mini-cart-item">
                                    <button class="c-navi-list__basket-item-remove" style="text-align: center"
                                            id="{{$order->id}}" onclick="deleteorder(this.id);">X
                                    </button>

                                    <div class="c-navi-list__basket-item-content">
                                        <div class="c-navi-list__basket-item-image">
                                            <img alt="{{\App\Product::find($order->product_id)->name}}" width="45"
                                                 src="{{$order->image}}">
                                        </div>
                                        <div class="c-navi-list__basket-item-details">
                                            <div class="c-navi-list__basket-item-title">
                                                {{\App\Product::find($order->product_id)->name}}
                                            </div>
                                            <div class="c-navi-list__basket-item-params">
                                                <div class="c-navi-list__basket-item-props">
                                                    <span> {{$order->qty}} عدد</span>
                                                    @if($order->color_id!=0||$order->size_id!=0)
                                                        &nbsp;
                                                        <span>رنگ
                                                            {{\App\Color::find($order->color_id)->name}}
									</span>
                                                    @endif
                                                    @if($order->size_id!=0)
                                                        <span>سایز
                                                            {{\App\size::find($order->size_id)->name}}
									</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </li>
                            @endforeach


                        </ul>
                        @if($pre_order->count()!=0)
                            <a title="ثبت سفارش و ارسال" href="{{route('shipping')}}" class="c-navi-list__basket-submit"
                               style="left:10px">ثبت سفارش و ارسال</a>
                            <a title="مشاهده سبد خرید" href="{{route('cart')}}" class="c-navi-list__basket-submit"
                               style="right:10px">مشاهده سبد خرید</a>

                        @else
                            <a title="صفحه اصلی" href="{{route('index')}}" class="c-navi-list__basket-submit"
                               style="left:10px">صفحه اصلی</a>
                            <a title="فروشگاه" href="{{route('shop')}}" class="c-navi-list__basket-submit"
                               style="right:10px">فروشگاه</a>
                        @endif
                    </div>


                </div>


            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
            </div>
        </div>
    </div>

    <div class="wrap-side-menu">
        <nav class="side-menu">
            <ul class="main-menu">

                <!--<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">-->


                <!--	<select class="js-example-basic-single redirectlang3" style="margin: auto" onchange="redirectlang3()">-->
                <!--			<option value="fa">&nbsp;&nbsp;فارسی&nbsp;&nbsp;</option>-->
                <!--			<option value="en">English</option>-->

                <!--			<option value="ar">&nbsp;&nbsp;العربیه&nbsp;&nbsp;</option>-->
                <!--		</select>-->
                <!--</li>-->

                <li class="item-topbar-mobile p-l-10">
                    <div class="topbar-social-mobile" style="text-align: center">
                        <a title="فیسبوک" href="https://www.facebook.com/Arastowel/" target="_blank"
                           class="topbar-social-item fa fa-facebook"></a>
                        <a title="اینستاگرام" href="https://www.instagram.com/arastowel/" target="_blank"
                           class="topbar-social-item fa fa-instagram"></a>
                        <a title="پینترست" href="https://www.pinterest.com/arastowel/"
                           class="topbar-social-item fa fa-pinterest-p" target="_blank"></a>
                        <a title="لینکدین" href="https://www.linkedin.com/in/arastowel?trk=hp-identity-name"
                           target="_blank" class="topbar-social-item fa fa-linkedin"></a>
                        <a title="توییتر" href="https://twitter.com/ArasTowel" class="topbar-social-item fa fa-twitter"
                           target="_blank"></a>
                        <a title="یوتوب" href="https://www.youtube.com/channel/UCbPadIvVrH0MIciIZz52SGA" target="_blank"
                           class="topbar-social-item fa fa-youtube"></a>
                    </div>
                </li>

                <li class="item-menu-mobile">
                    <a title="صفحه اصلی" href="{{route('index')}}">صفحه اصلی</a>
                </li>
                <li class="item-menu-mobile">
                    <a title="درباره ما" href="{{route('about-us')}}">درباره ما</a>
                </li>
                <li class="item-menu-mobile">
                    <a title="فروشگاه" href="{{route('shop')}}">فروشگاه</a>
                </li>
                <li class="item-menu-mobile">
                    <a title="فروشگاه اینترنتی" href="{{route('promotional-towels')}}">حوله های تبلیغاتی</a>
                </li>
                <li class="item-menu-mobile">
                    <a title="حوله های هدیه" href="{{route('gift-pack')}}">حوله های هدیه</a>
                </li>

                <li class="item-menu-mobile">
                    <a title="بلاگ" href="{{route('blog')}}">بلاگ</a>
                </li>


                <li class="item-menu-mobile">
                    <a title="تماس با ما" href="{{route('contact-us')}}">تماس با ما</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

