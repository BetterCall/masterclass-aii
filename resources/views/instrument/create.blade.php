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

    @include('instrument.form', ['action' => 'store'])

@endsection