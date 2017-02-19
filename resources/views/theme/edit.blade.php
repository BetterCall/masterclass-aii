<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 07/02/2017
 * Time: 21:55
 */
?>

@extends('layouts.app')

@section('content')
<!-- SLIDER -->
<section id="home" STYLE="min-height: 200px">
    <div id="main-slider" class="text-center" style="margin: auto" >
        <div class="row">
            <h2>Edition du theme : {{ $theme->name }} </h2>
        </div>

    </div>
</section>
<!-- END SLIDER -->
@include('theme.form', ['action' => 'update'])

@endsection


