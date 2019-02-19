<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        
        'post_name',
        'post_img',
        'description',
        'category_id',
    ];
    public function categories()
    {
         return $this->belongsTo(Category::class,'category_id');
    }
    public function users()
    {
         return $this->belongsTo(User::class,'user_id');
    }
}
