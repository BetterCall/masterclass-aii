@extends('layouts.app')

@section('content')
<!-- SLIDER -->
<section id="home" STYLE="min-height: 200px">
    <div id="main-slider" class="text-center" style="margin: auto" >
        <div class="row">
            <h2>création d'un stage</h2>
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
                        @include('masterclass.form' , ['action' => 'store'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END CONTACT -->


@endsection

@section('script')


<script>

    /**
     * Select stage's them
     */
    $('.changeTheme').on('click', function() {
        var themesIdValue = $('.active').attr("data-value") ;
        $('#themes_id').val(themesIdValue) ;

    }) ;

    /**
     * DateTimePicker
    */
    $(".start_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        linkField: "start",
        linkFormat: "yyyy-mm-dd hh:ii"
    });
    $(".end_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii",
        linkField: "end",
        linkFormat: "yyyy-mm-dd hh:ii"
    });
</script>

@endsection