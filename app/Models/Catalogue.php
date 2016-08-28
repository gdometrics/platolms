<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'catalogues';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'year_start', 'year_end',
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
