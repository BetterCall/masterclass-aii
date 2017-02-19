<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 04/02/2017
 * Time: 16:38
 */
?>

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
        $user,
        [
            'url' => action("UsersController@$action"),
            'method' => $action =="store" ? "Post" : "PUT" ,
            'class' => 'form-horizontal',
            'files'  => 'true'
        ]
    )
!!}

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">
                    {{ $action =="store" ? "modification du profil de $user->name" : "Modifier mon profil" }}
                </h2>
            </div>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <div class="">
            {{ Form::file('avatar' , ['class' => 'form-control'] ) }}
        </div>
    </div>


    <!-- Text input-->
    <div class="form-group">
        <div class="">
            {{ Form::text('name' , null , ['class' => ''] ) }}
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
       <div class="">
            {{ Form::text('firstname' , null , ['class' => ''] ) }}
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <div class="">
            {{ Form::text('lastname' , null , ['class' => ''] ) }}
        </div>
    </div>

    <!-- Textarea -->
    <div class="form-group">
        <div class="col-md-4">
            {{ Form::textarea('resume' , null , ['class' => ''] ) }}
        </div>
    </div>



    {{ Form::textarea('content' , null , ['class' => ''] ) }}



    <button type="submit" >
        <svg version="1.1" class="send-icn" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100px" height="36px" viewBox="0 0 100 36" enable-background="new 0 0 100 36" xml:space="preserve">
            <path d="M100,0L100,0 M23.8,7.1L100,0L40.9,36l-4.7-7.5L22,34.8l-4-11L0,30.5L16.4,8.7l5.4,15L23,7L23.8,7.1z M16.8,20.4l-1.5-4.3
               l-5.1,6.7L16.8,20.4z M34.4,25.4l-8.1-13.1L25,29.6L34.4,25.4z M35.2,13.2l8.1,13.1L70,9.9L35.2,13.2z" />
        </svg>
    </button>

</div>


{!!
    Form::close()
!!}
