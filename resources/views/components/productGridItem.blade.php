<div class="singleGrid" style="margin-bottom: 30px">
    <a href="{{route('shop.product',['product_id' => $product->id , 'product_name'=>str_replace(' ','-',$product->name)])}}">

        <img
            src="{{$product->image}}"
            alt="{{$product->name}}"
            style="aspect-ratio: 1/1;display: none"
            id="imageProduct{{$product->id}}"
        >
        <div
            id="imageProductLoader{{$product->id}}"
             style="width:100%;display: flex;justify-content: center">
            <img
                src="/files/loading.gif"
                style="aspect-ratio: 1/1;max-width: 40px; margin:50% 0;"
            >
        </div>


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
        <a class="homepageMoreLink"
           href="{{route('shop.product',['product_id' => $product->id , 'product_name'=>str_replace(' ','-',$product->name)])}}">خرید
            محصول</a>
    </a>
</div>
