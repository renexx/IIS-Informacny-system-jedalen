<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jedlo extends Model
{
    protected $table = 'jedlo';
    protected $primaryKey = 'id_jedlo';
    protected $fillable = ["popis", "typ", "cena", "dostunost", "hmotnost", "kategoria", "id_stala_ponuka", "obrazok"];
    public $timestamps = false;

    public function stalaponuka(){
        return $this->belongsTo('\App\StalaPonuka', 'id_stala_ponuka', 'id_stala_ponuka');
    }

    public function denna(){
        return $this->hasMany('\App\JedloDenneMenu', 'id_jedlo', 'id_jedlo');
    }
}
