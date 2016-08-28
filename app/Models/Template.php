<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'templates';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'author_id', 'revision_id', 'name', 'slug', 'desc', 'filepath', 'price',
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
