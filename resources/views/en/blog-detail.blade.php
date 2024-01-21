<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>{{$post->english_title}} - Aras towel </title>
	<meta name="description" content="  See article {{$post->english_title}}   from aras towel .    ">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="canonical" href="https://arastowel.com/en/blog/{{$post->id}}/{{str_replace(' ','-',$post->english_title)}}"/>
	@include('en.includes.headLinks')
	<meta name="language" content="Fa" />
	<meta name="document-type" content="Public" />
	<meta name="document-rating" content="General" />
	<meta name="resource-type" content="document" />

	{{--seo content--}}

	<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
	<link rel="schema.DCTERMS" href="http://purl.org/dc/terms/" />
	<meta property="og:site_name" content="Aras towel" />
	<meta property="og:locale" content="en" />
	<meta property="og:title" content="{{$post->english_title}}" />
	<meta property="og:url" content="{{route('en.blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace('"','',preg_replace_callback("/\\\\u([a-f0-9]{4})/iu", function($m){return iconv('UCS-4LE','UTF-8',pack('V', hexdec('U'.$m[1])));}, json_encode(str_replace(' ','-',$post->english_title))))])}}" />
	<meta property="og:description" content="{{ substr($post->english_content, 0, 300)}}" />
	<meta property="og:site_name" content="aras towel" />
	@foreach($post->Tags as $tag)
		<meta property="article:tag" content="{{$tag->tag_english_name}}" />
	@endforeach
	<meta property="og:image" content="{{$post->image}}">
	<meta property="og:image:width" content="720">
	<meta property="og:image:height" content="539">
	<meta property="og:image:type" content="image/jpg">
	<meta property="og:image:secure_url" content="{{$post->image}}"/>
	<meta property="og:image:alt" content="{{$post->english_title}}" />

	<link rel="image_src" href="{{$post->image}}" />
	<meta property="og:type" content="article" />
	<meta property="article:published_time" content="{{$post->created_at}}" />
	<meta property="article:modified_time" content="{{$post->updated_at}}" />
	<meta property="og:updated_time" content="{{$post->updated_at}}" />
	<meta name="twitter:description" content="{{ substr($post->english_content, 0, 300)}}" />

	<meta content='text/html; charset=UTF-8' http-equiv='Content-Type' />


	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@ArasTowel" />
	<meta name="twitter:title" content="{{$post->english_title}}" />
	<meta name="twitter:image" content="{{$post->image}}" />

	<meta http-equiv="content-language" content="fa" />
	<meta name="apple-mobile-web-app-capable" content="yes"/>


	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


	<meta name="DC.Identifier" content="{{route('en.blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace('"','',preg_replace_callback("/\\\\u([a-f0-9]{4})/iu", function($m){return iconv('UCS-4LE','UTF-8',pack('V', hexdec('U'.$m[1])));}, json_encode(str_replace(' ','-',$post->english_title))))])}}"/>
	<meta name="DC.Type" content="image"/>
	<meta name="DC.Title" content="{{$post->english_title}}"/>
	<meta name="DC.Language" content="fa"/>

	{{--<meta name="robots" content="index,follow,archive"/>--}}

	{{--seo content--}}


	<script defer src="/js/jquery-bootstrap.js"></script>

	<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "{{route('en.blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace('"','',preg_replace_callback("/\\\\u([a-f0-9]{4})/iu", function($m){return iconv('UCS-4LE','UTF-8',pack('V', hexdec('U'.$m[1])));}, json_encode(str_replace(' ','-',$post->english_title))))])}}"
  },
  "headline": "{{$post->english_title}}",
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
    "name": "ali aharian"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Aras towel",
  },
  "description": "{{ substr($post->english_content, 0, 300)}}"
}
</script>
<style>
	a{
		font-family: 'roya';
		font-weight: 800;
	}
	.blog-detail-txt>ul>li {
		font-size: 25px;
		font-family: roya,Montserrat-Regular!important;
		margin: 0;
		list-style-type: disc;
	}
	.blog-detail-txt>ul>li {
		font-size: 25px;
		font-family: roya,Montserrat-Regular!important;
		margin: 0;
		list-style-type: disc;
	}
	.share-group li{
		list-style-type: none;

	}
	.blog-detail-txt>div>figure>img{
		width: 100%;
	}
</style>
</head>
<body class="animsition loading">
@include('en.includes.header')
@if($post->published!=1)
<h1 class="text-center alert alert-danger">
	This item is missing or has not yet been published
</h1>
	@else

	<!-- breadcrumb -->
<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm" style="background-color: #f2f2f2;padding-top: 5px;padding-bottom: 5px;margin: 0 38px 0 50px;">
	<a hreflang="en-us" href="{{route('index')}}" class="s-text16">
		Home
		<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
	</a>

	<a hreflang="en-us" href="{{route('en.blog')}}" class="s-text16">
		Blog
		<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
	</a>

	<span class="s-text17">
			{{$post->english_title}}
		</span>
</div>

	<!-- content page -->
	<section class="bgwhite p-t-60 p-b-25" style="direction: ltr">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-50 p-r-0-lg">
						<div class="p-b-40">
							<div class="blog-detail-img wrap-pic-w">
								<img src="{{$post->image}}" alt="{{$post->english_title}}">
							</div>

							<div class="blog-detail-txt p-t-33">
								<h1 class="p-b-11 m-text24">
									{{$post->english_title}}
								</h1>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										By  {{\App\User::find($post->user_id)->name}} {{\App\User::find($post->user_id)->last_name}}
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										{{date_format( $post->created_at,'m/d/Y ')}}

										<span class="m-l-3 m-r-6">|</span>
									</span>

								</div>

									{!! $post->english_content !!}

							</div>
                            <ul class="share-group">
								<p>Share this post:</p>
								<li class="share-li"><a rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u={{route('en.blog.shortpost',['blog_id'=>$post->id])}}" target="_blank" class="share-link fa fa-facebook"></a></li>
								<li class="share-li"><a rel="nofollow" href="#" target="_blank" class="share-link fa fa-google-plus"></a></li>
								<li class="share-li"><a hreflang="en-us" rel="nofollow" href="https://www.twitter.com/intent/tweet?text={{$post->english_title}}&url={{route('en.blog.shortpost',['blog_id'=>$post->id])}}" target="_blank" class="share-link fa fa-twitter"></a></li>
								<li class="share-li"><a hreflang="en-us" rel="nofollow" href="https://pinterest.com/pin/create/button/?url={{route('en.blog.shortpost',['blog_id'=>$post->id])}}" target="_blank" class="share-link fa fa-pinterest"></a></li>
								<li class="share-li"><a hreflang="en-us" rel="nofollow" href="https://telegram.me/share/url?url={{route('en.blog.shortpost',['blog_id'=>$post->id])}}&text={{$post->english_title}}" target="_blank" class="share-link fa fa-telegram"></a></li>
                                <li class="share-li"><a hreflang="en-us" rel="nofollow" href="https://www.linkedin.com/shareArticle?mini=true&url={{route('en.blog.shortpost',['blog_id'=>$post->id])}}&title={{$post->english_title}}&source=ArasTowel" target="_blank" class="share-link fa fa-linkedin"></a></li>
                            </ul>


							<div class="flex-m flex-w p-t-20">
								<span class="s-text20 p-r-20">

								</span>

								<div class="wrap-tags flex-w">
									@foreach($post->Tags as $tag)
										<a title="{{$tag->tag_english_name}}" href="{{route('en.blog.tagSearch',['tag_name'=>str_replace(' ','-',$tag->tag_english_name)])}}" class="tag-item">
										{{$tag->tag_english_name}}
									</a>
									@endforeach
								</div>
							</div>
						</div>


					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-75">
					<div class="rightbar">



						<!-- Tags -->
						<h4 class="m-text23 p-t-50 p-b-25">
							Tags
						</h4>

						<div class="wrap-tags flex-w">
							@foreach($tags as $tag)
								<a title="{{$tag->tag_english_name}}" href="{{route('en.blog.tagSearch',['tag_name'=>str_replace(' ','-',$tag->tag_english_name)])}}" class="tag-item">
									{{$tag->tag_english_name}}
								</a>
							@endforeach

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	@endif
	<!-- Footer -->
@include('en.includes.footer')
@include('en.includes.copyright')

@include('en.includes.footerLinks')

<script type="text/javascript" async
		src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5b7534a4159fc61f"></script>
</body>
</html>
