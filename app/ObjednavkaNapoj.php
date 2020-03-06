<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ObjednavkaNapoj extends Model
{
    protected $table = 'objednavka_napoj';
    // protected $primaryKey = 'id_objednavka';

    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('id_objednavka', '=', $this->getAttribute('id_objednavka'))
            ->where('id_napoj', '=', $this->getAttribute('id_napoj'));
        return $query;
    }


    //protected $fillable = ["stav", "mesto", "ulica", "cislo_domu", "psc", "poznamka", 'id', "id_vodic", "oznacenie"];
    public $timestamps = false;
}
