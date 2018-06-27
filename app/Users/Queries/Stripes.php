<?php

namespace App\Users\Queries;

use Stripe\Stripe;
use Laravel\Cashier\Cashier;
use Illuminate\Http\Request;

trait Stripes
{
	/**
	* Get a list of the resource
	*
	* @param \Illuminate\Http\Request $request
	* @return Collection
	*/
	public function list(Request $request)
	{
		return $this->paginate( $request->amount?? 10 );
	}

	/**
	* Get a resource to show. 
	* Assume route model binding.
	*
	* @return Model
	*/
	public function show()
	{
		return $this;
	}

	/**
	* Get a resource to edit. 
	* Assume route model binding.
	*
	* @return Model
	*/
	public function edit()
	{
		return $this;
	}

	/**
	* Create and insert a resource. 
	*
	* @param \Illuminate\Http\Request $request
	* @return Model
	*/
	public function store(Request $request)
	{
		$request->validate([
			'amount' => 'required|numeric',
			'currency' => 'required',
			'interval' => 'required',
			'nickname' => 'required|unique:stripes,nickname',
			'publish_at' => 'required|date',
			'expires_at' => 'date',
			'attributes' => 'required',
		]);

		dd( $this->submitPlan( $request ) );

		return $this->create( $request->all() );
	}

	/**
	* Update and insert a resource. 
	* Assume route model binding.
	*
	* @param \Illuminate\Http\Request $request
	* @return Model
	*/
	public function renew(Request $request)
	{
		$this->update( $request->all() );
	}

	/**
	* Remove a resource.
	* Assume route model binding. 
	*
	* @return boolean
	*/
	public function remove()
	{
		return $this->delete();
	}

	/**
	* Submit plan to stripe
	*
	* @param \Illuminate\Http\Request $request
	* @return \Stripe\Stripe json object
	*/
	private function submitPlan(Request $request)
	{
		Stripe::setApiKey( config('services.stripe.key') );

		return Stripe::plan([
			'id' => str_slug( $request->nickname ),
			'amount' => $request->amount,
			'product' => 'service',
			'interval' => $request->interval,
			'currency' => $request->currency,
		]);
	}

	private function setData()
	{
		return [
			'stripe_id' =>
		]
	}
}