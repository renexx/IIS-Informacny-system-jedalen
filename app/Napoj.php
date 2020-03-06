<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Napoj extends Model
{
    protected $table = 'napoj';
    protected $primaryKey = 'id_napoj';
    protected $fillable = ["popis", "typ", "cena", "dostunost", "objem", "kategoria", 'alko', "id_stala_ponuka", "obrazok"];
    public $timestamps = false;

    public function stalaponuka(){
        return $this->belongsTo('\App\StalaPonuka', 'id_stala_ponuka', 'id_stala_ponuka');
    }
}
