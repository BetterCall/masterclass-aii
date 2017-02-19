<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 07/02/2017
 * Time: 10:50
 */
?>


{!!
    Form::Model(
        $concert,
        [
            'url' => action("ConcertsController@$action" ,$concert),
            'method' => $action == "store" ? "Post" : "PUT" ,
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

<!-- Text input-->
<div class="form-group">
    <div class="col-md-6 col-md-offset-3">
        {!!
        Form::text(
        'name',
        null ,
        [
        'class' => 'input-md' ,
        'placeholder' => 'Nom du concert'
        ]
        )
        !!}


    </div>
</div>

<!-- Text input-->
<div class="form-group">
    <div class="col-md-6 col-md-offset-3">
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

    </div>

    <button type="submit" class="btn btn-primary">
        Enregister
    </button>
</div>




{!!
    Form::close()
!!}