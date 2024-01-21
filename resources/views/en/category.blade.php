<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>{{$categoryArray->english_header}}</title>
	@include('en.includes.headLinks')

</head>
<body class="animsition loading">

@include('en.includes.header')


	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url({{$categoryArray->image}});">
		<h2 class="l-text2 t-center" style="color: #6f6f6f">
			{{str_replace('-',' ',$categoryArray->english_name)}}
		</h2>
	</section>
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
							<a hreflang="en-us" title="Bathrobe Towels" href="{{route('en-shop.category', ['category' => 'bathrobe-towel'])}}" class="catText">
								Bathrobe Towels
							</a>
						</li>

						<li class="p-t-4">
							<a hreflang="en-us" title="kids towels" href="{{route('en-shop.category', ['category' => 'kids-towel'])}}" class="catText">
								Kids Towels
							</a>
						</li>

						<li class="p-t-4">
							<a hreflang="en-us" title="sheet towels" href="{{route('en-shop.category', ['category' => 'hands-towel'])}}" class="catText">
								Sheet Towels
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
			<div class="col-sm-6 col-md-8 col-lg-9 col-xl-9 p-b-10">
				<div class="row">
					@foreach($products as $product)
						@if($product->published==1)
						@php($correct=0)
						@foreach($product->categories as $category)
							@if($category->id==$categoryArray->id)
								@php($correct=1)
								@endif
							@endforeach
					@if($correct==1)
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative">
									<img src="{{$product->image}}" alt="{{$product->english_name}}">

								</div>

								<div class="block2-txt p-t-20">
									<span class="block2-name dis-block s-text3 p-b-5 home-product-name">
										{{$product->english_name}}
									</span>


								</div>
							</div>
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
<section class="shipping bgwhite" >
	<div class="flex-w p-l-15 p-r-15 " style="background-color:#c788bc;text-align: center;direction: ltr;padding: 50px 0;">
		<div class="container">
			{!!$categoryArray->english_description!!}
		</div>
	</div>
</section>

<!-- Footer -->
@include('en.includes.footer')
@include('en.includes.copyright')

@include('en.includes.footerLinks')

</body>
</html>
