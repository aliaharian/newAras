<!DOCTYPE html>
<html lang="ar">
<head>
	<title>
		مارکة أرس للمناشف تعد الشركة المصنعة لجميع أنواع المناشف القابلة للأرتداء، مناشف الید والوجه ، مناشف الحمام ومناشف المسابح ومناشف المعطفیة وغیرها من مناشف أخري
	</title>
	@include('ar.includes.headLinks')

</head>
<body class="animsition loading">

@include('ar.includes.header')


<!-- Title Page -->
@foreach($template as $temp)

	@if($temp->place=='shopHeader')
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(/images/shop-headerar.jpg);">
		<h2 class="l-text2 t-center">
		</h2>
	</section>
	@endif
	@endforeach


	<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row" style="direction: rtl;">
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					<h4 class="m-text14 p-b-7">
						الفئات
					</h4>
					<ul class="p-b-54">
						<li class="p-t-4">
							<a title="کل المناشف" href="{{route('ar-shop')}}" class="catText ">
								الكل
							</a>
						</li>

						<li class="p-t-4">
							<a title="مناشف قابلة للأرتداء" href="{{route('ar-shop.category', ['category' => 'bathrobe-towel'])}}" class="catText">
								مناشف قابلة للأرتداء
							</a>
						</li>

						<li class="p-t-4">
							<a title="مناشف قابلة للأرتداء للأطفال" href="{{route('ar-shop.category', ['category' => 'kids-towel'])}}" class="catText">
								مناشف قابلة للأرتداء للأطفال
							</a>
						</li>

						<li class="p-t-4">
							<a title="مناشف أبعادیة" href="{{route('ar-shop.category', ['category' => 'hands-towel'])}}" class="catText">
								مناشف أبعادیة
							</a>
						</li>

						<li class="p-t-4">
							<a title="مناشف ترويجية" href="{{route('ar-promotional-towels')}}" class="catText">
								مناشف ترويجية
							</a>
						</li>

						<li class="p-t-4">
							<a title="مناشف للهدايا" href="{{route('ar-gift-pack')}}" class="catText">
								مناشف للهدايا
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-sm-6 col-md-8 col-lg-9 p-b-10">
				<!-- Product -->
				<div class="row">
					@foreach($products as $product)
						@if($product->published==1)

						<div class=" col-sm-12 col-md-6 col-lg-4 col-xl-4 p-b-50">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="<?=Croppa::url($product->image, 270, 360); ?>" alt="{{$product->arabic_name}}">

							</div>

							<div class="block2-txt p-t-20 ">
								<span class="block2-name dis-block s-text3 p-b-5 home-product-name">
									{{$product->arabic_name}}
								</span>

							</div>
						</div>
					</div>
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
<section class="shipping bgwhite" >
	<div class="flex-w p-l-15 p-r-15 " style="background-color:#c788bc;text-align: center;direction: rtl;padding: 50px 0;">
		<div class="container">
			<h1 style="font-size: 24px;color: white;padding-bottom:10px;text-align: center">
				مارکة أرس للمناشف تعد الشركة المصنعة لجميع أنواع المناشف القابلة للأرتداء، مناشف الید والوجه ، مناشف الحمام ومناشف المسابح ومناشف المعطفیة وغیرها من مناشف أخري
			</h1>
			<h2 style="font-size: 24px;color: white;text-align: center">
				ماركة أرس للمناشف هي مقابل عينيك.
			</h2>

			<p style="color: white;text-align: center!important;font-size: 24px;"> نحن نريد لك الاستمتاع بمنتجاتنا في أي مكان في إيران.

			</p>
		</div>
	</div>
</section>

	<!-- Footer -->
@include('ar.includes.footer')
@include('ar.includes.copyright')

@include('ar.includes.footerLinks')

</body>
</html>
