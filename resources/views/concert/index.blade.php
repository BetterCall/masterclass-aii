<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 05/02/2017
 * Time: 18:53
 */
?>

@extends('layouts.app')

@section('content')

<!-- SLIDER -->
<section id="home" STYLE="min-height: 200px">
    <div id="main-slider" class="text-center" style="margin: auto" >
        <div class="row">
            <h2>Liste des concerts</h2>
        </div>

    </div>
</section>
<!-- END SLIDER -->

@foreach($concerts as $concert )

    <div class="row">

        <div class="col-md-12 text-center">
            <a href="{{action('ConcertsController@show', $concert ) }}">
                <h2>{{ $concert->name }}</h2>
            </a>
            <a href="{{action('ConcertsController@edit' , $concert ) }}">modifier</a>
        </div>

        <div class="col-md-offset-1 col-md-4">
            <ul>
                @foreach($concert->musics()->get() as $m )
                <li>{{$m->name}}</li>
                @endforeach

            </ul>


        </div>

        <div class="col-md-6">

        </div>

    </div>



@endforeach


@endsection
