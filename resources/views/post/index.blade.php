<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 08/02/2017
 * Time: 10:15
 */
?>

@extends('layouts.app')

@section('content')
<!-- SLIDER -->
<section id="home" STYLE="min-height: 200px">
    <div id="main-slider" class="text-center" style="margin: auto" >
        <div class="row">
            <h2>Galerie d'images</h2>
        </div>

    </div>
</section>
<!-- END SLIDER -->

@foreach($posts as $post )
<img src="{{ url($post->getImagePath('thumb')) }}" alt="">



@endforeach

@endsection


@section('script')


@endsection