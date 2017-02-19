<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 06/02/2017
 * Time: 19:05
 */
?>
{!!
    Form::model(
        $post,
        [
            'files' => true,
            'url' => action("PostsController@$action", $post),
            'method' => $action == "store" ? "Post" : "Put"
        ]
    )
!!}


<div class="row">

    <!-- Text input-->
    <div class="form-group">
        <div class="col-md-12">
            {!!
            Form::text(
            'name',
            null,
            [
            'class' => 'input-lg' ,
            'placeholder' => 'Nom'
            ]
            )
            !!}

        </div>
    </div>

</div>



<div class="form-group">

</div>

<div class="form-group">
    {!!
        Form::file(
            'image',
            [
                'class' => ''
            ]
        )
    !!}
</div>



<div class="form-group">
    {!!
        Form::textarea(
            'content',
            null,
            [
                'class' => '' ,
                'placeholder' => 'Description'
            ]
        )
    !!}
</div>

{!!
    Form::select(
        'masterclass_id',
        App\Masterclass::all()->lists('name' , 'id') ->toArray()  ,
        [
            'id' => "" ,
            'class' => '' ,
            'placeholder' => ''
        ]
    )
!!}

{!!
    Form::select(
        'users_id[]',
        App\User::all()->lists('name', 'id')->toArray(),
        null,
        [
            'class' => '',
            'multiple'
        ]
    )
!!}
<div class="form-group">

<button type="submit" class="btn btn-primary">Valider</button>

</div>
{!!
    Form::close()
!!}

