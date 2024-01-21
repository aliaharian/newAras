@php
	function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }

        $user_ip = getUserIP();
                $agent = new \Jenssegers\Agent\Agent();
                $user_platform = $agent->platform();
                $user_browser = $agent->browser();
            $pre_order=\App\Pre_order::where('user_ip',$user_ip)->where('user_platform',$user_platform)->where('user_browser',$user_browser)->get();


@endphp

<div class="modal">
	<div class="animsition-loading-1">
		<div data-loader="ball-scale">
		</div>
	</div>
</div>


<div class="wrap_header fixed-header2 trans-0-4">
	<a hreflang="en-us" title="Aras towel" href="{{route('en-index')}}" class="logo">
		<img src="/images/araslogonew.png" height="50" alt="Aras towel" title="Aras towel">
	</a>

	<div class="wrap_menu">
		<nav class="menu">
			<ul class="main_menu">
				<li>
					<a hreflang="en-us" title="Home Aras towel" href="{{route('en-index')}}">Home</a>
				</li>
				<li>
					<a hreflang="en-us" title="about Aras towel" href="{{route('en-about-us')}}">About</a>
				</li>
				<li>
					<a hreflang="en-us" title="buy online towels" href="{{route('en-shop')}}">Shop</a>
				</li>

				<li class="sale-noti">
					<a hreflang="en-us" title="Blog Aras towel" href="{{route('en.blog')}}">Blog</a>
				</li>
                
				<li>
					<a hreflang="en-us" title="contact Aras towel" href="{{route('en-contact-us')}}">Contact</a>
				</li>
			</ul>
		</nav>
	</div>

	<div class="header-icons">
		<select class="js-example-basic-single" style="margin: auto" onchange="redirectlang()">
			<option value="en">English</option>
                <option value="fa">فارسی</option>
                <option value="ar">&nbsp;&nbsp;العربیه&nbsp;&nbsp;</option>
		</select>



    </div>
</div>

<header class="header2">
	<div class="container-menu-header-v2 p-t-26" style="background: #fff">
		<div class="topbar2">
			<div class="topbar-social">
				<a hreflang="en-us" title="facebook" href="https://www.facebook.com/Arastowel/" target="_blank" class="topbar-social-item fa fa-facebook"></a>
				<a hreflang="en-us" title="instagram" href="https://www.instagram.com/arastowel/" target="_blank" class="topbar-social-item fa fa-instagram"></a>
				<a hreflang="en-us" title="pinterest" href="https://www.pinterest.com/arastowel/" class="topbar-social-item fa fa-pinterest-p" target="_blank"></a>
				<a hreflang="en-us" title="linkedin" href="https://www.linkedin.com/in/arastowel?trk=hp-identity-name" target="_blank" class="topbar-social-item fa fa-linkedin"></a>
				<a hreflang="en-us" title="twitter" href="https://twitter.com/ArasTowel" class="topbar-social-item fa fa-twitter" target="_blank"></a>
				<a hreflang="en-us" title="youtube" href="https://www.youtube.com/channel/UCbPadIvVrH0MIciIZz52SGA" target="_blank" class="topbar-social-item fa fa-youtube"></a>
			</div>

			<a hreflang="en-us" title="Aras towel" href="{{route('en-index')}}" class="logo2">
				<img src="/images/araslogonew.png" height="50" alt="Aras towel" title="Aras towel">
			</a>

			<div class="topbar-child2" style="padding-left: 38px!important;">
				<select class="js-example-basic-single redirectlang2" onchange="redirectlang2()">
					<option value="en">English</option>
                        <option value="fa">فارسی</option>
                        <option value="ar">&nbsp;&nbsp;العربیه&nbsp;&nbsp;</option>
				</select>
            </div>
		</div>

		<div class="wrap_header">

			<div class="wrap_menu">
				<nav class="menu">
					<ul class="main_menu">
						<li>
							<a hreflang="en-us" title="Home" href="{{route('en-index')}}">Home</a>
						</li>
						<li>
							<a hreflang="en-us" title="About" href="{{route('en-about-us')}}">About</a>
						</li>
						<li>
							<a hreflang="en-us" title="Shop online" href="{{route('en-shop')}}">Shop</a>
						</li>

						<li class="sale-noti">
							<a hreflang="en-us" title="Blog" href="{{route('en.blog')}}">Blog</a>
						</li>



						<li>
							<a hreflang="en-us" title="Contact" href="{{route('en-contact-us')}}">Contact</a>
						</li>
					</ul>
				</nav>
			</div>

			<div class="header-icons">

			</div>
		</div>
	</div>

	<div class="wrap_header_mobile">
		<a hreflang="en-us" title="Aras towel" href="{{route('en-index')}}" class="logo-mobile">
			<img src="/images/araslogonew.png" height="50" alt="Aras towel">
		</a>

		<div class="btn-show-menu">

			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
			</div>
		</div>
	</div>

	<div class="wrap-side-menu" >
		<nav class="side-menu">
			<ul class="main-menu">

				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">


					<select class="js-example-basic-single redirectlang3" style="margin: auto" onchange="redirectlang3()">
						<option value="en">English</option>
                            <option value="fa">فارسی</option>
                            <option value="ar">&nbsp;&nbsp;العربیه&nbsp;&nbsp;</option>
					</select>
				</li>

				<li class="item-topbar-mobile p-l-10">
					<div class="topbar-social-mobile" style="text-align: center">
						<a hreflang="en-us" title="facebook" href="https://www.facebook.com/Arastowel/" target="_blank" class="topbar-social-item fa fa-facebook"></a>
						<a hreflang="en-us" title="instagram" href="https://www.instagram.com/arastowel/" target="_blank" class="topbar-social-item fa fa-instagram"></a>
						<a hreflang="en-us" title="pinterest" href="https://www.pinterest.com/arastowel/" class="topbar-social-item fa fa-pinterest-p" target="_blank"></a>
						<a hreflang="en-us" title="linkedin" href="https://www.linkedin.com/in/arastowel?trk=hp-identity-name" target="_blank" class="topbar-social-item fa fa-linkedin"></a>
						<a hreflang="en-us" title="twitter" href="https://twitter.com/ArasTowel" class="topbar-social-item fa fa-twitter" target="_blank"></a>
						<a hreflang="en-us" title="youtube" href="https://www.youtube.com/channel/UCbPadIvVrH0MIciIZz52SGA" target="_blank" class="topbar-social-item fa fa-youtube"></a>
					</div>
				</li>

				<li class="item-menu-mobile">
					<a hreflang="en-us" title="Home" href="{{route('en-index')}}">Home</a>
				</li>
				<li class="item-menu-mobile">
					<a hreflang="en-us" title="About" href="{{route('en-about-us')}}">About</a>
				</li>
				<li class="item-menu-mobile">
					<a hreflang="en-us" title="Shop" href="{{route('en-shop')}}">Shop</a>
				</li>

				<li class="sale-noti item-menu-mobile">
					<a hreflang="en-us" title="Blog" href="{{route('en.blog')}}">Blog</a>
				</li>

				<li class="item-menu-mobile">
					<a hreflang="en-us" title="Contact" href="{{route('en-contact-us')}}">Contact</a>
				</li>
			</ul>
		</nav>
	</div>
</header>

