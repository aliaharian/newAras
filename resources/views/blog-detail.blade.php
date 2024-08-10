<!DOCTYPE html>
<html lang="fa">
<head>

	@if($post->english_title!=null)
	<link rel="alternate" hreflang="en-us" href="https://arastowel.com/en/blog/{{$post->id}}/{{str_replace(' ','-',$post->english_title)}}">
		@endif

	@if($post->arabic_title!=null)
	<link rel="alternate" hreflang="ar" href="https://arastowel.com/ar/blog/{{$post->id}}/{{str_replace(' ','-',$post->arabic_title)}}">
	@endif
			<link rel="alternate" href="https://arastowel.com/blog/{{$post->id}}/{{str_replace(' ','-',$post->title)}}" hreflang="x-default">


	<title>{{$post->title}} - فروشگاه اینترنتی حوله ارس</title>
	<meta name="description" content="  مشاهده مقاله ی {{$post->title}}   به همراه نظرات کاربران در فروشگاه اینترنتی حوله ارس .    ">

	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="canonical" href="https://arastowel.com/blog/{{$post->id}}/{{str_replace(' ','-',$post->title)}}"/>
	@include('includes.headLinks')
	<meta name="language" content="Fa" />
	<meta name="document-type" content="Public" />
	<meta name="document-rating" content="General" />
	<meta name="resource-type" content="document" />

	{{--seo content--}}

	<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
	<link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" />
	<meta property="og:site_name" content="فروشگاه اینترنتی حوله ارس" />
	<meta property="og:locale" content="fa_IR" />
	<meta property="og:title" content="{{$post->title}}" />
	<meta property="og:url" content="{{route('blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace('"','',preg_replace_callback("/\\\\u([a-f0-9]{4})/iu", function($m){return iconv('UCS-4LE','UTF-8',pack('V', hexdec('U'.$m[1])));}, json_encode(str_replace(' ','-',$post->title))))])}}" />
	<meta property="og:description" content="{{ substr($post->content, 0, 300)}}" />
	<meta property="og:site_name" content="فروشگاه اینترنتی حوله ارس" />
	@foreach($post->Tags as $tag)
		<meta property="article:tag" content="{{$tag->tag_name}}" />
	@endforeach
	<meta property="og:image" content="{{$post->image}}">
	<meta property="og:image:width" content="720">
	<meta property="og:image:height" content="539">
	<meta property="og:image:type" content="image/jpg">
	<meta property="og:image:secure_url" content="{{$post->image}}"/>
	<meta property="og:image:alt" content="{{$post->title}}" />

	<link rel="image_src" href="{{$post->image}}" />
	<meta property="og:type" content="article" />
	<meta property="article:published_time" content="{{$post->created_at}}" />
	<meta property="article:modified_time" content="{{$post->updated_at}}" />
	<meta property="og:updated_time" content="{{$post->updated_at}}" />
	<meta name="twitter:description" content="{{ substr($post->content, 0, 300)}}" />

	<meta content='text/html; charset=UTF-8' http-equiv='Content-Type' />


	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@ArasTowel" />
	<meta name="twitter:title" content="{{$post->title}}" />
	<meta name="twitter:image" content="{{$post->image}}" />

	<meta http-equiv="content-language" content="fa" />
	<meta name="apple-mobile-web-app-capable" content="yes"/>


	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	<meta name="DC.Identifier" content="{{route('blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace('"','',preg_replace_callback("/\\\\u([a-f0-9]{4})/iu", function($m){return iconv('UCS-4LE','UTF-8',pack('V', hexdec('U'.$m[1])));}, json_encode(str_replace(' ','-',$post->title))))])}}"/>
	<meta name="DC.Type" content="image"/>
	<meta name="DC.Title" content="{{$post->title}}"/>
	<meta name="DC.Language" content="fa"/>

	<meta name="robots" content="index,follow,archive"/>

	{{--seo content--}}


	<script defer src="/js/jquery-bootstrap.js"></script>

	<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{route('blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace('"','',preg_replace_callback("/\\\\u([a-f0-9]{4})/iu", function($m){return iconv('UCS-4LE','UTF-8',pack('V', hexdec('U'.$m[1])));}, json_encode(str_replace(' ','-',$post->title))))])}}"
  },
  "headline": "{{$post->title}}",
  "image": {
    "@type": "ImageObject",
    "url": "{{$post->image}}",
    "height": "720",
    "width": "539"
  },
  "datePublished": "{{$post->created_at}}",
  "dateModified": "{{$post->updated_at}}",
  "author": {
    "@type": "Person",
    "name": "علی اهاریان"
  },
  "publisher": {
    "@type": "Organization",
    "name": "فروشگاه اینترنتی حوله ارس",
  },
}
</script>
<style>
	/*a{*/
	/*	font-family: 'iranSans';*/
	/*	font-weight: 800;*/
	/*}*/
	.blog-detail-txt>ul>li {
		font-size: 14px;
		font-family: iranSans,Montserrat-Regular!important;
		margin: 0;
		list-style-type: disc;
	}
	.blog-detail-txt>ul>li {
		font-size: 14px;
		font-family: iranSans,Montserrat-Regular!important;
		margin: 0;
		list-style-type: disc;
	}
	.share-group li{
		list-style-type: none;

	}
	.blog-detail-txt>div>figure>img{
		width: 100%;
	}
    .blog-detail-txt img{
        width: 100%;
    }
    .tag-item:hover {
        border: 1px solid #4187c7 !important;
}
</style>
</head>
<body class="animsition loading">
@include('includes.header')
@if($post->published!=1)
<h1 class="text-center alert alert-danger">
	این مطلب وجود ندارد یا هنوز منتشر نشده
</h1>
	@else

	<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm" style="background-color: #eff5f5;padding-top: 5px;padding-bottom: 5px;margin: 0 38px 0 50px;">
	<a href="{{route('index')}}" class="s-text16">
		صفحه اصلی
		<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
	</a>

	<a href="{{route('blog')}}" class="s-text16">
		بلاگ
		<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
	</a>

	<span class="s-text17">
			{{$post->title}}
		</span>
</div>

	<!-- content page -->
	<section class="bgwhite p-t-60 p-b-25" style="direction: rtl;padding:24px;">
		<div class="container" style="max-width:800px !important;">
			<div style="display: block;width: 100%">
				<div class=" p-b-80">
					<div>
						<div class="p-b-40">
							<div class="blog-detail-img wrap-pic-w">
								<img src="{{$post->image}}" alt="{{$post->title}}">
							</div>

							<div class="blog-detail-txt p-t-33">
								<h1 class="p-b-11 m-text24 text-center" style="font-size:32px">
									{{$post->title}}
								</h1>
                                <p class="text-center" style="color:#4187c7;font-size:14px;margin-top:5px;margin-bottom:60px">{{$post->persian_date}}</p>

								<!-- <div class="s-text8 flex-w flex-m p-b-21">
									<span>
										توسط {{\App\User::find($post->user_id)->name}} {{\App\User::find($post->user_id)->last_name}}
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										{{$post->persian_date}}
										<span class="m-l-3 m-r-6">|</span>
									</span>

								</div> -->

									{!! $post->content !!}

							</div>
                            <ul class="share-group">
								<p>این پست را به اشتراک بگذارید:</p>
								<li class="share-li"><a rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u={{route('blog.shortpost',['blog_id'=>$post->id])}}" target="_blank" class="share-link fa fa-facebook"></a></li>
								<li class="share-li"><a rel="nofollow" href="#" target="_blank" class="share-link fa fa-google-plus"></a></li>
								<li class="share-li"><a rel="nofollow" href="https://www.twitter.com/intent/tweet?text={{$post->title}}&url={{route('blog.shortpost',['blog_id'=>$post->id])}}" target="_blank" class="share-link fa fa-twitter"></a></li>
								<li class="share-li"><a rel="nofollow" href="https://pinterest.com/pin/create/button/?url={{route('blog.shortpost',['blog_id'=>$post->id])}}" target="_blank" class="share-link fa fa-pinterest"></a></li>
								<li class="share-li"><a rel="nofollow" href="https://telegram.me/share/url?url={{route('blog.shortpost',['blog_id'=>$post->id])}}&text={{$post->title}}" target="_blank" class="share-link fa fa-telegram"></a></li>
                                <li class="share-li"><a rel="nofollow" href="https://www.linkedin.com/shareArticle?mini=true&url={{route('blog.shortpost',['blog_id'=>$post->id])}}&title={{$post->title}}&source=ArasTowel" target="_blank" class="share-link fa fa-linkedin"></a></li>
                            </ul>


							<div class="flex-m flex-w p-t-20">
								<span class="s-text20 p-r-20">

								</span>

								<div class="wrap-tags flex-w">
									@foreach($post->Tags as $tag)
										<a title="{{$tag->tag_name}}" href="{{route('blog.tagSearch',['tag_name'=>str_replace(' ','-',$tag->tag_name)])}}" class="tag-item">
										{{$tag->tag_name}}
									</a>
									@endforeach
								</div>
							</div>
						</div>


					</div>
				</div>

			</div>
		</div>
	</section>

	@endif
	<!-- Footer -->
@include('includes.footer')
@include('includes.copyright')

@include('includes.footerLinks')

</body>
</html>
