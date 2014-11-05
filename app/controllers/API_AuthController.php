<?php

use Kalgan\Forms\SignInForm;

class API_AuthController extends \Controller {

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
            return Response::json([
                'status' => '400',
                'error' => 'The credentials you entered are invalid. Please try again!',
            ]);
		}

		return Response::json([
            'status' => '200',
            'user' => Auth::user(),
        ]);
	}

	/**
	 * Log the user out of Kalgan.
	 *
	 * @return Response
	 */
	public function getLogout()
	{
		Auth::logout();

		return Response::json([
            'status' => '200',
            'message' => 'You have now been logged out.',
        ]);
	}

}
