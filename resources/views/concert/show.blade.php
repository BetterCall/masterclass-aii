<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 07/02/2017
 * Time: 10:28
 */
?>


@extends('layouts.app')


@section('content')


<div class="row text-center">
    <h2>{{ $concert->name }}</h2>
</div>

<div class="row">

    <div class="col-md-8">




    </div>
    <div class="col-md-4">



        <div class="row">

            <div class="row text-center">
                <h3>Playlist</h3>

            </div>

            <div class="col-md-offset-1 col-md-10">

                <ul>

                    @foreach($concert->musics()->withPivot('id')->get() as $music)
                    <div class="row" >
                        <h4>{{ $music -> name }}</h4>
                        @foreach($music -> subscribers($music->id,$concert->id) as $row )
                        <li>{{ $row['user']->name }} -> {{$row['instrument']->name }} </li>

                        @endforeach

                        <span>je veux y participer avec </span>
                        {{ Form::select(
                                '',
                                App\Instrument::all()->lists('name' , 'id') ->toArray() ,
                                null,
                                array(
                                    'class' => 'form-control intrumentRegistration instrumentSelector' ,
                                    'data-value' => $music->pivot->id

                                )
                            )
                        }}



                        <a
                            href="subscribe/{{ $music->pivot->id }}/{{Auth::user()->id}}/1"
                            class=""
                            id="registration{{ $music->pivot->id }}"
                            data-method="post"
                        >
                        <i class="fa fa-plus"></i>
                        </a>

                    </div>


                    @endforeach
                </ul>


            </div>


        </div>

        <div class="row text-center">
            <h4>Proposer une musique</h4>

            {!!
            Form::open(
            [
            'url' => action("ConcertsController@addMusic" ),
            'method' => "Post" ,
            'class' => '' ,
            ]
            )
            !!}

            {!!
            Form::select(
            'music_id',
            App\Music::all()->lists('name' , 'id') ->toArray()  ,
            [
            'id' => "" ,
            'class' => '' ,
            'placeholder' => ''
            ]
            )
            !!}

            {!!
            Form::text(
            'concert_id',
            $concert->id ,
            [
            'id' => "" ,
            'class' => 'hidden' ,
            'placeholder' => ''
            ]
            )
            !!}


            <button type="submit" >
                Proposer
            </button>


            {!! Form::close() !!}

        </div>



    </div>

</div>




@endsection


@section('script')

<script>

$('.instrumentSelector').change(function() {

    $that = $(this) ;
    // on recupere l'id pivot unique a chanque chanson
    var data = $that.attr('data-value') ;

    //on recupere l'url de subscription
    var url = $('#registration'+data).attr('href') ;

    // On modifie l'url en remplacant le dernier indice dutableau par l'instrument avec le quel on s'inscrit
    var arrayOfUrl = url.split('/');
    arrayOfUrl[3] = $that.val() ;
    url = arrayOfUrl.join('/');
    //nouvelle url
    $('#registration'+data).attr('href', url) ;

});


</script>

@endsection
