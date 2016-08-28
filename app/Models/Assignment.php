<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'assignments';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id', 'lesson_id', 'assignment_type', 'title', 'content', 'weight', 'due',
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
