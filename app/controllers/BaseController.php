<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 */
	public function __construct() {
		# Any submissions via POST need to pass the CSRF filter
		$this->beforeFilter('csrf', array('on' => 'post'));
		# PRODUCTION  
		View::share('baseURL', ''); 
   		# LOCAL  
  		#View::share('baseURL', '/p4/public');
	}
	/*protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}*/

}
