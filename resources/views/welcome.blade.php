@extends('layouts.app')

@section('content')


<!-- SLIDER -->
<section id="home" STYLE="min-height: 520px">
    <div id="main-slider" class="text-center" style="margin: auto" >
        <div class="row">
            <h2>BAND CAMP</h2>
        </div>

    </div>
</section>
<!-- END SLIDER -->


<!-- CONTACT -->
<section id="contact" >

    <div class="contact-section" style="min-height: 350px">
        <div class="ear-piece">
            <img class="img-responsive" src="images//front/ear-piece.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-4">


                    <div id="">

                        <h2>BandCamp</h2>
                        <p>
                            organise depuis une vingtaine d’années,
                            des formations musicales et instrumentales, et vous convie
                            cet été 2016 a nous rejoindre au Village de Vacances : « Tall OKS ».
                        </p>
                        <a href="#" class="btn btn-primary">View Date & Place <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CONTACT -->

<section id="counter" class="counter">
    <div class="main_counter_area">
        <div class="overlay p-y-3">
            <div class="container">
                <div class="row">
                    <div class="main_counter_content text-center white-text wow fadeInUp">
                        <div class="col-md-3">
                            <div class="single_counter p-y-2 m-t-1">
                                <i class="fa fa-heart m-b-1"></i>
                                <h2 class="statistic-counter">100</h2>
                                <h3>Style</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="single_counter p-y-2 m-t-1">
                                <i class="fa fa-check m-b-1"></i>
                                <h2 class="statistic-counter">400</h2>
                                <h3>erreurs corrigées</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="single_counter p-y-2 m-t-1">
                                <i class="fa fa-refresh m-b-1"></i>
                                <h2 class="statistic-counter">312</h2>
                                <h3>Design essayés</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="single_counter p-y-2 m-t-1">
                                <i class="fa fa-beer m-b-1"></i>
                                <h2 class="statistic-counter">480</h2>
                                <h3>cafés</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End of counter Section -->

<!-- NEXT EVENT -->
<section id="explore">
    <div class="container">
        <div class="row">
            <div class="watch">
                <img class="img-responsive" src="{{ url('/images/front/watch.png') }}" alt="">
            </div>
            <div class="col-md-4 col-md-offset-2 col-sm-5">

            </div>
            <div class="col-sm-7 col-md-6">
                <div class="row">
                    <h3>La prochaine commencera dans</h3>
                </div>
                <input type="hidden" value="{{$masterclass->start}}" class="clockdivValue" data-id="clockdiv">
                <div id="clockdiv" class="clockdiv">
                    <div>
                        <span class="days"></span>
                        <div class="smalltext">Jours</div>
                    </div>
                    <div>
                        <span class="hours"></span>
                        <div class="smalltext">Heures</div>
                    </div>
                    <div>
                        <span class="minutes"></span>
                        <div class="smalltext">Minutes</div>
                    </div>
                    <div>
                        <span class="seconds"></span>
                        <div class="smalltext">Secondes</div>
                    </div>
                </div>
            </div>

        </div>
</section>
<!-- END NEXT EVENT -->



<!-- CONCERT -->
<section id="event" style="padding-bottom: 50px">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <h2 class="heading">Les Prochains concerts</h2>

                @foreach($concerts as $concert)
                    <div class="col-sm-4" style=" padding : 25px" ;>
                        <div class="row" style=" background-color:rgba(242,242,242,0.5)">

                            <div class="col-md-12 col-sm-12">
                                <div class=" text-center">
                                    <h4>{{$concert->name}}</h4>
                                </div>

                                @foreach($concert->musics()->get() as $music)
                                        <h5>{{ $music -> name }}</h5>
                                @endforeach
                            </div>

                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <div class="guitar">
        <img class="img-responsive" src="{{ url('/images/front/guitar.png') }}" alt="guitar">
    </div>
</section>
<!-- END CONCERT -->



<!-- PROFESSORS -->
<section id="twitter">
    <div id="twitter-feed" class="carousel slide" data-interval="false">

        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="text-center carousel-inner center-block">

                    <div class="item active">
                        <img src="images/twitter/twitter1.png" alt="">
                        <p>{{ $fProf->resume}}</p>
                        <a href="#">http://t.co/yY7s1IfrAb 2 days ago</a>
                    </div>

                    @foreach($profs as $prof)
                    <div class="item">
                        <img src="images/twitter/twitter2.png" alt="">
                        <p>{{ $prof->resume }}</p>
                        <a href="#">Voir mon profil</a>
                    </div>
                    @endforeach
                </div>
                <a class="twitter-control-left" href="#twitter-feed" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="twitter-control-right" href="#twitter-feed" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- END TWITTER -->



<!-- ABOUT
<section id="about">
    <div class="guitar2">
        <img class="img-responsive" src="{{ url('/images/front/guitar2.jpg') }}" alt="guitar">
    </div>
    <div class="about-content">

    </div>
</section>
<!-- END ABOUT -->


<!-- SPONSOR
<section id="sponsor">
    <div id="sponsor-carousel" class="carousel slide" data-interval="false">
        <div class="container">
            <div class="row">
                <div class="col-sm-10">
                    <h2>Sponsors</h2>
                    <a class="sponsor-control-left" href="#sponsor-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                    <a class="sponsor-control-right" href="#sponsor-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
                    <div class="carousel-inner">
                        <div class="item active">
                            <ul>
                                <li><a href="#"><img class="img-responsive" src="images/front/sponsor/gibson.png" alt=""></a></li>
                                <li><a href="#"><img class="img-responsive" src="images/front/sponsor/sponsor2.png" alt=""></a></li>
                                <li><a href="#"><img class="img-responsive" src="images/front/sponsor/gibson.png" alt=""></a></li>
                                <li><a href="#"><img class="img-responsive" src="images/front/sponsor/sponsor4.png" alt=""></a></li>
                                <li><a href="#"><img class="img-responsive" src="images/front/sponsor/sponsor5.png" alt=""></a></li>
                                <li><a href="#"><img class="img-responsive" src="images/front/sponsor/sponsor6.png" alt=""></a></li>
                            </ul>
                        </div>
                        <div class="item">
                            <ul>
                                <li><a href="#"><img class="img-responsive" src="images/front/sponsor/sponsor5.png" alt=""></a></li>
                                <li><a href="#"><img class="img-responsive" src="images/front/sponsor/sponsor4.png" alt=""></a></li>
                                <li><a href="#"><img class="img-responsive" src="images/front/sponsor/sponsor3.png" alt=""></a></li>
                                <li><a href="#"><img class="img-responsive" src="images/front/sponsor/sponsor2.png" alt=""></a></li>
                                <li><a href="#"><img class="img-responsive" src="images/front/sponsor/gibson.png" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="light">
            <img class="img-responsive" src="images//front/light.png" alt="">
        </div>
    </div>
</section>
<!-- END SPONSOR -->

<div id="map"  class="">

</div>


<!-- FOOTER -->
<footer id="footer">
    <div class="container">
        <div class="text-center">
            <p> Copyright &copy;2017
                <a target="_blank" href="http://shapebootstrap.net/">
                    BROVIA BRYANN
                </a>
                LP AII
                <br> Designed by <a target="_blank" href="http://shapebootstrap.net/">ShapeBootstrap</a>
            </p>
        </div>
    </div>
</footer>

@endsection


@section('script')
<script>
    jQuery('.statistic-counter').counterUp({
        delay: 10,
        time: 2000
    });

    $('.clockdivValue').each(function(){

        $that = $(this) ;
        console.log( )

        initializeClock($that.attr('data-id'), $that.val()) ;

    });

</script>
@endsection