<?php

use Kalgan\Forms\ApplicationForm;
use Kalgan\Repositories\ApplicationRepository;

class ApplicationController extends \BaseController {

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

        $this->beforeFilter('auth');
    }

	/**
	 * Show a list of applications.
	 *
	 * @return Response
	 */
	public function index()
	{
        $applications = $this->applications->getAllForUser(Auth::user());

		$this->title = 'Applications';
        $this->view('applications.index', compact('applications'));
	}


	/**
	 * Show the create application form.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->title = 'New Application';
        $this->view('applications.create');
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

        $this->applications->create($input, Auth::user());

        return Redirect::route('applications.index');
	}


	/**
	 * Show the specified application.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$application = $this->applications->getById($id);

        $this->title = $application->paper->title;
        $this->view('applications.view', compact('application'));
	}


	/**
	 * Edit the specified application.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the application in the database.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the application from the database.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
