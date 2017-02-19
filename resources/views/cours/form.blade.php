<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 23/01/2017
 * Time: 15:56
 */
?>


{!!
    Form::Model(
        $cours,
        [
            'url' => action("CoursController@$action" ,$cours),
            'method' => $action =="store" ? "Post" : "PUT" ,
            'class' => ''
        ]
    )
!!}

{!!
Form::text(
'masterclass_id',
$masterclass_id ,
[
'class' => 'hidden' ,
'placeholder' => 'Nom du cours'
]
)
!!}

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">

            </div>
            <div class="col-md-4">

                <h3 class="text-center">
                    Professeur
                </h3>

                <div id="professeur-feed" class="carousel slide" data-interval="false">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="text-center carousel-inner center-block">

                                @foreach(App\User::prof() as $prof )

                                <div class=" user_id item item{{ $prof->id }} {{ $prof->id == '1' ? 'active' : '' }}" data-value = "{{$prof->id }}">
                                    <img src="{{ url($prof->avatar) }}" class="img-responsive" alt="">
                                    <a href="#">{{ $prof->name }}</a>
                                </div>
                                @endforeach
                            </div>

                            {!!
                                Form::text(
                                    'user_id',
                                    null ,
                                    [
                                        'id' => "user_id" ,
                                        'class' => 'hidden' ,
                                        'placeholder' => ''
                                    ]
                                )
                            !!}

                            <a class="twitter-control-left changeProf" href="#professeur-feed" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                            <a class="twitter-control-right changeProf" href="#professeur-feed" data-slide="next"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>



            <div class="col-md-4 col-md-offset-4">
                <h3 class="text-center">
                    Instrument
                </h3>

                <div id="theme-feed" class="carousel slide" data-interval="false">
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3">
                            <div class="text-center carousel-inner center-block">

                                @foreach(App\Instrument::all() as $instrument )

                                    <div class=" instruments_id item item{{ $instrument->id }} {{ $instrument->id == '1' ? 'active' : '' }}" data-value = "{{$instrument->id }}">
                                    <img src="{{ url($instrument->avatar) }}" class="img-responsive" alt="">
                                    <a href="#">{{ $instrument->name }}</a>
                                </div>
                                @endforeach
                            </div>

                            {!!
                                Form::text(
                                'instruments_id',
                                null ,
                                [
                                'id' => "instruments_id" ,
                                'class' => 'hidden' ,
                                'placeholder' => ''
                                ]
                                )
                            !!}

                            <a class="twitter-control-left changeInstrument" href="#theme-feed" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                            <a class="twitter-control-right changeInstrument" href="#theme-feed" data-slide="next"><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row" style="margin-top: 50px ; ">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">

                            {!!
                                Form::text(
                                    'name',
                                    null ,
                                    [
                                        'class' => '' ,
                                        'placeholder' => 'Nom du cours'
                                    ]
                                )
                            !!}
                        </div>
                        <div class="form-group">

                            <div class="input-append date start_datetime" data-date="2017-01-01T15:25:00Z">
                                <input size="16" type="text" value="" readonly>
                                <span class="add-on"><i class="icon-remove"></i></span>
                                <span class="add-on"><i class="icon-th"></i></span>
                            </div>
                            {!!
                            Form::text(
                            'start',
                            null ,
                            [
                            'class' => 'hidden' ,
                            'id' => 'start' ,
                            'placeholder' => 'start' ,
                            "readonly"
                            ]
                            )
                            !!}

                        </div>
                        <div class="form-group">

                            <div class="input-append date end_datetime" data-date="2017-01-01T15:25:00Z">
                                <input size="16" type="text" value="" readonly>
                                <span class="add-on"><i class="icon-remove"></i></span>
                                <span class="add-on"><i class="icon-th"></i></span>
                            </div>

                            {!!
                            Form::text(
                            'end',
                            null ,
                            [
                            'class' => 'hidden' ,
                            'id' => 'end' ,
                            'placeholder' => 'end' ,
                            "readonly"
                            ]
                            )
                            !!}
                        </div>


                    </div>
                    <div class="col-md-7">
                        <div class="form-group">

                            {!!
                            Form::textarea(
                            'resume',
                            null ,
                            [
                            'class' => '' ,
                            'placeholder' => 'Résumé'
                            ]
                            )
                            !!}

                        </div>
                        <div class="form-group">

                            {!!
                            Form::textarea(
                            'content',
                            null ,
                            [
                            'class' => '' ,
                            'placeholder' => 'Description'
                            ]
                            )
                            !!}
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">
            Enregister
        </button>


    </div>

</div>





{!!
    Form::close()
!!}