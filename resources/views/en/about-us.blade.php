<!DOCTYPE html>
<html lang="en-us">
<head>
    <title>About Aras towel, Aras towel online store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    @include('en.includes.headLinks')
    <script defer src="/js/jquery-bootstrap.js"></script>

</head>
<body class="animsition loading">

@include('en.includes.header')


<!-- Title Page -->
@foreach($template as $temp)
    @if($temp->place=='aboutHeader')
        <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{$temp->image}});">
            <h1 class="l-text2 t-center" style="color: #fff">
                About Aras Towel
            </h1>
        </section>
    @endif
@endforeach
<!-- content page -->
<section class="bgwhite p-t-66 p-b-38">
    <div class="container">
        <div class="row">
            <div class="col-md-4 p-b-30">

                <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: 0px">
                    <!-- Indicators -->


                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item item1 active">
                            @foreach($template as $temp)
                                @if($temp->place=='about1')
                                    <img alt="about aras towel" src="{{$temp->image}}">
                                @endif
                            @endforeach
                        </div>

                        <div class="item item2">
                            @foreach($template as $temp)
                                @if($temp->place=='about2')
                                    <img alt="aras towel factory" src="{{$temp->image}}">
                                @endif
                            @endforeach
                        </div>

                        <div class="item item3">
                            @foreach($template as $temp)
                                @if($temp->place=='about3')
                                    <img alt="online shopping of towel" src="{{$temp->image}}">
                                @endif
                            @endforeach
                        </div>

                        <div class="item item4">
                            @foreach($template as $temp)
                                @if($temp->place=='about4')
                                    <img alt="aras towel packaging" src="{{$temp->image}}">
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8 p-b-30">
                <h3 class="m-text26 p-t-15 p-b-16" style="text-align: left!important;padding-top: 0;">
                    Our Story!
                </h3>

                <p class="p-b-28" style="direction: ltr!important;text-align: left!important;">
                    The activity of the Aras’ towel Factory has started in 1964, and we are now working hard to extend the scope of our activities day by day. Aras' towels are the result of a family business that, over the years, has left us with the art of the fathers and elders of this arena. By reviewing the history of Iran in this field, we find that we inherit treasures rich in various arts of dyeing, knitting, designing, and packaging. We also praise the efforts of our fathers and ancestors to create a new plan by combining the traditional methods of this industry with the new methods and techniques knowledge know-how of the day. In line with the main goals of the company, we bring a combination of art, expertise, elegance, and tranquility along with guaranteeing the quality and variety of design and color, and we proudly announce that the quality of all products at all stages of fabrication, dyeing, designing, sewing, embroidery, packaging design is controlled by professionals so that the products of Aras's towels are at your highest level to offer you the best worthy customer.
                </p>


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
