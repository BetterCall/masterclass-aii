<?php
/**
 * Created by IntelliJ IDEA.
 * User: CREAMANTA
 * Date: 03/01/2017
 * Time: 16:19
 */
?>
@extends('layouts.app ')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <h3 class="text-center">
                        {{ $masterclass->name }}
                    </h3>
                    <h4 class="text-center">Prix : {{$masterclass->price}} €</h4>

                </div>
                <div class="col-md-9">

                </div>
                <div class="col-md-3">
                    @if( Auth::user() )

                        @if( $masterclass->followedBy(Auth::user() ))
                            <a href="{{action('MasterclassController@subscribe' ,$masterclass)}}" class="btn btn-success " data-method="post">
                                se desinscrire
                            </a>
                        @else
                            <a data-method="post" href="{{action('MasterclassController@subscribe', $masterclass ) }} " class="btn btn-success">
                                s'inscrire
                            </a>

                        @endif

                    @else

                    @endif

                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                </div>
                <div class="col-md-3">
                    <h3>
                        Theme :
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center">
                        Start
                    </h3>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">
                        End
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center ">
                        {{ $masterclass->content }}
                    </p>
                </div>
            </div>
            <div class="row">
                <a href="{{ action('MasterclassController@createCours' , $masterclass) }}" class="btn btn-primary">
                    Ajouter un cours
                </a>
                <a href="{{ action('MasterclassController@createConcert' , $masterclass) }}" class="btn btn-primary">
                    Ajouter un concert
                </a>

            </div>

        </div>
    </div>
</div>


<div class="row">

    @if(!empty($cours) )
    @foreach($cours as $key => $c)

        <div class="col-md-6">

            <!-- JOUR -->
            @if($key%2)
            <div class="col-md-11" style="background-color: rgba(242,242,242,0.5 ) ; margin-top: 25px;">

            @else
            <div class="col-md-offset-1 col-md-11" style="background-color: rgba(242,242,242,0.5 ) ; margin-top: 25px; ">

            @endif
                <div class="row">
                    <div class="col-md-12  text-center">
                        <h3>
                            {{$c->name}}
                        </h3>
                    </div>

                    <!-- COURS -->
                    <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <section class="text-center">
                            <h4></h4>
                            <h5>{{ $c->start}} - {{ $c->end }}</h5>
                            <img src="{{url('/images/avatars/instruments/'.$c->instruments_id.'.png') }}" alt="" class="img-responsive center-block">
                            <p>resume du cours</p>
                        </section>
                    </div>
                    <!-- END COURS -->

                </div>
            </div>
            <!-- END DAY -->
        </div>

    @endforeach
            @endif



</div>





@endsection

@section('script')

@endsection

