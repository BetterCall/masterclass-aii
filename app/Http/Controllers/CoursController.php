<?php

namespace App\Http\Controllers;

use App\Cours;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class CoursController extends Controller
{


    public function show($id) {

        $cours = Cours::findOrFail($id) ;
        return view('cours.show', compact('cours')) ;
    }

    public function create($id) {

    }


    public function store(Request $request) {

        $data = $request->all() ;
        $data['start'] .=":00" ;
        $data['end'] .=":00" ;

        $cours = Cours::create($data) ;

        return view('cours.show' , compact('cours')) ;
    }


}
