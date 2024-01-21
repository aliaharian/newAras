<footer class="bg6 p-b-43 p-l-45 p-r-45" style="background-color: #323232;padding-top: 13px;">
    <div class="flex-w p-b-10" style="direction: ltr!important;">
        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 m-b-30" style="direction: ltr;text-align: left;">Get In Touch</h4>

            <div>

                <div class="s-text7 w-size27" itemscope itemtype="https://schema.org/Organization" style="direction: ltr;font-size: 16px;" >
                    <p style="color: #ccc" itemprop="telephone fa-2x"><i class="fa fa-phone"></i> +98 21 8893 2768 &nbsp;<br />
                        <i class="fa fa-mobile fa-2x"></i> +98 912 725 5962&zwnj;&nbsp;</p>

                    <p style="color: #ccc"><i class="fa fa-envelope-o"></i><a hreflang="en-us" itemprop="email" title="Aras towel email" href="mailto:info@arastowel.com" style="color: #ccc"> info[at]arastowel[dot]com </a></p>


                </div>

                <div class="flex-m p-t-30">
                    <a hreflang="en-us" title="facebook" href="https://www.facebook.com/Arastowel/" style="border: none;" target="_blank" class="fs-18 color1 p-l-20 fa fa-facebook footerlinks"></a>
                    <a hreflang="en-us" title="instagram" href="https://www.instagram.com/arastowel/" target="_blank" class="fs-18 color1 p-l-20 fa fa-instagram footerlinks"></a>
                    <a hreflang="en-us" title="pinterest" href="https://www.pinterest.com/arastowel/" class="fs-18 color1 p-l-20 fa fa-pinterest-p footerlinks" target="_blank"></a>
                    <a hreflang="en-us" title="linkedin" href="https://www.linkedin.com/in/arastowel?trk=hp-identity-name" target="_blank" class="fs-18 color1 p-l-20 fa fa-linkedin footerlinks"></a>
                    <a hreflang="en-us" title="twitter" href="https://twitter.com/ArasTowel" class="fs-18 color1 p-l-20 fa fa-twitter footerlinks" target="_blank"></a>
                    <a hreflang="en-us" title="youtube" href="https://www.youtube.com/channel/UCbPadIvVrH0MIciIZz52SGA"  target="_blank" class="fs-18 color1 p-l-20 fa fa-youtube footerlinks"></a>

                </div>
            </div>
        </div>

        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3 ">
            <h4 class="s-text12 m-b-30" style="direction: ltr;text-align: left;">
                Categories
            </h4>

            <ul style="direction: ltr;text-align: left;">
                <li class="p-b-9">
                    <a hreflang="en-us" title="Bathrobe Towels" href="{{route('en-shop.category', ['category' => 'bathrobe-towel'])}}" class="s-text7">
                        Bathrobe Towels
                    </a>
                </li>

                <li class="p-b-9">
                    <a hreflang="en-us" title="Kids Towels" href="{{route('en-shop.category', ['category' => 'kids-towel'])}}" class="s-text7">
                         Kids Towels
                    </a>
                </li>

                <li class="p-b-9">
                    <a hreflang="en-us" title="Hand Towels" href="{{route('en-shop.category', ['category' => 'hands-towel'])}}" class="s-text7">
                        Hand Towels
                    </a>
                </li>

                <li class="p-b-9">
                    <a hreflang="en-us" title="Gift Towels" href="{{route('en-gift-pack')}}" class="s-text7">
                        Gift Towels
                    </a>
                </li>

                <li class="p-b-9">
                    <a hreflang="en-us" title="Promotional Towels" href="{{route('en-promotional-towels')}}" class="s-text7">
                        Promotional Towels
                    </a>
                </li>
            </ul>
        </div>





        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 m-b-30" style="direction: ltr;text-align: left;">Blog</h4>
            <div class="blog row" style="margin-left: 0">
                <ul style="direction: ltr;text-align: left;">
                    @php
                        $posts=\App\blog::where('published',1)->orderBy('updated_at', 'desc')->get();
                    $count=0;
                    @endphp
                    @foreach($posts as $post)
                        @if($post->published==1 && $post->english_title!=null && $post->english_content!=null && $count<3)
                            @php $count=$count+1; @endphp
                    <li class="p-b-9">
                        <a hreflang="en-us" title="{{$post->english_title}}" href="{{route('en.blog.post',['blog_id'=>$post->id,'blog_title'=>str_replace(' ','-',$post->english_title)])}}" class="s-text7">
                            {{$post->english_title}}
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
