<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'receipts';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'course_id', 'description', 'amount',
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
