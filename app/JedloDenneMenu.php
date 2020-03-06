<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class JedloDenneMenu extends Model
{
    #public $incrementing = false;
    protected $table = 'denna_ponuka_jedlo';
    protected $fillable = ["id_denna_ponuka", "id_jedlo"];
    public $timestamps = false;
    #protected $primaryKey = ["id_denna_ponuka","id_jedlo"];

    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('id_denna_ponuka', '=', $this->getAttribute('id_denna_ponuka'))
            ->where('id_jedlo', '=', $this->getAttribute('id_jedlo'));
        return $query;
    }

    public function dennaponuka(){
        return $this->belongsTo('\App\DenneMenu', 'id_denna_ponuka', 'id_denna_ponuka');
    }

    public function jedlo(){
        return $this->belongsTo('\App\Jedlo', 'id_jedlo', 'id_jedlo');
    }
}
