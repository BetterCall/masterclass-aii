<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 07/02/2017
 * Time: 21:55
 */
?>
{!! Form::model(
$music,
[
'url' => action("MusicsController@$action", $music),
'method' => $action == "store" ? "Post" : "Put"
]) !!}

<div class="">
    {!!
        Form::text(
            'name',
            null,
            [
                'class' => ''
            ]
        )
    !!}
</div>

<div class="">
    {!!
        Form::text(
            'artist',
            null,
            [
                'class' => ''
            ]
        )
    !!}
</div>

<div class="">
    {!!
        Form::text(
            'album',
            null,
            [
                'class' => ''
            ]
        )
    !!}
</div>

<div class="">
    <button type="submit" class="btn btn-primary">
        Sauvegarder
    </button>
</div>

{!! Form::close() !!}
