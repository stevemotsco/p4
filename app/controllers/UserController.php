<?php

class UserController extends BaseController {

	public function __construct() {
		# Make sure BaseController construct gets called
		parent::__construct();

        $this->beforeFilter('guest',
        	array('only' => array('getLogin','getSignup')));

        $this->beforeFilter('auth', 
            array('only' => array('anyLogout', 'show', 'edit', 'update', 'destroy')));    

    }

    /**  
    * GET: Show new user signup form 
    * @return View
    */
	public function getSignup() {
		return View::make('user_signup');
	}

	/**
	* POST: Process the new user signup
	* @return Redirect
	*/
	public function postSignup() {
		# Step 1) Define the rules
		$rules = array(
			# 'username' => 'required|between:5,125|unique:users,username',
			'email' => 'required|between:5,125|email|unique:users,email|confirmed',
			'email_confirmation' => 'required|between:5,125|email|unique:users,email',
			'password' => 'required|between:8,60|AlphaNum|confirmed',
			'password_confirmation'=> 'required|between:8,60|AlphaNum'
		);
		# Step 2)
		$validator = Validator::make(Input::all(), $rules);
		# Step 3
		if($validator->fails()) {
			return Redirect::to('/signup')
				->with('flash_message', '&nbsp;&nbsp;Sign up failed.  Please fix the errors listed below.')
				->withInput()
				->withErrors($validator);
		}

		$user = new User;
		$user->email    = Input::get('email');
		$user->password = Hash::make(Input::get('password'));

		try {
			$user->save();
		}
		catch (Exception $e) {
			return Redirect::to('/signup')
				->with('flash_message', '&nbsp;&nbsp;Sign up failed.  Please try again.')
				->withInput();
		}
		# Log in
		Auth::login($user);
		return Redirect::to('/')->with('flash_message', '&nbsp;&nbsp;Welcome to Sunshine Farms!');
	}

	/**
	* Show the login form
	* @return View
	*/
	public function getLogin() {
		return View::make('user_login');
	}

	/**
	* Process the login form
	* @return View
	*/
	public function postLogin() {
		$credentials = Input::only('email', 'password');
		# Hashing of password takes place in Auth::attempt 
		if (Auth::attempt($credentials, $remember = false)) {
			return Redirect::intended('/')->with('flash_message', '&nbsp;&nbsp;Welcome Back to Sunshine Farms!');
		}
		else {
			return Redirect::to('/login')
				->with('flash_message', '&nbsp;&nbsp;Log in failed.  Please try again.')
				->withInput();
		}
	}

	/**
	* Logout
	* @return Redirect
	*/
	public function getLogout() {
		# Log out
		Auth::logout();
		# Send user to  homepage
		return Redirect::to('/');
	}
}