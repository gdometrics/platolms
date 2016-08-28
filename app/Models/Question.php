<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'questions';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_type', 'title', 'content', 'choices', 'correct', 'success_message',
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
