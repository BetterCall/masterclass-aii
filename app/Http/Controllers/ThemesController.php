<?php

namespace App\Http\Controllers;

use App\Theme;
use Illuminate\Http\Request;

use App\Http\Requests;

class ThemesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $themes = Theme::all() ;
        return view('theme.index' , compact("themes")) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $theme = new Theme();
        return view('theme.create', compact('theme'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        Theme::create($request->only('name'));
        return redirect(action('ThemesController@index'))->with('success', "");
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
        $theme = Theme::findOrFail($id);
        return view('theme.edit', compact('theme'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, SpeciesRequest $request)
    {
        $theme = Theme::findOrFail($id);
        $theme->update($request->only('name'));
        return redirect(action('ThemesController@index'))->with('success', '');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $theme = Theme::findOrFail($id);
        $theme->delete();
        return redirect(action('ThemesController@index'))->with('success', '');
    }
}
