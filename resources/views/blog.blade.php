<!DOCTYPE html>
<html lang="fa">
<head>
    <link rel="alternate" hreflang="en-us" href="https://arastowel.com/en/blog">

    <link rel="alternate" hreflang="ar" href="https://arastowel.com/ar/blog">
    <link rel="alternate" href="https://arastowel.com/blog" hreflang="x-default">

    <title>بلاگ - فروشگاه اینترنتی حوله ارس</title>
    @include('includes.headLinks')

</head>
<body class="animsition loading">

@include('includes.header')


<!-- Title Page -->
{{--<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(https://statics.arastowel.com/images/blogHeader.jpg);">--}}
{{--    <h3 class="l-text2 t-center" style="color: #0f8e26;direction: rtl;font-size: 35px">--}}
{{--        ما به محیط زیست اهمیت می دهیم!		</h3>--}}
{{--</section>--}}
<!--<section class="blog-title">-->
<!--    <h3 class="l-text2 t-center" style="color: #0f8e26;direction: rtl;font-size: 35px">-->
<!--        بلاگ </h3>-->
<!--</section>-->
@foreach($template as $temp)
    @if($temp->place=='aboutHeader')
        <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{$temp->image}});">
            <h1 class="l-text2 t-center" style="color: #fff">
                بلاگ
            </h1>
        </section>
    @endif
@endforeach

<!-- content page -->
<section class="bgwhite" style="direction: rtl;padding-top:15px;">
    <div class="banner">
        <div class="blogGrid">
{{--                <div class="p-l-50 p-l-0-lg">--}}
                    <!-- item blog -->
                    @foreach($posts as $post)
                        @if($post->published==1)
                            <div class="item-blog p-b-30">
                                <a title="{{$post->title}}"
                                   href="{{route('blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->title)])}}"
                                   class="item-blog-img pos-relative dis-block hov-img-zoom">
                                    <img src="{{$post->image}}" alt="{{$post->title}}" title="{{$post->title}}">

{{--                              <span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1">--}}
{{--                                        {{$post->persian_date}}--}}

{{--								</span> --}}
                                </a>

                                <div class="item-blog-txt">
                                    <span class="blogDate">
                                        {{$post->persian_date}}
                                    </span>
                                    <h4>
                                        <a title="{{$post->title}}"
                                           href="{{route('blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->title)])}}"
                                           class="blog-title-text">
                                            {{$post->title}}
                                        </a>
                                    </h4>

{{--                                    <div class="s-text8 flex-w flex-m p-b-21">--}}
{{--									<span>--}}
{{--										توسط {{\App\User::find($post->user_id)->name}} {{\App\User::find($post->user_id)->last_name}}--}}
{{--										<span class="m-l-3 m-r-6">|</span>--}}
{{--									</span>--}}

{{--                                    </div>--}}

{{--                                    <p class="p-b-12">--}}
{{--                                        {!! substr($post->content, 0, 145) !!}...--}}
{{--                                    </p>--}}

{{--                                    <a href="{{route('blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->title)])}}"--}}
{{--                                       title="{{$post->title}}" class="s-text20">--}}
{{--                                        ادامه مطلب--}}
{{--                                        <i class="fa fa-long-arrow-left m-l-8" aria-hidden="true"></i>--}}
{{--                                    </a>--}}
                                </div>
                            </div>

                    @endif
                @endforeach


                <!-- item blog -->

{{--                </div>--}}


{{--                <div class="pagination flex-m flex-w p-t-26">--}}
{{--                    {{$posts->links()}}--}}

{{--                </div>--}}

        </div>
    </div>
</section>


<!-- Footer -->
@include('includes.footer')
@include('includes.copyright')

@include('includes.footerLinks')

</body>
</html>
