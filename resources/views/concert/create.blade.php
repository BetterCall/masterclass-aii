<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 07/02/2017
 * Time: 19:43
 */?>

@extends('layouts.app')

@section('content')
<!-- SLIDER -->
<section id="home" STYLE="min-height: 200px">
    <div id="main-slider" class="text-center" style="margin: auto" >
        <div class="row">
            <h2>création d'un concert</h2>
        </div>

    </div>
</section>
<!-- END SLIDER -->



<!-- CONTACT -->
<section id="contact">

    <div class="contact-section">
        <div class="ear-piece">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-4">


                    <div id="contact-section">
                        @include('concert.form' , ['action' => 'store' ])
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CONTACT -->



@endsection

@section('script')
<script>
    /**
     * DateTimePicker
     */
    $(".start_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        linkField: "start",
        linkFormat: "yyyy-mm-dd hh:ii"
    });
</script>

@endsection