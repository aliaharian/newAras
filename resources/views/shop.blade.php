<!DOCTYPE html>
<html lang="fa">
<head>
    <link rel="alternate" hreflang="en-us" href="https://arastowel.com/en/product">

    <link rel="alternate" hreflang="ar" href="https://arastowel.com/ar/product">
    <link rel="alternate" href="https://arastowel.com/product" hreflang="x-default">
    <title>حوله ارس - لیست محصولات و قیمت انواع حوله ی تن پوش، دست و صورت، استخری و حمام</title>
    @include('includes.headLinks')
    <link rel="canonical" href="{{route('shop')}}"/>

</head>
<body class="animsition loading">

@include('includes.header')

<div class="shopCatContainer">
    <div>
        <a href="{{route('shop')}}" class="activeMenu">همه</a>
        <a href="{{route('shop.category', ['category' => 'bathrobe-towel'])}}">حوله تن پوش</a>
        <a href="{{route('shop.category', ['category' => 'kids-towel'])}}">تن پوش کودک</a>
        <a href="{{route('shop.category', ['category' => 'hands-towel'])}}">حوله های ابعادی</a>
    </div>
</div>

<section class="promotionalHeader">
    <div class="promotionalHeaderInner">
        <div class="topCorners">
            <img src="/images/icons/corners/corner.svg"/>
            <img src="/images/icons/corners/corner.svg"/>
        </div>
        <div class="bottomCorners">
            <img src="/images/icons/corners/corner.svg"/>
            <img src="/images/icons/corners/corner.svg"/>
        </div>

        <h1 class="promoh1Shop"> برند حوله ارس ، تولیدکننده انواع حوله تن پوش ، حوله دست و صورت، حوله حمام ، حوله
            استخری، پالتویی و ...</h1>
        <h2 style="color:#fff;font-size: 14px;">
            برند حوله ارس مقابل دیدگان شماست. ما بر آنیم تا در هر نقطه‌ای از ایران که هستید

        </h2>
        <p class="promoparagraphShop text-center">

            از محصولات ما لذت ببرید و لبخند رضایت را بر لبانتان بنشانیم.
        </p>
    </div>
</section>


<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65 banner">
    <div>
        <div class="row" style="direction: rtl;">
            <div class="col-sm-12 p-b-10">
                <!-- Product -->
                <div class="gridContainer gridResNoPadding" style="margin-bottom:10px">
                    @foreach($products as $product)
                        @if($product->published==1)
                            @php($correct=1)
                            @if($correct==1)
                                <div class="singleGrid" style="margin-bottom: 30px">

                                    <img
                                        src="<?=Croppa::url($product->image, 590, 590); ?>"
                                        alt="{{$product->name}}">

                                    <h3>{{$product->name}}</h3>
                                    <p class="block2-price m-text6 p-r-5 home-product-price">
                                        @if($product->qty!=0)
                                            @if($product->variable!=2)
                                                @if($product->off->count()>0)
                                                    @php($oldprice=$product->price)
                                                    @foreach($product->off as $off)
                                                        @if(strtotime($off->start)<time() && strtotime($off->end)>time())
                                                            @php($percent=100-$off->percent) @php($newprice=$oldprice*$percent/100)
                                                            <span style="text-decoration: line-through"
                                                                  class="home-product-price"> {{number_format($oldprice)}} تومان</span>

                                                            <span style="color: purple;"
                                                                  class="home-product-price"> {{number_format(($newprice))}}تومان </span>
                                                            @php($hasoff=1)
                                                        @else
                                                            {{number_format($product->price)}} تومان

                                                        @endif
                                                    @endforeach
                                                @else
                                                    {{number_format($product->price)}} تومان
                                                @endif

                                            @endif
                                            @if($product->variable==2)
                                                @php($price=0)

                                                @foreach($sizes as $size)
                                                    @if($size->product_id==$product->id)
                                                        @php($price=$size->price)
                                                    @endif

                                                @endforeach

                                                @if($product->off->count()>0)
                                                    @php($oldprice=$price)
                                                    @foreach($product->off as $off)
                                                        @if(strtotime($off->start)<time() && strtotime($off->end)>time())
                                                            @php($percent=100-$off->percent) @php($newprice=$oldprice*$percent/100)
                                                            <span style="text-decoration: line-through;"
                                                                  class="home-product-price"> {{number_format($oldprice)}} تومان</span>
                                                            <span style="color: purple;"
                                                                  class="home-product-price"> {{number_format(($newprice))}}تومان </span>
                                                            @php($hasoff=1)
                                                        @else
                                                            {{number_format($price)}} تومان
                                                        @endif
                                                    @endforeach
                                                @else
                                                    {{number_format($price)}} تومان
                                                @endif


                                            @endif
                                        @else
                                            ناموجود
                                        @endif
                                    </p>
                                    <a href="{{route('shop.product',['product_id' => $product->id , 'product_name'=>str_replace(' ','-',$product->name)])}}">خرید
                                        محصول</a>

                                </div>
                                {{--                                <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">--}}
                                {{--                                    <!-- Block2 -->--}}
                                {{--                                    <div class="block2">--}}
                                {{--                                        <div class="block2-img wrap-pic-w of-hidden pos-relative">--}}
                                {{--                                            <img src="{{$product->image}}" alt="{{$product->name}}">--}}

                                {{--                                            <div--}}
                                {{--                                                onclick="window.location.href='{{route('shop.product',['product_id' => $product->id , 'product_name'=>str_replace(' ','-',$product->english_name)])}}'"--}}
                                {{--                                                style="cursor: pointer" class="block2-overlay trans-0-4">--}}
                                {{--                                                @if(\Illuminate\Support\Facades\Auth::check())--}}

                                {{--                                                    <a title="{{$product->name}}"--}}
                                {{--                                                       class="block2-btn-addwishlist hov-pointer trans-0-4"--}}
                                {{--                                                       id="{{$product->id}}">--}}
                                {{--                                                        <i class="icon-wishlist fa fa-heart-o @if(\App\favorite::where('product_id',$product->id)->where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->count()!=0)  dis-none  @endif "--}}
                                {{--                                                           style="color: purple" aria-hidden="true"></i>--}}
                                {{--                                                        <i class="icon-wishlist fa fa-heart @if(\App\favorite::where('product_id',$product->id)->where('user_id',\Illuminate\Support\Facades\Auth::user()->id)->count()==0)  dis-none  @endif "--}}
                                {{--                                                           style="color: purple" aria-hidden="true"></i>--}}
                                {{--                                                    </a>--}}
                                {{--                                                @endif--}}

                                {{--                                                <div class="block2-btn-addcart w-size1 trans-0-4">--}}
                                {{--                                                    <a title="خرید {{$product->name}}"--}}
                                {{--                                                       href="{{route('shop.product',['product_id' => $product->id , 'product_name'=>str_replace(' ','-',$product->name)])}}"--}}
                                {{--                                                       class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">--}}
                                {{--                                                        خرید محصول--}}
                                {{--                                                    </a>--}}
                                {{--                                                </div>--}}
                                {{--                                            </div>--}}
                                {{--                                        </div>--}}

                                {{--                                        <div class="block2-txt p-t-20">--}}
                                {{--                                            <a title="{{$product->name}}"--}}
                                {{--                                               href="{{route('shop.product',['product_id' => $product->id , 'product_name'=>str_replace(' ','-',$product->name)])}}"--}}
                                {{--                                               class="block2-name dis-block s-text3 p-b-5 home-product-name">--}}
                                {{--                                                {{$product->name}}--}}
                                {{--                                            </a>--}}

                                {{--                                            <span class="block2-price m-text6 p-r-5 home-product-price">--}}
                                {{--								@if($product->qty!=0)--}}
                                {{--                                                    @if($product->variable!=2)--}}
                                {{--                                                        @if($product->off->count()>0)--}}
                                {{--                                                            @php($oldprice=$product->price)--}}
                                {{--                                                            @foreach($product->off as $off)--}}
                                {{--                                                                @if(strtotime($off->start)<time() && strtotime($off->end)>time())--}}
                                {{--                                                                    @php($percent=100-$off->percent) @php($newprice=$oldprice*$percent/100)--}}
                                {{--                                                                    <span style="text-decoration: line-through"--}}
                                {{--                                                                          class="home-product-price"> {{number_format($oldprice)}} تومان</span>--}}

                                {{--                                                                    <span style="color: purple;"--}}
                                {{--                                                                          class="home-product-price"> {{number_format(($newprice))}}تومان </span>--}}
                                {{--                                                                    @php($hasoff=1)--}}
                                {{--                                                                @else--}}
                                {{--                                                                    {{number_format($product->price)}} تومان--}}

                                {{--                                                                @endif--}}
                                {{--                                                            @endforeach--}}
                                {{--                                                        @else--}}
                                {{--                                                            {{number_format($product->price)}} تومان--}}
                                {{--                                                        @endif--}}

                                {{--                                                    @endif--}}
                                {{--                                                    @if($product->variable==2)--}}
                                {{--                                                        @php($price=0)--}}

                                {{--                                                        @foreach($sizes as $size)--}}
                                {{--                                                            @if($size->product_id==$product->id)--}}
                                {{--                                                                @php($price=$size->price)--}}
                                {{--                                                            @endif--}}

                                {{--                                                        @endforeach--}}

                                {{--                                                        @if($product->off->count()>0)--}}
                                {{--                                                            @php($oldprice=$price)--}}
                                {{--                                                            @foreach($product->off as $off)--}}
                                {{--                                                                @if(strtotime($off->start)<time() && strtotime($off->end)>time())--}}
                                {{--                                                                    @php($percent=100-$off->percent) @php($newprice=$oldprice*$percent/100)--}}
                                {{--                                                                    <span style="text-decoration: line-through;"--}}
                                {{--                                                                          class="home-product-price"> {{number_format($oldprice)}} تومان</span>--}}
                                {{--                                                                    <span style="color: purple;"--}}
                                {{--                                                                          class="home-product-price"> {{number_format(($newprice))}}تومان </span>--}}
                                {{--                                                                    @php($hasoff=1)--}}
                                {{--                                                                @else--}}
                                {{--                                                                    {{number_format($price)}} تومان--}}
                                {{--                                                                @endif--}}
                                {{--                                                            @endforeach--}}
                                {{--                                                        @else--}}
                                {{--                                                            {{number_format($price)}} تومان--}}
                                {{--                                                        @endif--}}


                                {{--                                                    @endif--}}
                                {{--                                                @else--}}
                                {{--                                                    ناموجود--}}
                                {{--                                                @endif--}}
                                {{--									</span>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            @endif
                        @endif
                    @endforeach


                </div>

                <!-- Pagination -->
                <div class="pagination flex-m flex-w p-t-26">
                    {{$products->links()}}

                </div>
            </div>
        </div>
    </div>
</section>
{{--seo section--}}
{{--<section class="shipping bgwhite">--}}
{{--    <div class="flex-w p-l-15 p-r-15 "--}}
{{--         style="background-color:#c788bc;text-align: center;direction: rtl;padding: 50px 0;">--}}
{{--        <div class="container">--}}
{{--            <h1 style="font-size: 20px;color: white;padding-bottom:10px;text-align: center">برند حوله ارس ، تولیدکننده--}}
{{--                انواع حوله تن پوش ، حوله دست و صورت، حوله حمام ، حوله استخری، پالتویی و ...</h1>--}}
{{--            <h2 style="font-size: 20px;color: white;text-align: center"> برند حوله ا رس مقابل دیدگان شماست . ما بر آنیم--}}
{{--                تا در هر نقطه‌ای از ایران که هستید </h2>--}}

{{--            <p style="color: white;text-align: center!important;font-size: 20px;"> از محصولات ما لذت ببرید و لبخند رضایت--}}
{{--                را بر لبانتان بنشانیم. </p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<!-- Footer -->
@include('instaCarousel')

@include('includes.footer')
@include('includes.copyright')

@include('includes.footerLinks')

</body>
</html>
