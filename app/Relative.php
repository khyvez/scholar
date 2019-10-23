<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    public function student(){
        return $this->belongsTo(Student::class);
    }
}
