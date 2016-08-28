<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'semesters';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'semester_type',
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
