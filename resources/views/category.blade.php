<!DOCTYPE html>
<html lang="fa">
<head>
    <link rel="alternate" hreflang="en-us"
          href="https://arastowel.com/en/products/category/{{$categoryArray->english_name}}">

    <link rel="alternate" hreflang="ar"
          href="https://arastowel.com/ar/products/category/{{$categoryArray->english_name}}">
    <link rel="alternate" href="https://arastowel.com/products/category/{{$categoryArray->english_name}}"
          hreflang="x-default">
    <title>{{$categoryArray->header}}</title>
    <meta name="description" content="خرید اینترنتی بهترین حوله تن پوش، پالتویی، استخری، مسافرتی، دست و صورت با قیمت مناسب از حوله ارس">
    @include('includes.headLinks')

</head>
<body class="animsition loading">

@include('includes.header')

<div class="shopCatContainer">
    <div>
        <a href="{{route('shop')}}">همه</a>
        <a class="@if($currCat=='bathrobe-towel') activeMenu @endif"
           href="{{route('shop.category', ['category' => 'bathrobe-towel'])}}">حوله تن پوش</a>
        <a class="@if($currCat=='kids-towel') activeMenu @endif"
           href="{{route('shop.category', ['category' => 'kids-towel'])}}">تن پوش کودک</a>
        <a class="@if($currCat=='hands-towel') activeMenu @endif"
           href="{{route('shop.category', ['category' => 'hands-towel'])}}">حوله های ابعادی</a>
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

        <h2 class="promoh1Shop" style="font-size: 24px !important">{{$categoryArray->name}}</h2>
        <div class="catHeaderContainer">
            {!!$categoryArray->description!!}
        </div>

    </div>
</section>

<section class="bgwhite p-t-55 p-b-65 banner">
    <div>
        <div class="row" style="direction: rtl;">

            <div class="col-sm-12 p-b-10">
                {{--				<div class="row">--}}
                <div class="gridContainer gridResNoPadding" style="margin-bottom:10px">
                    @foreach($products as $product)
                        @if($product->published==1)
                            @php($correct=0)
                            @foreach($product->categories as $category)
                                @if($category->id==$categoryArray->id)
                                    @php($correct=1)
                                @endif
                            @endforeach
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

<!-- Footer -->
@include('instaCarousel')

@include('includes.footer')
@include('includes.copyright')

@include('includes.footerLinks')

</body>
</html>
