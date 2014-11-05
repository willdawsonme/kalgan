<?php

use Kalgan\Forms\ApplicationForm;
use Kalgan\Repositories\ApplicationRepository;

class API_ApplicationController extends \Controller {

    /**
     * @var ApplicationRepository
     */
    protected $applications;

    /**
     * @param ApplicationRepository $applicationRepository
     */
    public function __construct(ApplicationRepository $applications)
    {
        $this->applications = $applications;
    }

	/**
	 * Show a list of applications.
	 *
	 * @return Response
	 */
	public function index()
	{
        $applications = $this->applications->getAllForUser(Auth::user());

		return Response::json([
            'status' => '200',
            'applications' => $applications,
        ]);
	}


	/**
	 * Store the application in the database.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

        $form = new ApplicationForm;

        $form->validate($input);

        $application = $this->applications->create($input, Auth::user());

        if ( ! $application)
        {
            return Response::json([
                'status' => '400',
                'message' => 'Something went wrong. Please try again!',
            ]);
        }

        return Response::json([
            'status' => '200',
            'application' => $application,
        ]);
	}


}
