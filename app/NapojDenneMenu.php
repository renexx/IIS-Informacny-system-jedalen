<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class NapojDenneMenu extends Model
{
    protected $table = 'denna_ponuka_napoj';
    protected $fillable = ["id_denna_ponuka", "id_napoj"];
    public $timestamps = false;
    #protected $primaryKey = ["id_denna_ponuka","id_napoj"];

    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('id_denna_ponuka', '=', $this->getAttribute('id_denna_ponuka'))
            ->where('id_napoj', '=', $this->getAttribute('id_napoj'));
        return $query;
    }
}
