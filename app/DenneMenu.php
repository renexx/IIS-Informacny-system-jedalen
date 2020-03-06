<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DenneMenu extends Model
{
    protected $table = 'denna_ponuka';
    protected $primaryKey = 'id_denna_ponuka';
    protected $fillable = ["interny_limit", "oznacenie"];
    public $timestamps = false;

    public function prevadzka(){
        return $this->belongsTo('\App\Prevadzka', 'oznacenie', 'oznacenie');
    }

    public function jedlodenne(){
        return $this->hasMany('\App\JedloDenneMenu', 'id_denna_ponuka', 'id_denna_ponuka');
    }


}
