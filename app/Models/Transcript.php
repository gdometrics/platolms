<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transcript extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'transcript';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'course_id', 'grade', 'completion_date',
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
