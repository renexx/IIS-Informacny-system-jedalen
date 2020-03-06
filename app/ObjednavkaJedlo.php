<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ObjednavkaJedlo extends Model
{
    protected $table = 'objednavka_jedlo';
   // protected $primaryKey = 'id_objednavka';

    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('id_objednavka', '=', $this->getAttribute('id_objednavka'))
            ->where('id_jedlo', '=', $this->getAttribute('id_jedlo'));
        return $query;
    }


    //protected $fillable = ["stav", "mesto", "ulica", "cislo_domu", "psc", "poznamka", 'id', "id_vodic", "oznacenie"];
    public $timestamps = false;
}
