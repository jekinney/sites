<?php

namespace App\Users\Models;

use App\Users\Queries\Stripes;
use Illuminate\Database\Eloquent\Model;

class Stripe extends Model
{
	use Stripes;
	
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function formatAmount()
    {
    	return '$'. number_format( $this->amount / 100, 2 );
    }
}
