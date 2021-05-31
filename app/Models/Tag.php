<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded  = [];
    
    public function blogs() {

        return $this->belongsToMany('App\Models\Blog');
        
    }
}
