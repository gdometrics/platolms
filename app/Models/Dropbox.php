<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dropbox extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dropboxes';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lesson_id', 'assignment_id', 'user_id', 'message', 'filepath',
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
