<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class University extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'university_name',
        'address',
        'description',
        'phoneno',
        'state_id',
      
    ];


    public function courses()
    {
         return $this->hasMany(Course::class);
    }
    public function users()
    {
         return $this->belongsTo(User::class,'user_id');
    }
}
