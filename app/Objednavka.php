<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Objednavka extends Model
{
    //

    protected $table = 'objednavka';
    protected $primaryKey = 'id_objednavka';
    protected $fillable = ["stav", "name", "lastname", "mesto", "ulica", "cislo_domu", "psc", "platba", "poznamka", 'id', "id_vodic", "oznacenie"];
    public $timestamps = false;
/*
    public function prevadzka(){
        return $this->belongsToMany('\App\Prevadzka', 'oznacenie', 'oznacenie');
    }
    public function stravnik(){
        return $this->belongsToMany('\App\User', 'id', 'id');
    }
    public function vodicObjednavka(){
        return $this->belongsToMany('\App\Prevádzka', 'id', 'id');
    }
    public function jedloObjednavka(){
        return ('\App\Jedlo','')*/

    public function menoPrevadzky($oznacenie){
        $meno = \App\Prevadzka::all()->where('oznacenie', $oznacenie);
        return $meno->first()->nazov;
    }

    public function polozka($id_objednavka){
        $polozka_id = \App\ObjednavkaJedlo::all()->where('id_objednavka', $id_objednavka)->first();
        if ($polozka_id != NULL){
            $polozka_id = $polozka_id->id_jedlo;
            $polozka = \App\Jedlo::all()->where('id_jedlo', $polozka_id)->first();
        }
        else{
            $polozka_id = \App\ObjednavkaNapoj::all()->where('id_objednavka', $id_objednavka)->first();
            if ($polozka_id != NULL){
                $polozka_id = $polozka_id->id_napoj;
                $polozka = \App\Napoj::all()->where('id_napoj', $polozka_id)->first();
            }
            else{
                $polozka = 0;
            }
        }
        return $polozka;
    }
}
