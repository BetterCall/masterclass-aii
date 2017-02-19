<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 26/01/2017
 * Time: 12:08
 */
?>

@extends('layouts.app')

@section('content')

@include('concert.form' , ['action' => 'update' ])

@endsection

