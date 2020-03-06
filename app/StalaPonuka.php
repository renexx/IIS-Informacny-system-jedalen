<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StalaPonuka extends Model
{
    protected $table = 'stala_ponuka';
    protected $primaryKey = 'id_stala_ponuka';
    public $timestamps = false;

    public function prevadzka(){
        return $this->belongsTo('\App\Prevadzka', 'oznacenie', 'oznacenie');
    }

    public function jedlo(){
        return $this->hasMany('\App\Jedlo', 'id_stala_ponuka', 'id_stala_ponuka');
    }

    public function napoj(){
        return $this->hasMany('\App\Napoj', 'id_stala_ponuka', 'id_stala_ponuka');
    }

   /* class function show($id){
        $ponuka = \App\StalaPonuka::findorfail($id);

        return view('zakaznik.menu')->with('', $ponuka->)
}*/
}
