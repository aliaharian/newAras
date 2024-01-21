<footer class="bg6 p-b-43 p-l-45 p-r-45" style="background-color: #323232;padding-top: 13px;">
    <div class="flex-w p-b-10" style="direction: rtl!important;">
        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 m-b-30" style="direction: rtl;text-align: right;">ابقى على تواصل</h4>

            <div>

                <div class="s-text7 w-size27" itemscope itemtype="https://schema.org/Organization" style="direction: rtl;font-size: 16px;" >
                    <p style="color: #ccc" itemprop="telephone fa-2x"><i class="fa fa-phone"></i>
                      <span>  00982188932768 &nbsp;</span>
                        <br />
                        <i class="fa fa-mobile fa-2x"></i>
                      <span>  00989127255962&zwnj;&nbsp;</span>
                    </p>

                    <p style="color: #ccc"><i class="fa fa-envelope-o"></i><a hreflang="ar" itemprop="email" title="Aras towel email" href="mailto:info@arastowel.com" style="color: #ccc"> info[at]arastowel[dot]com </a></p>


                </div>

                <div class="flex-m p-t-30">
                    <a hreflang="ar" title="facebook" href="https://www.facebook.com/Arastowel/" style="border: none;" target="_blank" class="fs-18 color1 p-l-20 fa fa-facebook footerlinks"></a>
                    <a hreflang="ar" title="instagram" href="https://www.instagram.com/arastowel/" target="_blank" class="fs-18 color1 p-l-20 fa fa-instagram footerlinks"></a>
                    <a hreflang="ar" title="pinterest" href="https://www.pinterest.com/arastowel/" class="fs-18 color1 p-l-20 fa fa-pinterest-p footerlinks" target="_blank"></a>
                    <a hreflang="ar" title="linkedin" href="https://www.linkedin.com/in/arastowel?trk=hp-identity-name" target="_blank" class="fs-18 color1 p-l-20 fa fa-linkedin footerlinks"></a>
                    <a hreflang="ar" title="twitter" href="https://twitter.com/ArasTowel" class="fs-18 color1 p-l-20 fa fa-twitter footerlinks" target="_blank"></a>
                    <a hreflang="ar" title="youtube" href="https://www.youtube.com/channel/UCbPadIvVrH0MIciIZz52SGA"  target="_blank" class="fs-18 color1 p-l-20 fa fa-youtube footerlinks"></a>

                </div>
            </div>
        </div>

        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3 ">
            <h4 class="s-text12 m-b-30" style="direction: rtl;text-align: right;">
                الفئات
            </h4>

            <ul style="direction: rtl;text-align: right;">
                <li class="p-b-9">
                    <a hreflang="ar" title="مناشف الحمام" href="{{route('ar-shop.category', ['category' => 'bathrobe-towel'])}}" class="s-text7">
                        مناشف قابلة للأرتداء
                    </a>
                </li>

                <li class="p-b-9">
                    <a hreflang="ar" title="مناشف الاطفال" href="{{route('ar-shop.category', ['category' => 'kids-towel'])}}" class="s-text7">
                        مناشف الاطفال
                    </a>
                </li>

                <li class="p-b-9">
                    <a hreflang="ar" title="مناشف اليد" href="{{route('ar-shop.category', ['category' => 'hands-towel'])}}" class="s-text7">
                        مناشف أبعادیة
                    </a>
                </li>

                <li class="p-b-9">
                    <a hreflang="ar" title="مناشف الهدايا" href="{{route('ar-gift-pack')}}" class="s-text7">
                        مناشف الهدايا
                    </a>
                </li>

                <li class="p-b-9">
                    <a hreflang="ar" title="المناشف الترويجية" href="{{route('ar-promotional-towels')}}" class="s-text7">
                        المناشف الترويجية
                    </a>
                </li>
            </ul>
        </div>





        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 m-b-30" style="direction: rtl;text-align: right;">المدونة</h4>
            <div class="blog row" style="margin-left: 0">
                <ul style="direction: rtl;text-align: right;">
                    @php
                        $posts=\App\blog::where('published',1)->orderBy('updated_at', 'desc')->get();
                    $count=0;
                    @endphp
                    @foreach($posts as $post)
                        @if($post->published==1 && $post->arabic_title!=null && $post->arabic_content!=null && $count<3)
                            @php $count=$count+1; @endphp
                    <li class="p-b-9">
                        <a hreflang="ar" title="{{$post->arabic_title}}" href="{{route('ar.blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->arabic_title)])}}" class="s-text7">
                            {{$post->arabic_title}}
                        </a>
                    </li>


                        @endif
                    @endforeach
                </ul>


            </div>
        </div>
    </div>

    <div class="t-center p-l-15 p-r-15" >


    </div>
</footer>
