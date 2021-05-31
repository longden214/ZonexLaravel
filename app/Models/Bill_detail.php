<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill_detail extends Model
{
    protected $fillable=['price','quantity','pro_id','bill_id'];

    public function bill()
    {
        return $this->hasOne(Bill::class,'id','bill_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class,'id','pro_id');
    }

    public function bill_detail_atb()
    {
        return $this->hasMany(Bill_detail_atb::class,'bill_detail_id','id');
    }
}
