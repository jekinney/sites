<?php

namespace App;

use Illuminate\Http\Request;

trait Default 
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
}