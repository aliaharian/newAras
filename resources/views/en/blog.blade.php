<!DOCTYPE html>
<html lang="en-us">
<head>
	<title>Blog, Aras towel online store</title>
	@include('en.includes.headLinks')

</head>
<body class="animsition loading">

@include('en.includes.header')


<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(https://statics.arastowel.com/images/blogHeader.jpg);">
		<h3 class="l-text2 t-center" style="color: #0f8e26;direction: ltr;font-size: 35px">
			We care about the environment!
		</h3>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-60" style="direction: ltr">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-75">


					<div class="p-l-50 p-l-0-lg">
						<!-- item blog -->
						@foreach($posts as $post)
						@if($post->published==1 && $post->english_title!=null && $post->english_content!=null)
						<div class="item-blog p-b-80">
							<a hreflang="en-us" title="{{$post->english_title}}" href="{{route('en.blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->english_title)])}}" class="item-blog-img pos-relative dis-block hov-img-zoom">
								<img src="{{$post->image}}" alt="{{$post->title}}" title="{{$post->english_title}}">

								<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
{{date_format( $post->created_at,'m/d/Y ')}}

								</span>
							</a>

							<div class="item-blog-txt p-t-33">
								<h4 class="p-b-11">
									<a hreflang="en-us" title="{{$post->english_title}}" href="{{route('en.blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->english_title)])}}" class="m-text24">
{{$post->english_title}}
									</a>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										By  {{\App\User::find($post->user_id)->name}} {{\App\User::find($post->user_id)->last_name}}
										<span class="m-l-3 m-r-6">|</span>
									</span>

								</div>

								<p class="p-b-12">
									{!! substr($post->english_content, 0, 145) !!}...
								</p>

								<a hreflang="en-us" href="{{route('en.blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->english_title)])}}"  title="{{$post->english_title}}" class="s-text20">
									Read more
									<i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i>
								</a>
							</div>
						</div>

							@endif
						@endforeach


						<!-- item blog -->

					</div>



					<div class="pagination flex-m flex-w p-t-26">
						{{$posts->links()}}

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
							<a hreflang="en-us" title="{{$tag->tag_english_name}}" href="{{route('en.blog.tagSearch',['tag_name'=>str_replace(' ','-',$tag->tag_english_name)])}}" class="tag-item">
								{{$tag->tag_english_name}}
							</a>
								@endforeach

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
@include('en.includes.footer')
@include('en.includes.copyright')

@include('en.includes.footerLinks')

</body>
</html>
