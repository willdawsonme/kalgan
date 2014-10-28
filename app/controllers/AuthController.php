<?php

use Kalgan\Forms\SignInForm;

class AuthController extends \BaseController {

	/**
	 * @var SignInForm
	 */
	private $signInForm;

	public function __construct(SignInForm $signInForm)
	{
		$this->signInForm = $signInForm;

		$this->beforeFilter('guest', ['except' => 'getLogout']);
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

		// $validation = Validator::make($data, [
		// 	'uts_id' => 'required'
		// ]);

		// dd($validation);

		$this->signInForm->validate($data);

		if (!Auth::attempt($data))
		{
			return Redirect::back()
				->withInput()
				->withMessage('We could not validate your credentials. Please try again!');
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
