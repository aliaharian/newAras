<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>Aras towel - sheet towels , bathrobe towels , hands towels , kids towels , promotional towels and gift towels price list</title>
	@include('en.includes.headLinks')
	<link rel="canonical" href="{{route('en-shop')}}"/>

</head>
<body class="animsition loading">

@include('en.includes.header')


<!-- Title Page -->
@foreach($template as $temp)

	@if($temp->place=='shopHeader')
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(/images/shop-headeren.jpg);">
		<h2 class="l-text2 t-center">
		</h2>
	</section>
	@endif
	@endforeach


	<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row" style="direction: ltr;">
			<div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					<h4 class="m-text14 p-b-7">
						Categories
					</h4>
					<ul class="p-b-54">
						<li class="p-t-4">
							<a hreflang="en-us" title="All products" href="{{route('en-shop')}}" class="catText ">
								All
							</a>
						</li>

						<li class="p-t-4">
							<a hreflang="en-us" title="bathrobe towels" href="{{route('en-shop.category', ['category' => 'bathrobe-towel'])}}" class="catText">
								Bathrobe Towels
							</a>
						</li>

						<li class="p-t-4">
							<a hreflang="en-us" title="Kids towels" href="{{route('en-shop.category', ['category' => 'kids-towel'])}}" class="catText">
								Kids Towels
							</a>
						</li>

						<li class="p-t-4">
							<a hreflang="en-us" title="sheet towels" href="{{route('en-shop.category', ['category' => 'hands-towel'])}}" class="catText">
								Sheet towels
							</a>
						</li>

						<li class="p-t-4">
							<a hreflang="en-us" title="promotional towels" href="{{route('en-promotional-towels')}}" class="catText">
								Promotional Towels
							</a>
						</li>

						<li class="p-t-4">
							<a hreflang="en-us" title="gift towels" href="{{route('en-gift-pack')}}" class="catText">
								Gift Towels
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
								<img src="<?=Croppa::url($product->image, 270, 360); ?>" alt="{{$product->english_name}}">

							</div>

							<div class="block2-txt p-t-20 ">
								<span class="block2-name dis-block s-text3 p-b-5 home-product-name">
									{{$product->english_name}}
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
	<div class="flex-w p-l-15 p-r-15 " style="background-color:#c788bc;text-align: center;direction: ltr;padding: 50px 0;">
		<div class="container">
			<h1 style="font-size: 24px;color: white;padding-bottom:10px;text-align: center">Aras’ towel brand is a manufacturer of all kinds of bathrobe, hands, bath, pool, coat towels.</h1>
			<h2 style="font-size: 24px;color: white;text-align: center">Aras’ towel brand is against your eyes. We strive to enjoy our products from anywhere in Iran   </h2>

			<p style="color: white;text-align: center!important;font-size: 24px;"> and enjoy a happy smile on your lips. </p>
		</div>
	</div>
</section>

	<!-- Footer -->
@include('en.includes.footer')
@include('en.includes.copyright')

@include('en.includes.footerLinks')

</body>
</html>