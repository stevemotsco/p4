<?php

class EventController extends \BaseController {

	public function __construct() {
		# Make sure BaseController construct gets called
		parent::__construct();
		# Only logged in users are allowed here
		$this->beforeFilter('auth');
    } 

	    /**
	 * Display a listing of the events.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		$events = $user->events;

		if($events){
			return View::make('event_index')
				->with('events', $events);
		} else {
			return Redirect::to('/event/create')->with('flash_message', "Sorry, you don't have any events scheduled.  Would you like to add one?");
		}
	}

	/**
	 * Show the form for creating a new event.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
		return View::make('event_add', ['service_list' => Service::lists('servname','id')]);
	}

	/**
	 * Process a newly created event.
	 *
	 * @return Redirect
	 */
	public function postCreate()
	{
		# Step 1) Define the rules
        $rules = array(
            'event_date' => array('required', 'date', 'regex:/^(([0][0-9])|([1][0-2]))[\/](([0-2][0-9])|([3][0-1]))[\/]([2][0][0-2][0-9])$/'),
            'participants' => 'required|regex:/^(([0][0-9])|([1][0-2]))$/')
        );
		# Step 2)
		$validator = Validator::make(Input::all(), $rules);
		# Step 3
		if($validator->fails()) {
		    return Redirect::to('/event/create')
		        ->with('flash_message', 'Add an event failed; please fix the errors listed below.')
		        ->withInput()
		        ->withErrors($validator);
		}

	    $event = new Event();

	    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
	    $breed = filter_var($_POST["breed"], FILTER_SANITIZE_STRING);
	    $event_date = filter_var($_POST["event_date"], FILTER_SANITIZE_STRING);
	    $participants = filter_var($_POST["participants"], FILTER_SANITIZE_STRING);
	    $vet = filter_var($_POST["vet"], FILTER_SANITIZE_NUMBER_INT);

	    $pet->name = $name;
	    $pet->breed = $breed;
	    $pet->sex = $sex;
	    $pet->birthday = Pet::saveDateFmt($birthday);

	    $user = Auth::user();
	    $veterinarian = Vet::where('id', '=', $vet)->first();

	    $pet->user()->associate($user);
	    $pet->vet()->associate($veterinarian);

	    $pet->save();

	    Pet::saveVaccine($pet, filter_var($_POST["rabies"], FILTER_SANITIZE_STRING), 'Rabies');
    	Pet::saveVaccine($pet, filter_var($_POST["bordetella"], FILTER_SANITIZE_STRING), 'Bordetella');
    	Pet::saveVaccine($pet, filter_var($_POST["parvo"], FILTER_SANITIZE_STRING), 'Parvo');
    	Pet::saveVaccine($pet, filter_var($_POST["heartworm"], FILTER_SANITIZE_STRING), 'Heartworm Test');
    	Pet::saveVaccine($pet, filter_var($_POST["distemper"], FILTER_SANITIZE_STRING), 'Distemper');
    	Pet::saveVaccine($pet, filter_var($_POST["flea"], FILTER_SANITIZE_STRING), 'Flea Prevention');

        return Redirect::to('/')->with('confirm_message', 'Your New Pet has been saved!');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		try {
		    $pet    = Pet::findOrFail($id);
		}
		catch(exception $e) {
		    return Redirect::to('/pet')
		    	->with('flash_message', $e->getMessage());
		}

		return View::make('event_edit', ['service_list' => Service::lists('servname','id')])->with('pet', $pet);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = Pet::makeRules();   

		$messages = Pet::makeMsgs();

		$validator = Validator::make(Input::all(), $rules, $messages);

		if($validator->fails()) {

		    return Redirect::to('/pet/'.$id.'/edit')
		        ->with('flash_message', 'Edit pet failed; please fix the errors listed below.')
		        ->withInput()
		        ->withErrors($validator);
		}

		try {
	        $pet = Pet::findOrFail(Input::get('id'));
	    }
	    catch(exception $e) {
	        return Redirect::to('/pet')->with('flash_message', 'Error Editing Pet.');
	    }
	    
	    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
	    $breed = filter_var($_POST["breed"], FILTER_SANITIZE_STRING);
	    $birthday = filter_var($_POST["birthday"], FILTER_SANITIZE_STRING);
	    $sex = filter_var($_POST["sex"], FILTER_SANITIZE_STRING);
	    $vet = filter_var($_POST["vet"], FILTER_SANITIZE_NUMBER_INT);

	    $pet->name = $name;
	    $pet->breed = $breed;
	    $pet->sex = $sex;
	    $pet->birthday = Pet::saveDateFmt($birthday);

	    $veterinarian = Vet::where('id', '=', $vet)->first();

	    $pet->vet()->associate($veterinarian);

	    $pet->save();

    	Pet::updateVaccine($pet, filter_var($_POST["rabies"], FILTER_SANITIZE_STRING), 'Rabies');
    	Pet::updateVaccine($pet, filter_var($_POST["bordetella"], FILTER_SANITIZE_STRING), 'Bordetella');
    	Pet::updateVaccine($pet, filter_var($_POST["parvo"], FILTER_SANITIZE_STRING), 'Parvo');
    	Pet::updateVaccine($pet, filter_var($_POST["heartworm"], FILTER_SANITIZE_STRING), 'Heartworm Test');
    	Pet::updateVaccine($pet, filter_var($_POST["distemper"], FILTER_SANITIZE_STRING), 'Distemper');
    	Pet::updateVaccine($pet, filter_var($_POST["flea"], FILTER_SANITIZE_STRING), 'Flea Prevention');

	   	return Redirect::to('/pet')->with('confirm_message','Your changes have been saved.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		try {
			$pet = Pet::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/pet')->with('flash_message', 'Pet not found');
		}
		# Note there's a `deleting` Model event which makes sure book_tag entries are also destroyed
		# See Tag.php for more details
		try{
			Pet::destroy($id);
		}
		catch(Exception $e) {
			return Redirect::to('/pet')->with('flash_message', 'Error deleting pet');
		}

		return Redirect::to('/')->with('confirm_message','This pet has been deleted.');
	}
}
