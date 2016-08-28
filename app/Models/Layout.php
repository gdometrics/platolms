<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model 
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'layouts';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'columns', 'sidebar_orientation', 'sidebar_side', 'sidebar_column', 'sidebar_break', 'column_one', 'column_two', 'column_three', 'column_four', 'header', 'footer',
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
