<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 25/01/2017
 * Time: 13:24
 */
?>

@extends('layouts.app')

@section('content')

<div class="container-fluid" >

    <div class="row">
        <div class="col-sm-12 col-md-12 text-center">

            @if(empty($rows))
                <h1 >aucune demande en attente </h1>
            @endif
        </div>

        <div class="container" style="min-height: 500px">

            @foreach($rows as $key => $row )

                <div class="row">

                    <div class="col-md-8">

                        <div class="row">
                            <div class="col-md-6">
                                <h3>
                                    {{ $row['masterclass']->name }}
                                </h3>
                            </div>
                            <div class="col-md-6">
                                <h3>
                                    {{ $row['user']->name }}

                                </h3>
                            </div>

                        </div>


                    </div>

                    <div class="col-sm-12 col-md-4">

                        <a
                            href="subscription/registration/{{ $row['masterclass']->id }}/{{ $row['user']->id }}/-1"
                            class="btn btn-success "
                            data-method="post"
                        >
                            Refuser
                        </a>

                        <a
                            href="subscription/registration/{{ $row['masterclass']->id }}/{{ $row['user']->id }}/0"
                            class="btn btn-success "
                            data-method="post"
                        >
                            accepter
                        </a>

                    </div>

                </div>

            @endforeach
        </div>

    </div>
</div>

@endsection