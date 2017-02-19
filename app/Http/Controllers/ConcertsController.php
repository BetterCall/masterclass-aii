<?php

namespace App\Http\Controllers;

use App\Concert;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class ConcertsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }



    public function index() {
        $concerts = Concert::all() ;

        return view('concert.index' , compact('concerts')) ;
    }

    public function show($id){

        $concert = Concert::findOrFail($id) ;
        return view('concert.show' , compact('concert')) ;

    }

    public function edit($id) {
        $concert = Concert::findOrFail($id) ;
        return view('concert.edit' , compact("concert")) ;
    }

    public function addMusic(Request $request) {

        $data =  $request->all() ;

        $concert = Concert::findOrFail($data['concert_id']) ;
        if(!$concert->have($data['music_id'])) {

            $concert->musics()->attach($data['music_id']) ;
        }

        return redirect()->back()->with('success' , '' ) ;

    }

    public function store(Request $request) {

        $data = $request->all() ;
        $data['start'] .= ":00" ;


        $concert = Concert::create($data) ;
        return view('concert.show' , compact('concert')) ;

    }

    public  function subscribe($concert_music_id , $user_id , $instrument_id) {
        echo "$concert_music_id , $user_id , $user_id";

        $req = DB::table('subscriptions_music')->insert([
            ['concert_music_id' =>$concert_music_id , 'user_id' => $user_id , "instrument_id" => $instrument_id ]
        ]);

        return redirect()->back()->with('success' , '' ) ;

    }
 }
