<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 17/01/2017
 * Time: 14:26
 */
?>


{!!
    Form::Model(
        $masterclass,
        [
            'url' => action("MasterclassController@$action", $masterclass),
            'method' => $action =="store" ? "Post" : "PUT" ,
            'class' => ''
        ]
    )
!!}
<div class="row">
    <div class="col-md-8">

    </div>
    <div class="col-md-4">
        <h3 class="text-center" style="color: white">
            Theme
        </h3>

        <div id="theme-feed" class="carousel slide" data-interval="false">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="text-center carousel-inner center-block">

                        @foreach(App\Theme::all() as $theme )

                        <div class="item item{{ $theme->id }} {{ $theme->id == '1' ? 'active' : '' }}" data-value = "{{$theme->id }}">
                            <h4>{{ $theme->name }}</h4>
                        </div>
                        @endforeach
                    </div>

                    {!!
                        Form::text(
                            'themes_id',
                            null ,
                            [
                                'id' => "themes_id" ,
                                'class' => 'hidden' ,
                                'placeholder' => ''
                            ]
                        )
                    !!}

                    <a class="twitter-control-left changeTheme" href="#theme-feed" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="twitter-control-right changeTheme" href="#theme-feed" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="row">
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
                    'placeholder' => 'Nom du stage'
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

                <div class="form-group">

                    {!!
                        Form::text(
                            'price',
                            null ,
                            [
                                'class' => '' ,
                                'placeholder' => 'Prix'
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

    <button type="submit" >
        <svg version="1.1" class="send-icn" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="36px" viewBox="0 0 100 36" enable-background="new 0 0 100 36" xml:space="preserve">
            <path d="M100,0L100,0 M23.8,7.1L100,0L40.9,36l-4.7-7.5L22,34.8l-4-11L0,30.5L16.4,8.7l5.4,15L23,7L23.8,7.1z M16.8,20.4l-1.5-4.3
               l-5.1,6.7L16.8,20.4z M34.4,25.4l-8.1-13.1L25,29.6L34.4,25.4z M35.2,13.2l8.1,13.1L70,9.9L35.2,13.2z" />
        </svg>
    </button>


{!! Form::close() !!}
