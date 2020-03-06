<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prevadzka extends Model
{
   protected $table = 'prevadzka';
   protected $primaryKey = 'oznacenie';
   protected $fillable = ["nazov", "mesto", "ulica", "cislo_domu", "psc", "koniec_objednavok", "uzv_objednavok", "obrazok"];
   public $timestamps = false;

    public function stalaponuka(){
        return $this->hasOne('\App\StalaPonuka', 'oznacenie', 'oznacenie');
    }

    public function dennemenu(){
        return $this->hasOne('\App\DenneMenu', 'oznacenie', 'oznacenie');
    }

}
