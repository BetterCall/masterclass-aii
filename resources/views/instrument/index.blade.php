@extends('layouts.app')


@section('content')


    <!-- SLIDER -->
    <section id="home" STYLE="min-height: 200px">
        <div id="main-slider" class="text-center" style="margin: auto" >
            <div class="row">
                <h2>Liste des Instruments</h2>
                <!-- Button trigger modal -->
                <a href="#" class="" >
                    <h4 style="font: #ffffff"></i>L'ajout d'instruments n'est actuellement pas disponible</h4>
                </a>
            </div>

        </div>
    </section>
    <!-- END SLIDER -->

    <div class="row">


    @foreach($instruments as $instrument ) 
        <div class="col-sm-12 col-md-4">
            <div class="text-center">
                <h3>
                    {{ $instrument->name }}
                </h3>
                <a href="{{ action('InstrumentsController@edit' , $instrument) }}">modifier</a>
            </div>

            @if($instrument->avatar)
                <img src="{{ url($instrument->avatar) }}"  class="img-responsive" alt="Image de {{ $instrument->name}}"/>
            @else

                <img src='' class="img-responsive" alt="">
            @endif
        </div>        

    @endforeach

    </div>


@endsection