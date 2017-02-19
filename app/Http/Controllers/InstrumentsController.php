<?php

namespace App\Http\Controllers;

use App\Instrument;
use Illuminate\Http\Request;

use App\Http\Requests;

class InstrumentsController extends Controller
{
    public function index() {
        $instruments = Instrument::all() ;
        return view('instrument.index', compact('instruments')) ;
    }

    public function create() {
        $instrument = new Instrument() ;
        return view("instrument.create" , compact("instrument")) ;
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store(Request $request)
    {
        $data = $request->all();
        Instrument::create($data);
        return redirect(action('InstrumentsController@index'))->with('success', 'L\'instrument a bien été créée');
    }


    public function show($id){
        $instrument = Instrument::findOrFail($id) ;
        return view('instrument.show' , compact('instrument')) ;
    }

    public function edit($id) {
        $instrument = Instrument::findOrFail($id) ;
        return view('instrument.edit' , compact('instrument')) ;

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, Request $request)
    {
        $music = Instrument::findOrFail($id);
        $music->update($request->only('name'));
        return redirect(action('InstrumentsController@index'))->with('success', 'L\'espèce a bien été modifiée');
    }

}
