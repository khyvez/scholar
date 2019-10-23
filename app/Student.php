<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $guarded = [];

    public function relatives(){
        return $this->hasMany(Relative::class);
    }
    public function address(){
        return $this->hasOne(Address::class);
        
    }
    public function educations(){
        return $this->hasMany(Education::class);
    
    }
}
