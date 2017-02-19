<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 07/02/2017
 * Time: 16:55
 */
?>

@extends('layouts.app')

@section('content')

<!-- SLIDER -->
<section id="home" STYLE="min-height: 200px">
    <div id="main-slider" class="text-center" style="margin: auto" >
        <div class="row">
            <h2>Repertoire Musical</h2>

            <!-- Button trigger modal -->
            <a href="{{ action('MusicsController@create') }}" class="" >
                <h4 style="font: #ffffff"><i class="fa fa-plus"></i>Ajouter une Musique</h4>
            </a>
        </div>

    </div>
</section>
<!-- END SLIDER -->
<div class="row">

@foreach($musics as $music )

<div class="col-md-6 col-sm-12">

    <div class="col-md-12 text-center">
        <a href="">
            <h2>{{ $music->name }}</h2>
        </a>
        <a href="{{ action('MusicsController@edit', $music ) }}">modifier</a>
    </div>

    <div class="col-md-12 text-center">
        <h4>
            {{ $music->artist }} {{ $music->album }}
        </h4>

    </div>

    <div class="col-md-6">

    </div>

</div>



@endforeach

</div>

@endsection
