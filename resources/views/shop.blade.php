<!DOCTYPE html>
<html lang="fa">
<head>
    <link rel="alternate" hreflang="en-us" href="https://arastowel.com/en/product">

    <link rel="alternate" hreflang="ar" href="https://arastowel.com/ar/product">
    <link rel="alternate" href="https://arastowel.com/product" hreflang="x-default">
    <title>حوله ارس - لیست محصولات و قیمت انواع حوله تن پوش، دست و صورت، استخری و حمام</title>
    @include('includes.headLinks')
    <link rel="canonical" href="{{route('shop')}}"/>

    <script>
        const worker = new Worker('./js/worker.js')
        @foreach($products as $product)
        @if($product->published==1)
        worker.postMessage({
            work: "loadProductImage",
            id: "{{$product->id}}",
            name: "thumbSmall",
            url: "{{str_replace("/files/","/getFile/files/",$product->image)}}?w=100&h=100&blur=10"
        })
        @endif
            @endforeach

            worker.onmessage = (e) => {
            const elem = $(`#imageProduct${e.data.id}`);
            if (e.data.work === "loadProductImage") {
                let flag = false;
                if (e.data.name === "thumbSmall" && !elem.hasClass("thumbBig") && !elem.hasClass("fullyLoaded")) {
                    flag = true
                } else if (e.data.name === "thumbBig" && !elem.hasClass("fullyLoaded")) {
                    flag = true
                } else if (e.data.name === "originalImage") {
                    flag = true
                }

                if (flag) {
                    elem.attr("src", URL.createObjectURL(e.data.value))
                    elem.css("display", "block")
                    $(`#imageProductLoader${e.data.id}`).css("display", "none")
                    switch (e.data.name) {
                        case "thumbSmall":
                            elem.addClass("thumbSmall")
                            break;
                        case "thumbBig":
                            elem.removeClass("thumbSmall")
                            elem.addClass("thumbBig")
                            break;
                        case "originalImage":
                            elem.removeClass("thumbSmall")
                            elem.removeClass("thumbBig")
                            elem.addClass("fullyLoaded")
                            break;
                    }
                }

            }
        }

        $(window).on("load", () => {
            @foreach($products as $product)
            @if($product->published==1)

            worker.postMessage({
                work: "loadProductImage",
                id: "{{$product->id}}",
                name: "thumbBig",
                url: "{{str_replace("/files/","/getFile/files/",$product->image)}}?w=300&h=300&blur=5"
            })
            @endif
            @endforeach

            @foreach($products as $product)
            @if($product->published==1)
            worker.postMessage({
                work: "loadProductImage",
                id: "{{$product->id}}",
                name: "originalImage",
                url: "{{str_replace("/files/","/getFile/files/",$product->image)}}?w=900&h=900"
            })
            @endif
            @endforeach


        })


    </script>

</head>
<body class="animsition loading">

@include('includes.header')

<div class="shopCatContainer">
    <div>
        <a href="{{route('shop')}}" class="activeMenu">همه</a>
        <a href="{{route('shop.category', ['category' => 'bathrobe-towel'])}}">حوله تن پوش</a>
        <a href="{{route('shop.category', ['category' => 'kids-towel'])}}">تن پوش کودک</a>
        <a href="{{route('shop.category', ['category' => 'hands-towel'])}}">حوله دستی ، حوله استخری ، حوله حمام</a>
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


</body>
</html>
