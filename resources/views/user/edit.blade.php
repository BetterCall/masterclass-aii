<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 04/02/2017
 * Time: 16:35
 */
?>

@extends('layouts.app')


@section('content')
@include('user.form', ['action' => 'update'])


@endsection
