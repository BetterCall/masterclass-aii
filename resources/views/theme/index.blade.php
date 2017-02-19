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
            <h2>Themes des stages</h2>

            <!-- Button trigger modal -->
            <a href="{{ action('ThemesController@create') }}" class="" >
                <h4 style="font: #ffffff"><i class="fa fa-plus"></i>Ajouter un Theme</h4>
            </a>
        </div>

    </div>
</section>
<!-- END SLIDER -->
<div class="row">

@foreach($themes as $theme )

<div class="col-md-6 col-sm-12">

    <div class="col-md-12 text-center">
        <a href="">
            <h2>{{ $theme->name }}</h2>
        </a>
        <a href="{{ action('ThemesController@edit', $theme ) }}">modifier</a>
    </div>

</div>



@endforeach

</div>

@endsection
