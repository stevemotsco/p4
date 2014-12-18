<?php

class ServiceController extends \BaseController {

	public function __construct() {
		# Make sure BaseController construct gets called
		parent::__construct();
    } 

	/**
	* Show form with listing of the services available.
	* @return View
	*/
	public function getIndex()
	{
		
		$services = Service::all();
		return View::make('service_index')
			->with('services', $services);
	}
}