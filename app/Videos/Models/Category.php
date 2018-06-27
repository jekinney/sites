<?php

namespace App\Videos\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     /**
	* Database table
	*
	* @var string
	*/
	protected $table = 'video_categories';
	
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
    * Get the owning videos
    */
    public function videos()
    {
    	return $this->belongsToMany( Video::class );
    }
}
