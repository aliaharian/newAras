@php
    $agent=new \Jenssegers\Agent\Agent();
@endphp
@if($agent->isMobile() || $agent->isTablet())
    <div class="t-center s-text8 p-t-15" style="font-family: Montserrat-Regular!important;font-size: 11px;padding-bottom: 13px; padding-top:13px;background: #14334c;text-align: center;color:#fff;">
        Copyright 2019 © All Rights Reserved for Arastowel.com
        <div style="text-align: center">
            <a  title="موسسه نصیرزاده" href="https://nasirzadeh.com" target="_blank" style="font-weight:500!important;font-size: 8px!important;display: inline-block;">Graphic Design/H.Nasirzadeh <span style="font-size: 10px;color:#96a6b3!important;">&#8226;</span>  Developed By A. Aharian</a>
        </div>
    </div>

@else
    <div class="t-left s-text8 p-t-15" style="font-family: Montserrat-Regular!important;font-size: 12px;padding:15px 60px;background: #14334c;color:#fff;display:flex;">
        ©2024 Arastowel
        <div class="pull-left" style="position: relative;top:-3px;margin-left:36px;">
            <!--<a  title="موسسه نصیرزاده" href="https://nasirzadeh.com"   target="_blank" class="fs-18 color1 p-l-20 nsfooter" style="bottom: -33px;left: 66px;position: absolute;display: block; width: 30px;height: 30px;background-position: center;background-size: contain;background-repeat: no-repeat;padding-left: 45px;padding-bottom: 15px;"></a>-->
            <a  title="موسسه نصیرزاده" href="https://nasirzadeh.com" target="_blank" style="font-family: roboto !important;font-weight:500!important;left: 60px;width:232px;font-size: 8px!important;line-height:30px!important;padding-top: 3px;color:#96a6b3 !important">Designed by S.nasirzadeh /Developed By A.Aharian</a>
        </div>
    </div>

@endif
<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>
