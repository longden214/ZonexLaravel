<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill_detail_atb extends Model
{
    protected $fillable=['bill_detail_id','attribute_value_id'];

    public function attribute_value()
    {
        return $this->hasOne(Attribute_value::class,'id','attribute_value_id');
    }

    public function bill_detail()
    {
        return $this->hasOne(Bill_detail::class,'id','bill_detail_id');
    }
}
