<?php

use Kalgan\Forms\NewApplicationForm;
use Kalgan\Repositories\ApplicationRepository;

class ApplicationController extends \BaseController {

    /**
     * @var ApplicationRepository
     */
    protected $applicationRepository;

    /**
     * @param ApplicationRepository $applicationRepository
     */
    public function __construct(ApplicationRepository $applicationRepository, NewApplicationForm $newApplicationForm)
    {
        $this->applicationRepository = $applicationRepository;
        $this->newApplicationForm = $newApplicationForm;

        $this->beforeFilter('auth');
    }

	/**
	 * Show a list of applications.
	 *
	 * @return Response
	 */
	public function index()
	{
        $applications = $this->applicationRepository->getAllForUser(Auth::user());

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

        $this->newApplicationForm->validate($input);

        $user = Auth::user();
        $application = new Application($input);
        $conference = new Conference($input);
        $paper = new Paper($input);

        $user->applications()->save($application);
        $application->conference()->save($conference);
        $application->paper()->save($paper);

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
		//
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
