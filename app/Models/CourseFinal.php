<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseFinal extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'finals';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id', 'title', 'due', 'possible',
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
