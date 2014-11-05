<?php

use Kalgan\Forms\SignInForm;

class AuthController extends \BaseController {

	public function __construct()
	{
		$this->layout = null;

		$this->beforeFilter('guest', ['except' => 'getLogout']);
        $this->beforeFilter('auth', ['only' => 'getLogout']);
	}

	/**
	 * Show the form for signing in.
	 *
	 * @return Response
	 */
	public function getLogin()
	{
        return View::make('auth.login');
	}


	/**
	 * Sign the user into Kalgan.
	 *
	 * @return Response
	 */
	public function postLogin()
	{
		$data = Input::only('uts_id', 'password');

        $form = new SignInForm;

		$form->validate($data);

		if (!Auth::attempt($data))
		{
			return Redirect::back()
				->withInput()
				->withMessage('The credentials you entered are invalid. Please try again!');
		}

		return Redirect::intended('applications');
	}


	/**
	 * Log the user out of Kalgan.
	 *
	 * @return Response
	 */
	public function getLogout()
	{
		Auth::logout();

		return Redirect::route('login')
			->withMessage('You have now been logged out.');
	}


}
