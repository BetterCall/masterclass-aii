<?php

namespace App;

use Illuminate\Support\Facades\DB;

class Music extends Model
{
    public $fillable = ["name", "artist", "album"] ;


    public function concerts() {
        return $this->belongsToMany('App\Concert') ;
    }

    // Permet de lier plusieurs user a un cours
    public function subscribers($id_music , $id_concert) {

        $id_concert_music = DB::table('concert_music')
            ->select('id')
            ->where('concert_id' , $id_concert)
            ->where('music_id' , $id_music)
            ->get() ;

        $resp = array() ;

        $req = DB::table('subscriptions_music')
            ->where('concert_music_id', $id_concert_music[0]->id)
            ->get();

        foreach($req as $key => $r) {
            $resp[$key]['user'] = User::findOrFail($r->user_id) ;
            $resp[$key]['instrument'] = Instrument::findOrFail($r->instrument_id);
        }
        return ($resp) ;
    }

    //verification d'une inscription
    public function followedBy($user) {
        return DB::table('subscriptions_music')
            ->where('user_id', $user->id)
            ->where('music_id',$this->id)
            ->count() ;
    }



}
