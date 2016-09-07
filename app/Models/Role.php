<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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

    /**
     * Get the role of the user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}
