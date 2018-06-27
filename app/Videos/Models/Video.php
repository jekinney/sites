<?php

namespace App\Videos\Models;

use App\Videos\Queries\Videos;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use Videos;
    
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
    * Get the stats for a video
    */
    public function stats()
    {
    	return $this->belongsTo( Stat::class );
    }

    /**
    * Get all series attached to a video
    */
    public function series()
    {
    	return $this->belongsToMany( Series::class );
    }

    /**
    * Get all categories attached to a video
    */
    public function categories()
    {
    	return $this->belongsToMany( Category::class );
    }
}
