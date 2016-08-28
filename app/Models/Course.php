<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'courses';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'revision_id', 'title', 'sub_title', 'img',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];

}
