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
                                @component('components.productGridItem',["product"=>$product,"sizes"=>$sizes])

                                @endcomponent

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

<script>
    $(window).on("load", () => {
        const worker = new Worker('./js/worker.js')
        @foreach($products as $product)
        @if($product->published==1)
        worker.postMessage({
            work: "loadProductImage",
            id: "{{$product->id}}",
            url: "<?=Croppa::url($product->image, 1600, 1600); ?>"
        })
        @endif
        @endforeach


        // URL.createObjectURL(image)
        worker.onmessage = (e) => {
            if (e.data.work === "loadProductImage") {
                // console.log("url", URL.createObjectURL(e.data.value))
                $(`#imageProduct${e.data.id}`).attr("src", URL.createObjectURL(e.data.value))
                $(`#imageProduct${e.data.id}`).css("display", "block")
                $(`#imageProductLoader${e.data.id}`).css("display", "none")

            }
        }
    })


</script>

</body>
</html>
