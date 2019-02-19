<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Program extends Model
{
    
    public function courses()
    {
         return $this->hasMany(Course::class);
    }
}
