<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 05/02/2017
 * Time: 17:35
 */
?>

@extends('layouts.app')

@section('content')

<div class="row text-center">
    <h2>Modification d'un instrument</h2>
</div>

@include('instrument.form', ['action' => 'update'])


@endsection