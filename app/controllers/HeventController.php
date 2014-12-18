<?php

class HeventController extends \BaseController {

	public function __construct() {
		# Make sure BaseController construct gets called
		parent::__construct();
		# Only logged in users are allowed here
		$this->beforeFilter('auth');
    } 

	    /**
	 * Show form with listing of the events for the user.
	 * @return View
	 */
	public function getIndex()
	{
		$user = Auth::user();
		$hevents = $user->hevents;

		if($hevents){
			return View::make('event_index')
				->with('hevents', $hevents);
		} else {
			return Redirect::to('/event/add')->with('flash_message', "No events scheduled.  Would you like to add one?");
		}
	}

	/**
	 * Show form for creating a new event.
	 * @return View
	 */
	public function getCreate()
	{
		return View::make('event_add', ['service_list' => Service::lists('servname','id')]);

		/*'servdesc''cost_unit''unit'
		# Get all the services (used in the author drop down)
		$services = Service::getIdNamePair();
    	return View::make('book_add')
    		->with('authors',$authors)
    		->with('tags',$tags);
    	*/	
	}

	/**
	 * Process newly created event.
	 * @return Redirect
	 */
	public function postCreate()
	{
		# Step 1) Define the rules
		$rules = Hevent::getRules(); 
		# Step 2) Validate
		$validator = Validator::make(Input::all(), $rules);
		# Step 3) Redirect if validation fails
		if($validator->fails()) {
		    return Redirect::to('/event/add')
		        ->with('flash_message', 'Add an event failed.  Fix error(s) listed below.')
		        ->withInput()
		        ->withErrors($validator);
		}

	    #$event_date = filter_var(Input::get('event_date'), FILTER_SANITIZE_STRING);
	    #$participants = filter_var(Input::get('participants'), FILTER_SANITIZE_NUMBER_INT);
	    #$units = filter_var(Input::get('units'), FILTER_SANITIZE_NUMBER_INT);
		#$user = Auth::user();
	    $serv_type = Service::where('id', '=', $service)->first();

	    $hevent = new Hevent();
		$hevent->event_date = Hevent::dbDate(filter_var(Input::get('event_date'), FILTER_SANITIZE_STRING));
	    $hevent->participants = filter_var(Input::get('participants'), FILTER_SANITIZE_NUMBER_INT);
		$hevent->units = filter_var(Input::get('units'), FILTER_SANITIZE_NUMBER_INT);
		$hevent->user()->associate(Auth::user());
		$hevent->service()->associate($serv_type);
	    $hevent->save();
 
  		return Redirect::to('/event')->with('flash_message', 'New event added.');
	}

	/**
	 * Show form for editing an event.
	 * @return View
	 */
	public function getEdit($id)
	{
		#	return View::make('event_add', ['service_list' => Service::lists('servname','id')]);
		#	# Get all the services (used in the author drop down)
		#	$services = Service::getIdNamePair();
		try {
		    $hevent = Hevent::findOrFail($id);
		}
		catch(exception $e) {
		    return Redirect::to('/event')
		    	->with('flash_message', 'Event not found.');
		}
		return View::make('event_edit', ['service_list' => Service::lists('servname','id')])->with('hevent', $hevent);
	}

	/**
	 * Process edited event.
	 * @return Redirect
	 */
	public function postEdit($id)
	{
		# Step 1) Define the rules
		$rules = Hevent::getRules(); 
		# Step 2) Validate
		$validator = Validator::make(Input::all(), $rules);
		# Step 3) Redirect if validation fails	
		if($validator->fails()) {
		    return Redirect::to('/event/'.$id.'/edit')
		        ->with('flash_message', 'Event update failed.  Fix error(s) listed below.')
		        ->withInput()
		        ->withErrors($validator);
		}

		try {
	        $hevent = Hevent::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/event')->with('flash_message', 'Error while updating event.');
	    }
	    
	    #$event_date = filter_var(Input::get('event_date'), FILTER_SANITIZE_STRING);
	    #$participants = filter_var(Input::get('participants'), FILTER_SANITIZE_NUMBER_INT);
	    #$units = filter_var(Input::get('units'), FILTER_SANITIZE_NUMBER_INT);
		#$user = Auth::user();
	    $serv_type = Service::where('id', '=', $service)->first();

	    $event = new Hevent();
		$event->event_date = Hevent::dbDate(filter_var(Input::get('event_date'), FILTER_SANITIZE_STRING));
	    $event->participants = filter_var(Input::get('participants'), FILTER_SANITIZE_NUMBER_INT);
		$event->units = filter_var(Input::get('units'), FILTER_SANITIZE_NUMBER_INT);
		$event->user()->associate(Auth::user());
		$event->service()->associate($serv_type);
	    $event->save();

	   	return Redirect::to('/pet')->with('flash_message','Event updated.');
	}

	/**
	 * Deelete event.
	 * @return Redirect
	 */
	public function destroy($id)
	{
		try {
			$hevent = Hevent::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/event')->with('flash_message', 'Event not found');
		}

		try{
			Hevent::destroy($id);
		}
		catch(Exception $e) {
			return Redirect::to('/event')->with('flash_message', 'Error while deleting event.');
		}

		return Redirect::to('/event')->with('flash_message','Event deleted.');
	}

}