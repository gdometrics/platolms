<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'syllabi';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id', 'content', 'attachment',
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
