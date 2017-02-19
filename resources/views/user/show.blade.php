<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 04/02/2017
 * Time: 16:57
 */
?>

@extends('layouts.app')

@section('content')

<!-- SLIDER -->
<section id="home" STYLE="min-height: 520px">
    <div id="main-slider" class="text-center" style="margin: auto" >
        <div class="row">
            <h2>
                {{ $user->name }}
            </h2>
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                <img alt="Bootstrap Image Preview" src="http://lorempixel.com/140/140/" class="img-rounded img-responsive" />
            </div>

        </div>

    </div>
</section>
<!-- END SLIDER -->



<!-- CONTACT -->
<section id="contact"">

    <div class="contact-section">
        <div class="ear-piece">
            <img class="img-responsive" src="{{url('images//front/ear-piece.png')}}" alt="">
        </div>
        <div class="container"  style="padding-bottom: 35px">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-4">
                    <div class="contact-text">
                        <address>

                        </address>
                    </div>
                    <div class="contact-address">
                    </div>

                    <div id="contact-section" class="">

                        <h2>Qui suis-je ?</h2>
                        <p>
                            {{ $user->content }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CONTACT -->



<section id="counter" class="counter">
    <div class="row text-center">
        <h2>Mes Skills</h2>
    </div>
    <div class="main_counter_area">

    </div>
</section><!-- End of counter Section -->



<!-- PROFESSORS -->
<section id="twitter" style="color : black">
    <div class="row text-center">
        <h2>Mes stages</h2>
    </div>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="text-center center-block">
                <div>
                    @foreach($subscriptions as $sub )
                    <div>
                        {{ $sub['masterclass']->name }} etat :
                        @if($sub['etat'] == 0 )
                        <span class="text-warning">En attente</span>
                        @elseif ($sub['etat'] == 1 )
                        <span class="text-success">Acceptée</span>

                        @else
                        <span class="text-warning">refusée</span>

                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- END TWITTER -->



@endsection


