<?php

namespace App\Http\Controllers;

use App\Concert;
use App\Cours;
use App\Masterclass;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Http\Request;

use App\Http\Requests;

class MasterclassController extends Controller
{

    public function createCours($id) {

        $cours = new Cours() ;
        $masterclass_id = $id ;
        return view('cours.create' , compact('cours', 'masterclass_id')) ;
    }

    public function createConcert($id) {

        $concert = new Concert() ;
        $masterclass_id = $id ;
        return view('concert.create' , compact('concert', 'masterclass_id')) ;
    }


    public
    /**
    * Affiche la liste de toutes les masterclass
    *
    * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    function index() {
        $masterclass = Masterclass::all();
        return view('masterclass.index' , compact('masterclass')) ;
    }


    public
    /**
    * Affiche la vue pour une masterclass
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    function show($id)
    {
        $masterclass = Masterclass::findOrFail($id) ;
        //$days = $masterclass->cours()->get()->chunk(2);

        $cours = [] ;
        $cours = $masterclass->cours()->orderBy('start')->get() ;

        return view('masterclass.show' , compact('masterclass','cours'));
    }


    public function create() {

        $masterclass = new Masterclass() ;
        $masterclass->themes_id = 1 ;

        return view('masterclass.create' , compact('masterclass')) ;
    }

    public function store(Request $request) {

        $data = $request->all() ;
        $data['start'] .=":00" ;
        $data['end'] .=":00" ;

        Masterclass::create($data) ;

        $masterclass = Masterclass::all() ;

        return view('masterclass.index' , compact('masterclass')) ;

    }


    public function edit($id) {

        $masterclass = Masterclass::findOrFail($id) ;
        return view('masterclass.edit',compact('masterclass')) ;
    }

    public function update($id , Request $request ) {

        $data = $request->all() ;
        $data['start'] .=":00" ;
        $data['end'] .=":00" ;


        $masterclass = Masterclass::findOrFail($id) ;
        $masterclass->update($data) ;

        return redirect(action('MasterclassController@show' , $masterclass))->with('success' , 'la masterclass a bien ete modifiée' ) ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $masterclass = Masterclass::findOrFail($id);
        $masterclass->delete();
        return redirect(action('MasterclassController@index'))->with('success', 'La masterclass a bien ete supprimée');
    }

    public function subscribe($id, Guard $auth) {

        $masterclass = Masterclass::findOrFail($id) ;

        $user = $auth->user() ;

        if($masterclass->followedBy($user) ){
            $masterclass->subscribers()->detach($user->id) ;
            $message = 'Vous ne suivez plus l\'evenement '.$masterclass->name ;
        } else {
            $masterclass->subscribers()->attach($user->id) ;

            $message = 'Vous etes inscrit a l\'evenement '.$masterclass->name ;
        }

        return redirect()->back()->with('success',$message) ;

    }

}
