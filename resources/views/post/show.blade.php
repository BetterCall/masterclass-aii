<?php
/**
 * Created by IntelliJ IDEA.
 * User: Franck
 * Date: 08/02/2017
 * Time: 11:32
 */
?>

@extends('layouts.app')

@section('content')

<section>

    <img src="{{ url($post->getImagePath('large')) }}" class="img-responsive" alt="">

</section>

<section>
    present sur la <photo></photo>
    <div class="">
    @foreach($post->users as $user)

            <div class="">
                {{$user->name}}
            </div>

    @endforeach
    </div>

</section>

@endsection
