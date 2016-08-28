<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pages';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'layout_id', 'title', 'sub_title', 'content', 'img', 'video',
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
