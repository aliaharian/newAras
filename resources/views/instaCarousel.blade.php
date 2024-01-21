<div class="instaContainer">
    <h3>#enjoyarastowel</h3>
    <div class="owl-carousel">
         @foreach($instas as $insta)
            <div class="insta-item">
                <img alt="حوله تبلیغاتی ارس" src="{{$insta->image}}"/>
                <a target="_blank" href="{{$insta->link}}" class="instaOverlay">
                    <span></span>
                    @if($insta->for_sale==1)
                    <div>خرید کنید</div>
                    @endif
                </a>
            </div>
        @endforeach

    </div>
</div>

