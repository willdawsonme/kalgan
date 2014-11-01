<?php

class HomeController extends BaseController {

	public function index()
	{
		return View::make('auth/login');
	}

}
