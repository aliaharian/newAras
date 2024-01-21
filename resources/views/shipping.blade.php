<!DOCTYPE html>
<html lang="fa">
<head>
    <title>تکمیل فرایند خرید - فروشگاه اینترنتی حوله ارس</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://statics.arastowel.com/css/profile.css">
    <link rel="stylesheet" href="https://statics.arastowel.com/css/shipping.css">

    @include('includes.headLinks')
    <script defer src="/js/jquery-bootstrap.js"></script>

</head>
<body class="animsition loading">

@include('includes.header')
<!-- Title Page -->
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m"
         style="background-color: #c8c8c8;padding-bottom: 0px;padding-top: 0px;min-height: 2px;">
</section>

<!-- content page -->
<section class="bgwhite p-t-40 p-b-38">

    <main id="main">
        <div id="HomePageTopBanner"></div>
        <div id="content">
            <div class="container c-shipment-page">

                <section class="o-page">
                    <div class="o-page__row">
                        <section class="o-page__content">
                            <div id="shipping-data">
                                <div class="o-headline o-headline--checkout">
                                    <span>انتخاب آدرس تحویل سفارش</span>
                                </div>
                                @foreach($addresses as $address)
                                    <div id="address-section">
                                        <div class="c-checkout-contact is-completed js-user-address-container"
                                             id="user-default-address-container">
                                            <div class="c-checkout-contact__content js-default-recipient-box">
                                                <ul class="c-checkout-contact__items">
                                                    <li class="c-checkout-contact__item c-checkout-contact__item--username">
                                                        گیرنده: <span
                                                                class="js-recipient-full_name">{{$address->name}} {{$address->last_name}}</span>
                                                    </li>
                                                    <li class="c-checkout-contact__item c-checkout-contact__item--location ">
                                                        <div class="c-checkout-contact__item c-checkout-contact__item--mobile">
                                                            شماره تماس: <span
                                                                    class="js-recipient-mobile_phone">{{$address->phone_number}}</span>
                                                        </div>
                                                        <div class="c-checkout-contact__item--message">
                                                            کد پستی: <span
                                                                    class="js-recipient-post_code">{{$address->postal_code}}</span>
                                                        </div>
                                                        <br>
                                                        استان <span>تهران</span>
                                                        ، شهرستان
                                                        <span>{{\App\country::where('id',$address->country_id)->value('name')}}</span>،
                                                        شهر
                                                        <span>{{\App\city::where('id',$address->city_id)->value('name')}}</span>،
                                                        <span>{{$address->address}}</span>
                                                    </li>
                                                    <li class="c-checkout-contact__item c-checkout-contact__item--message"></li>
                                                </ul>
                                                <div></div>
                                            </div>
                                            <a href="{{route('profile.address.edit')}}"
                                               class="c-checkout-contact__location" id="change-address-btn">تغییر آدرس
                                                ارسال</a>
                                        </div>
                                        <div class="c-checkout-address js-user-address-container"
                                             id="user-address-list-container" style="display: none">

                                            <button class="c-checkout-address__cancel"
                                                    id="cancel-change-address-btn"></button>
                                        </div>
                                    </div>
                                    <form method="post" action="{{route('add-invoice')}}">
                                        @csrf


                                        <ul class="c-checkout-paymethod m-b-20">
                                            <li data-event="change_payment_method">
                                                <div class="c-checkout-paymethod__item has-options js-checkout-paymethod__item is-selected is-select-mode">
                                                    <h4 class="c-checkout-paymethod__title">
                                                        شیوه های پرداخت
                                                    </h4>
                                                    <img data-src="" src="">
                                                </div>
                                                <div class="c-checkout-paymethod__options">
                                                    <div class="c-checkout-paymethod__providers">
                                                        <div class="c-checkout-paymethod__providers-arrow"></div>

                                                        <label class="">
                                                <span class="c-ui-radio" data-event="change_online_bank">
                                                    <input type="radio" name="bank_id" value="cash">
                                                    <span class="c-ui-radio__check"></span>
                                                </span>
                                                            <span class="c-checkout-paymethod__source-title"
                                                                  style="text-align: right;font-size: 13px;">پرداخت هنگام تحویل کالا</span>
                                                            <img data-src="https://statics.arastowel.com/images/e-pay.png"
                                                                 src="https://statics.arastowel.com/images/e-pay.png">
                                                        </label>


                                                        <label data-snt-event="dkPaymentPageClick">
                                                        <span class="c-ui-radio" data-event="change_online_bank">
                                                        <input type="radio" name="bank_id" checked value="zarinpal">
                                                        <span class="c-ui-radio__check"></span>
                                                        </span>
                                                            <span class="c-checkout-paymethod__source-title"
                                                                  style="text-align: right">زرین پال</span>
                                                            <img src="https://statics.arastowel.com/images/zarinpal.png">
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        @endforeach
                                        <div class="js-eco-delivery " style="">

                                            <div class="c-checkout-pack">
                                                <div class="c-checkout-pack__row">
                                                    <section
                                                            class="c-swiper c-swiper--products-compact js-swiper-box-container">
                                                        <div class="c-box">
                                                            @foreach($pre_order as $order)

                                                                <div class="swiper-container swiper-container-horizontal js-swiper-container js-swiper-cart-parcel swiper-container-rtl">
                                                                    <div class="swiper-wrapper"
                                                                         style="transform: translate3d(0px, 0px, 0px);">
                                                                        <div class="swiper-slide js-product-box-container swiper-slide-active"
                                                                             style="width: 161.167px;">
                                                                            <div class="c-product-box c-product-box--compact js-product-box">
                                                                                <div class="c-product-box__amount"
                                                                                     style="font-family: 'roya'">{{$order->qty}}</div>

                                                                                <a class="c-product-box__img js-url">
                                                                                    <img alt="{{\App\Product::find($order->product_id)->name}}"
                                                                                         class="swiper-lazy swiper-lazy-loaded"
                                                                                         src="{{$order->image}}"></a>
                                                                                <div class="c-product-box__title"
                                                                                     style="font-family: 'roya'">
                                                                                    {{\App\Product::find($order->product_id)->name}}
                                                                                    @if($order->color_id!=0&&$order->size_id==0)

                                                                                        <br>
                                                                                        رنگ
                                                                                        {{\App\Color::find($order->color_id)->name}}
                                                                                    @elseif($order->color_id!=0&&$order->size_id!=0)
                                                                                        <br>
                                                                                        رنگ

                                                                                        {{\App\Color::find($order->color_id)->name}}
                                                                                        <br>
                                                                                        سایز
                                                                                        {{\App\size::find($order->size_id)->name}}
                                                                                    @endif<br>

                                                                                    {{number_format($order->off_price*$order->qty)}}
                                                                                    تومان
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                        </div>

                            </div>


                            <div class="c-checkout__actions"><a href="/cart/" class="btn-link-spoiler">
                                    « بازگشت به سبد خرید
                                </a>
                            </div>

                        </section>

                        <aside class="o-page__asidei">
                            <div class="c-checkout-aside">
                                <div class="c-checkout-summary">
                                    <div class="c-checkout-summary__main">
                                        <ul class="c-checkout-summary__summary">
                                            @if($pre_order->count()!=0)
                                                <div class="header-cart-total">
                                                    @php $total_price=0;$off_total_price=0; @endphp
                                                    @foreach($pre_order as $order)
                                                        @php
                                                            $off_total_price+=($order->off_price*$order->qty);
                                                            $total_price+=($order->price*$order->qty);
                                                        @endphp
                                                    @endforeach

                                                    <li>
                                                        <span>مبلغ کل</span>
                                                        <span style="font-size: 17px;color: purple">
		{{number_format($off_total_price)}}تومان
			</span>

                                                        @endif
                                                    </li>
                                                    @php
                                                        $user_ip = getUserIP();
                                                                $agent = new \Jenssegers\Agent\Agent();
                                                                $user_platform = $agent->platform();
                                                                $user_browser = $agent->browser();
                                                                $gift=\App\gift_card::where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->where('used',0)->where('in_pre',1)->where('user_ip',$user_ip)->where('user_browser',$user_browser)->where('user_platform',$user_platform);
                                                    @endphp
                                                    @if($gift->count()==1)
                                                        <li>
                                                            <span>مبلغ تخفیف</span>
                                                            <span style="font-size: 17px;color: darkred">
                                                            {{number_format($off_total_price*($gift->value('percent'))/100)}}
                                                                تومان
			                                            </span>
                                                        </li>
                                                    @endif

                                                    <li>
                                                        <span>هزینه ارسال:</span>
                                                        <span>
                                                    <span>
                                                        @if($off_total_price>=500000)
                                                            <span>رایگان</span>
                                                        @else
                                                            <span>8,000 </span> تومان</span><span
                                                                    class="hidden"> + </span>

                                                            @endif
                                                </span>
                                                    </li>
                                                </div>
                                        </ul>
                                        <div class="c-checkout-summary__devider">
                                            <div>

                                            </div>
                                        </div>
                                        <div class="c-checkout-summary__content">
                                            <div class="c-checkout-summary__price-title">مبلغ قابل پرداخت:</div>
                                            <div class="c-checkout-summary__price-value">
                                                <span class="c-checkout-summary__price-value-amount"
                                                      id="cartPayablePrice" style="font-family: 'roya'">
                                                    <span>
                                                     @if($gift->count()==0)
                                                            @if($off_total_price>=500000)
                                                                <span>{{number_format($off_total_price)}} </span> </span><span
                                                            class="hidden"> + </span>
                                                    @else
                                                        <span>{{number_format($off_total_price+8000)}} </span> </span><span
                                                        class="hidden"> + </span>

                                                @endif
                                                @else

                                                    @if($off_total_price>=500000)
                                                        <span>{{number_format($off_total_price*(100-$gift->value('percent'))/100)}} </span> </span>
                                                    @else
                                                        <span>{{number_format(($off_total_price*(100-$gift->value('percent'))/100)+8000)}} </span> </span>


                                                        @endif

                                                        @endif

                                                        </span>
                                                        </span>
                                                        تومان
                                            </div>
                                            <button type="submit" class="btn-checkouti">تایید و ثبت سفارش</button>
                                        </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </section>
            </div>
        </div>
        <div id="sidebar">
            <aside>

            </aside>
        </div>
    </main>
</section>


<!-- Footer -->
@include('includes.footer')
@include('includes.footerLinks')

</body>
</html>
