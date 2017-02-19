<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 05/02/2017
 * Time: 17:35
 */
?>

<div class="col-md-6 col-md-offset-3">

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-12">

        <div class="">
            {!!
            Form::Model(
            $instrument,
            [
            'url' => action("InstrumentsController@$action", $instrument),
            'method' => $action =="store" ? "Post" : "PUT" ,
            'class' => 'large' ,
            'files' => 'true'
            ]
            )
            !!}


            {!!
            Form::text(
            'name',
            null ,
            [
            'id' => "" ,
            'class' => '' ,
            'placeholder' => "Nom de l'instrument" ,
            ]
            )
            !!}

            @if( $instrument->avatar )

            <img src="{{ url($instrument->avatar) }}"  class="img-responsive" alt="Image de {{ $instrument->name}}"/>

            @endif

            <button type="submit" class="btn btn-primay">
                enregistrer
            </button>

            {!!
                Form::close()
            !!}


        </div>
    </div>


</div>





