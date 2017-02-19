<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 04/02/2017
 * Time: 22:59
 */
?>

@extends('layouts.app')

@section('content')

<!-- SLIDER -->
<section id="home" STYLE="min-height: 200px">
    <div id="main-slider" class="text-center" style="margin: auto" >
        <div class="row">
            <h2>Liste des membres</h2>

            <!-- Button trigger modal -->
            <a href="#" class="" >
                <h4 style="font: #ffffff">Ils sont tous fantastiques <i class="fa fa-thumbs-up"></i></h4>
            </a>
        </div>

    </div>
</section>
<!-- END SLIDER -->



<div class="row">
    <div class="col-sm-12 col-md-12 text-center">


    </div>

    <div class="container" style="min-height: 500px">

        @foreach($users as $key => $user )

        <div class="row">

            <div class="col-md-8">

                <div class="row">
                    <div class="col-md-6">
                        <h3>
                            {{ $user->name }}
                        </h3>
                    </div>
                    <div class="col-md-6">
                        <h3>
                            {{ $user->firstname }} {{ $user->lastname }}

                        </h3>
                    </div>

                </div>

            </div>

            <div class="col-sm-12 col-md-4">

                @if(Auth::user()->role == 'admin' )

                    <a class="btn btn-primary" href="{{ action('UsersController@edit', $user) }}">Editer</a>


                @endif

                    <a href="{{action('UsersController@show' ,$user)}}">
                        <span>voir</span>
                    </a>


            </div>



        </div>
        <a href="{{ action('UsersController@updateTo' , $user) }}" class="">
            {{ $user->prof == 1 ? "retirer le statut de professeur" : "lui attribuer le statut de professeur " }}
        </a>

        @endforeach
    </div>

</div>


@endsection
