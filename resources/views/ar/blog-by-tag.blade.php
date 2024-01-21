<!DOCTYPE html>
<html lang="fa">
<head>
	<title>المدونة - {{str_replace('-',' ',$tag_name)}} - منشفة ارس </title>
	@include('ar.includes.headLinks')

</head>
<body class="animsition loading">

@include('ar.includes.header')


<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(https://statics.arastowel.com/images/blogHeader.jpg);">
		<h3 class="l-text2 t-center" style="color: #0f8e26;direction: rtl;font-size: 35px">
			نحن نهتم بالبيئة
		</h3>
	</section>

	<!-- content page -->
	<section class="bgwhite p-t-60" style="direction: rtl">
		<div class="container">
			<h1 style="font-size: 15px;padding-bottom: 10px">
				البحث عن التاغ : {{str_replace('-',' ',$tag_name)}}
			</h1>
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-75">

					<div class="p-l-50 p-l-0-lg">
						<!-- item blog -->
						@php $post=null @endphp
						@foreach($selectedTags as $selectedTag)
							@php
								$post=\App\blog::find($selectedTag->blog_id);
							@endphp
							@if($post->published==1 && $post->arabic_title!=null && $post->arabic_content!=null)
						<div class="item-blog p-b-80">
							<a title="{{$post->arabic_title}}" href="{{route('ar.blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->arabic_title)])}}" class="item-blog-img pos-relative dis-block hov-img-zoom">
								<img src="{{$post->image}}" alt="{{$post->arabic_title}}" title="{{$post->arabic_title}}">

								<span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">
									{{date_format( $post->created_at,'m/d/Y ')}}

								</span>
							</a>

							<div class="item-blog-txt p-t-33">
								<h4 class="p-b-11">
									<a title="{{$post->arabic_title}}" href="blog-detail.blade.php" class="m-text24">
										{{$post->arabic_title}}
									</a>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-21">
									<span>
										بواسطة  {{\App\User::find($post->user_id)->name}} {{\App\User::find($post->user_id)->last_name}}
										<span class="m-l-3 m-r-6">|</span>
									</span>

								</div>

								<p class="p-b-12">
									{!! substr($post->arabic_content, 0, 300) !!}...
								</p>

								<a title="{{$post->arabic_title}}"  href="{{route('ar.blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->arabic_title)])}}" class="s-text20">
									قراءة المزيد

									<i class="fa fa-long-arrow-left m-l-8" aria-hidden="true"></i>
								</a>
							</div>
						</div>

							@endif
						@endforeach


						<!-- item blog -->

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
							<a title="{{$tag->tag_arabic_name}}" href="{{route('ar.blog.tagSearch',['tag_name'=>str_replace(' ','-',$tag->tag_arabic_name)])}}" class="tag-item">
								{{$tag->tag_arabic_name}}
							</a>
								@endforeach

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
@include('ar.includes.footer')
@include('ar.includes.copyright')

@include('ar.includes.footerLinks')

</body>
</html>
