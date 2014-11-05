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
		$request = Request::create('/api/login', 'POST', Input::only('uts_id', 'password'));

        $response = Route::dispatch($request)->getData();

        if ( ! isset($response->user))
        {
            return Redirect::back()
                ->withInput()
                ->withMessage($response->error);
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
		$request = Request::create('/api/logout', 'GET');

        $response = Route::dispatch($request)->getData();

        if ($response->status == 200)
        {
            return Redirect::route('login')
                ->withMessage($response->message);
        }

		return 'An error occurred. Please try again!';
	}


}
