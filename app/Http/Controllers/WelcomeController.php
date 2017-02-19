<?php

namespace App\Http\Controllers;

use App\Concert;
use App\Masterclass;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class WelcomeController extends Controller
{
    public function index() {

        $profs = User::Prof() ;
        $fProf = $profs->first() ;

        //$masterclass = Masterclass::all() ;
        $masterclass = Masterclass::latest(1)->get()->first();

        $concerts = Concert::latest(3)->get() ;

        return view("welcome" , compact("profs", "fProf" , "masterclass" , 'concerts'));
    }
}
