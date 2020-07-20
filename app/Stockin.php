<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stockin extends Model
{
    protected $table = 'stockin';
    protected $primaryKey = 'stockin_id';
    protected $fillable = [
            'pd_id',
            'stockin_count',
            'stockin_price',
            'stockin_date',
            'usr_id',

    ];
    public function user()
    {
        return $this->belongsTo('App\User','usr_id');
    }
    public function product()
    {
        return $this->belongsTo('App\Product','pd_id');
    }
}
