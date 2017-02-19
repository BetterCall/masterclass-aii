<?php
/**
 * Created by IntelliJ IDEA.
 * User: CREAMANTA
 * Date: 02/01/2017
 * Time: 16:05
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{!!csrf_token() !!}"></meta>
    <title>Band Camp</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{url('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <link href="{{ url('/css/front.css') }}" rel="stylesheet">
    <link href="{{ url('/css/particles.css') }}" rel="stylesheet">
    <link href="{{ url('/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ url('/css/bootstrap-datetimepicker.css') }}" rel="stylesheet">


    <style>

        .p-y-2 {
            padding-top: 28px;
            padding-bottom: 28px;
        }
        .p-y-3 {
            padding-top: 45px;
            padding-bottom: 45px;
        }
        .m-b-1 {
            margin-bottom: 18px;
        }
        .m-t-1 {
            margin-top: 18px;
        }


        .main_counter_area .main_counter_content .single_counter{
            #background: rgba(236, 72, 72, 0.5);
            color: #fff;
        }
        .main_counter_area .main_counter_content .single_counter i{
            font-size:36px;
        }


        .clockdiv{
            font-family: sans-serif;
            color: #fff;
            display: inline-block;
            font-weight: 100;
            text-align: center;
            font-size: 30px;
        }

        .clockdiv > div{
            padding: 10px;
            border-radius: 3px;
            #background: #00BF96;
            display: inline-block;
        }

        .clockdiv div > span{
            padding: 15px;
            border-radius: 3px;
            #background: ;
            display: inline-block;
        }

        .smalltext{
            padding-top: 5px;
            font-size: 16px;
        }
    </style>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body id="app-layout">

<div id="particles-js">

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">

                <!-- NAV MENU ADMIN -->
                @if(!Auth::guest())
                    @if(Auth::user()->role == 'admin' )

                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/masterclass') }}">stages</a></li>
                    </ul>

                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/user') }}">user</a></li>
                    </ul>

                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/instrument') }}">instuments</a></li>
                    </ul>

                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/theme') }}">themes</a></li>
                    </ul>

                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/concert') }}">concert</a></li>
                    </ul>

                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/post') }}">post</a></li>
                    </ul>

                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/subscription') }}">demande</a></li>
                    </ul>


                    @endif
                @endif
                <!-- END NAV MENU ADMIN -->

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{action('UsersController@show' ,Auth::user() )}}">Mon profil</a></li>
                                <li><a href="{{ route('editAccount') }}">Parametre</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

        @yield('content')


    <!-- JavaScripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"> </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <script src="{{ url('/js/bootstrap-datepicker.min.js')}}"></script>

    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="{{ url('/js/laravel.js') }}"></script>


    <script src="{{ url('/js/backstretch.min.js') }}" ></script>
    <script src="{{ url('/js/particles.js') }}" ></script>
    <script src="{{ url('/js/select2.full.min.js') }}" ></script>
    <script src="{{ url('/js/bootstrap-datetimepicker.js') }}" ></script>
    <script src="{{ url('/js/jquery.animateNumber.js') }}" ></script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>



    <script>

        function endTimer(id , message) {

            var clock = document.getElementById(id);
            console.log(id) ;
            console.log(clock)
            clock.innerHTML = message ;


        }


        function getTimeRemaining(endtime) {
            var t = Date.parse(endtime) - Date.parse(new Date());

            var seconds = Math.floor((t / 1000) % 60);
            var minutes = Math.floor((t / 1000 / 60) % 60);
            var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
            var days = Math.floor(t / (1000 * 60 * 60 * 24));
            return {
                'total': t,
                'days': days,
                'hours': hours,
                'minutes': minutes,
                'seconds': seconds
            };
        }

        function initializeClock(id, endtime) {
            var clock = document.getElementById(id);
            var daysSpan = clock.querySelector('.days');
            var hoursSpan = clock.querySelector('.hours');
            var minutesSpan = clock.querySelector('.minutes');
            var secondsSpan = clock.querySelector('.seconds');

            function updateClock() {
                var t = getTimeRemaining(endtime);

                //Si la delai est depassé on stop le setInterval et on affiche un message a la place du decompte
                if (t.total < 0 ) {
                    clearInterval(timeinterval) ;
                    return endTimer(id , "<h3>Delai depassé</h3>") ;
                }
                console.log('t = ' + t.total )  ;

                daysSpan.innerHTML = t.days;
                hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

                if (t.total <= 0) {
                    clearInterval(timeinterval);
                }
            }

            updateClock();
            var timeinterval = setInterval(updateClock, 1000);
        }

        var deadline2 = new Date($('#date').val()) ;

        var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
        //initializeClock('clockdiv', deadline);

        console.log(deadline)
        console.log(deadline2)


        //particules
        particlesJS.load('particles-js', "{{ url('/assets/particles.json') }}" , function() {
            console.log('callback - particles.js config loaded');
        });


        //select2
        $('select[multiple]').select2() ;


    </script>

    @yield('script')

</div>

</body>
</html>
