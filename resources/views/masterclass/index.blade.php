<?php
/**
 * Created by IntelliJ IDEA.
 * User: Bryann
 * Date: 03/01/2017
 * Time: 15:23
 */
?>
@extends('layouts.app')

@section('content')
<!-- SLIDER -->
<section id="home" STYLE="min-height: 200px">
    <div id="main-slider" class="text-center" style="margin: auto" >
        <div class="row">
            <h2>Liste des Stages</h2>

            <!-- Button trigger modal -->
            <a href="{{ action('MasterclassController@create') }}" class="" >
                <h4 style="font: #ffffff"><i class="fa fa-plus"></i>Ajouter un stage</h4>
            </a>
        </div>

    </div>
</section>
<!-- END SLIDER -->



@foreach($masterclass as $key => $m)

<input type="hidden" value="{{$m->start}}" class="clockdivValue" data-id="clockdiv{{$key}}">

<!-- NEXT EVENT -->
<section id="" class="padding">
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-md-offset-2 col-sm-5">
                <h3>{{$m->name}}</h3>
                <a href="{{action('MasterclassController@show' ,$m)}}">
                    <i class="fa fa-arrow-right"></i>
                    <span>Voir</span>
                </a>

            </div>
            <div class="col-sm-7 col-md-6">
                <div id="clockdiv{{$key}}" class="clockdiv">
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

@endforeach

@endsection


@section('script')
<script>
    $('.datepicker').datepicker({format: 'dd/mm/yyyy'}) ;

    $('.clockdivValue').each(function(){

        $that = $(this) ;
       console.log( )

        initializeClock($that.attr('data-id'), $that.val()) ;

    });

</script>
@endsection