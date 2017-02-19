<?php

namespace App\Http\Controllers;

use App\Music;
use Illuminate\Http\Request;

use App\Http\Requests;

class MusicsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $musics = Music::all() ;
        return view('music.index' , compact("musics")) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $music = new Music();
        return view('music.create', compact('music'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Music::create($request->only('name', 'artist' , 'album'));
        return redirect(action('MusicsController@index'))->with('success', 'L\'espèce a bien été créée');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $music = Music::findOrFail($id);
        return view('music.edit', compact('music'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, SpeciesRequest $request)
    {
        $music = Music::findOrFail($id);
        $music->update($request->only('name', 'album' , 'artist'));
        return redirect(action('MusicsController@index'))->with('success', 'L\'espèce a bien été modifiée');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $music = Music::findOrFail($id);
        $music->delete();
        return redirect(action('MusicsController@index'))->with('success', 'L\'espèce a bien été supprimé');
    }
}
