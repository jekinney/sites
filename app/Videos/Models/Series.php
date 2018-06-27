<?php

namespace App\Videos\Models;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    /**
	* Database table
	*
	* @var string
	*/
	protected $table = 'video_series';
	
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
