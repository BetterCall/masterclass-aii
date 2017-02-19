<?php

namespace App\Http\Controllers;

use App\Masterclass;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin' , ['only' => "edit"]);
    }

    public function index() {

        $users = User::all() ;

        return view('user.index' , compact("users")) ;

    }

    public function show($id) {

        $user = User::findOrFail($id) ;
        $subscriptions = array() ;

        foreach($user->subscriptions() as $r) {
            $subscriptions[] = array(
                'masterclass' => Masterclass::findOrFail($r->masterclass_id) ,
                'etat'        => $r->validate
            );
        }
        return view('user.show', compact('user' , 'subscriptions')) ;
    }

    /**
     * Edition d'un profil operation disponible que pour un administrateur
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id) {

        $user = User::findOrFail($id) ;
        return view('user.edit',compact('user')) ;
    }


    public function editAccount(Guard $auth) {
        $user = $auth->user() ;
        return view('user.edit' , compact('user')) ;
    }

    public function store(Request $request) {

        dd($request->all()) ;
        $user = User::findOrFail($id) ;

    }

    public function update(Request $request) {

        dd($request->only('id')) ;

    }

    public function updateTo($id) {

        $user = User::findOrFail($id) ;
        $user->prof = !$user->prof ;

        $user->save() ;

        $message  = "user mis a jour" ;

        return redirect()->back()->with('success',$message) ;
    }


}
