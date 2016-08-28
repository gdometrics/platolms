<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'modules';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id', 'title', 'sub_title',
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
