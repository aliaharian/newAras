<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="content-language" content="fa-IR">
<link rel="stylesheet" type="text/css" href="/css/fontIncludes.css">
<link rel="stylesheet" type="text/css" href="/css/main.min.css">
<link rel="stylesheet" type="text/css" href="/css/newEdits.css">
<link rel="stylesheet" type="text/css" href="/css/megaMenu.css">

<link rel="icon" type="image/png" href="/images/icons/favicon.png"/>
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="/vendor/slick/slick.css">
<!--===============================================================================================-->
<meta name="csrf-token" content="{{ csrf_token() }}" />

{{--favicons--}}
<link rel="apple-touch-icon" sizes="57x57" href="/images/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/images/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/images/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/images/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/images/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/images/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/images/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/images/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/images/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
<meta name="msapplication-TileColor" content="#4187c7">
<meta name="msapplication-TileImage" content="/images/ms-icon-144x144.png">
<meta name="theme-color" content="#4187c7">



<meta name="msapplication-navbutton-color" content="#4187c7">
<meta name="apple-mobile-web-app-status-bar-style" content="#4187c7">

<meta name="format-detection" content="telephone=no">

<!-- Add to Home Screen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="Aras Towel">

<!-- Touch Icons -->
<link rel="apple-touch-icon" href="/images/apple-icon-57x57.pngg">
<link rel="apple-touch-icon-precomposed" href="/images/apple-icon-57x57.png">
<!-- In most cases, one 180×180px touch icon in the head is enough -->
<!-- If you use art-direction and/or want to have different content for each device, you can add more touch icons -->

<!-- Startup Image -->
<link rel="apple-touch-startup-image" href="/images/apple-icon-57x57.png">
<link rel="mask-icon" href="/images/apple-icon-57x57.png" color="#4187c7">

<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Add to homescreen -->
<meta name="mobile-web-app-capable" content="yes">
<meta name="google" value="notranslate">

<link rel="stylesheet" href="/packages/owl/assets/owl.carousel.min.css">
<link rel="stylesheet" href="/packages/owl/assets/owl.theme.default.min.css">

{{--<!-- Global site tag (gtag.js) - Google Analytics -->--}}
{{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-110406743-1"></script>--}}
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-110406743-1');
</script>

<script src="/js/jquery.min.js"></script>

<script src="/packages/owl/owl.carousel.min.js"></script>
<script src="/js/sweetalert2.all.min.js"></script>
<link href="/css/sweetalert2.min.css" rel="stylesheet">

<style>
    .displaynone{display:none}.modal{display:none;position:fixed;z-index:1000;top:0;left:0;height:100%;width:100%;background:rgba(255,255,255,1) 50% 50% no-repeat}body.loading .modal{overflow:hidden;display:block}.newprice{display:inline-block;direction:rtl;color:purple}.line-through{text-decoration:line-through!important;display:inline-block;direction:rtl}
    figcaption{font-family: 'iranSans';text-align: center;font-size: 15px;} a, div{ font-family: 'iranSans';}

    .select2-dropdown--below{
        z-index: 999999999!important;
    }
    .select2-search--dropdown{
        display: none!important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        top:11px!important;
    }
    .select2-results__option{
        text-align: center!important;
        direction: unset;
    }
    .hovblack:hover{
        color:black;
    }
</style>

{{--<script>--}}
{{--    !function (t, e, n) {--}}
{{--        t.yektanetAnalyticsObject = n, t[n] = t[n] || function () {--}}
{{--            t[n].q.push(arguments)--}}
{{--        }, t[n].q = t[n].q || [];--}}
{{--        var a = new Date, r = a.getFullYear().toString() + "0" + a.getMonth() + "0" + a.getDate() + "0" + a.getHours(),--}}
{{--            c = e.getElementsByTagName("script")[0], s = e.createElement("script");--}}
{{--        s.id = "ua-script-gCnLbZUW"; s.dataset.analyticsobject = n;--}}
{{--        s.async = 1; s.type = "text/javascript";--}}
{{--        s.src = "https://cdn.yektanet.com/rg_woebegone/scripts_v3/gCnLbZUW/rg.complete.js?v=" + r, c.parentNode.insertBefore(s, c)--}}
{{--    }(window, document, "yektanet");--}}
{{--</script>--}}

@php date_default_timezone_set("Asia/Tehran") @endphp
