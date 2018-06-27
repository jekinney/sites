<?php

namespace App\Videos\Models;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
	/**
	* Database table
	*
	* @var string
	*/
	protected $table = 'video_stats';
	
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
    * Get the owning video
    */
    public function video()
    {
    	return $this->belongsTo( Video::class );
    }
}
