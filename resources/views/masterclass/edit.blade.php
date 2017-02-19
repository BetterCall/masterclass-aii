<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 17/01/2017
 * Time: 14:12
 */
?>


@extends('layouts.app')

@section('content')
<!-- MASTERCLASS INFORMATIONS -->

    @include('masterclass.form', ['action' => 'update'])

@endsection

@section('script')

    <script>

        $('.changeTheme').on('click', function() {
            var themesIdValue = $('.active').attr("data-value") ;
            $('#themes_id').val(themesIdValue) ;

            console.log(themesIdValue);

        }) ;


        var themesIdValue = $('#themes_id').val() ;
        $('.item'+themeIdValue ).addClass("active")


    </script>

@endsection