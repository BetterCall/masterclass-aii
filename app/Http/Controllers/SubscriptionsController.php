<?php

namespace App\Http\Controllers;

use App\Masterclass;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class SubscriptionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){

        $rows = array() ;
        $resp = Masterclass::pendingRegistration() ;

        foreach($resp as $r) {
            $rows[] = array(
                'masterclass' => Masterclass::findOrFail($r->masterclass_id) ,
                'user'        => User::findOrFail($r->user_id) ,
                'etat'        => $r->validate
            );
        }

        return view('subscription.index' , compact("rows")) ;
    }


    public function responseSubscription($masterclass_id , $user_id, $response ){

        Masterclass::responseRegistration($masterclass_id , $user_id , $response ) ;

        return redirect()->back()->with('success') ;

    }
}
