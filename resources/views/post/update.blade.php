<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 08/02/2017
 * Time: 11:24
 */
?>
@extends('layouts.app')

@section('content')
<!-- SLIDER -->
<section id="home" STYLE="min-height: 200px">
    <div id="main-slider" class="text-center" style="margin: auto" >
        <div class="row">
            <h2>edition d'une image</h2>
        </div>

    </div>
</section>
<!-- END SLIDER -->

@include('post.form' , ['action' => 'update'])

@endsection
