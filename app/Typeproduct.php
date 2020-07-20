<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typeproduct extends Model
{
    protected $table = 'typeproduct';
    protected $primaryKey = 'pdt_id';
    protected $fillable = [
            'pdt_name',

    ];
    public function product()
    {
        return $this->hasMany('App\Product','pdt_id');
    }
}
