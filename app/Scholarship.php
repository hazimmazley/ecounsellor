<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Scholarship extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'scholarship_name',
        'date',
        'company_id',
    ];

    public function companies()
    {
         return $this->belongsTo(Company::class,'company_id');
    }


    public function courses()
    {
         return $this->belongsToMany(Course::class);
    }
}
