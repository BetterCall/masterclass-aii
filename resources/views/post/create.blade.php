@extends('layouts.app')

@section('content')
<!-- SLIDER -->
<section id="home" STYLE="min-height: 200px">
    <div id="main-slider" class="text-center" style="margin: auto" >
        <div class="row">
            <h2>Ajout d'une image</h2>
        </div>

    </div>
</section>
<!-- END SLIDER -->



<!-- CONTACT -->
<section id="contact">

    <div class="contact-section">
        <div class="ear-piece">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-4">


                    <div id="contact-section">
                        @include('post.form' , ['action' => 'store'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CONTACT -->


@endsection