<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'pd_id';
    protected $fillable = [
            'pd_name',
            'pd_count',
            'pdt_id',

    ];
    public function stockin()
    {
        return $this->hasMany('App\Stockin','pd_id');
    }
    public function stockout()
    {
        return $this->hasMany('App\Stockout','pd_id');
    }
    public function typeproduct()
    {
        return $this->belongsTo('App\Typeproduct','pdt_id');
    }

}
