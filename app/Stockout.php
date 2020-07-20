<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stockout extends Model
{
    protected $table = 'stockout';
    protected $primaryKey = 'stockout_id';
    protected $fillable = [
            'pd_id',
            'stockout_count',
            'stockout_price',
            'stockout_date',
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
