<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Course extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'course_name',
        'course_duration',
        'course_fee',
        'intake',
        'university_id',
      
    ];
    public function universities()
    {
         return $this->belongsTo(University::class,'university_id');
    }

    public function programs()
    {
         return $this->belongsTo(Program::class,'program_id');
    }



    public function scholarships()
    {
         return $this->belongsToMany(Scholarship::class);
    }
    public function users()
    {
         return $this->belongsTo(User::class,'user_id');
    }
}
