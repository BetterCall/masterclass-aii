<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 07/02/2017
 * Time: 10:06
 */
?>

@extends('layouts.app')


@section('content')
<!-- SLIDER -->
<section id="home" STYLE="min-height: 200px">
    <div id="main-slider" class="text-center" style="margin: auto" >
        <div class="row">
            <h2>création d'un cours</h2>
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
                        @include('cours.form' , ['action' => 'store'])
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
     * Select stage's them
     */
    $('.changeInstrument').on('click', function() {
        var themesIdValue = $('.instruments_id.active').attr("data-value") ;
        $('#instruments_id').val(themesIdValue) ;
        console.log(themesIdValue)

    }) ;
    /**
     * Select stage's them
     */
    $('.changeProf').on('click', function() {
        var themesIdValue = $('.user_id.active').attr("data-value") ;
        $('#user_id').val(themesIdValue) ;
        console.log('click')

    }) ;



    /**
     * DateTimePicker
     */
    $(".start_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        linkField: "start",
        linkFormat: "yyyy-mm-dd hh:ii"
    });
    $(".end_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        linkField: "end",
        linkFormat: "yyyy-mm-dd hh:ii"
    });
</script>

@endsection
