<?php namespace Kalgan\Repositories;

use User;
use Paper;
use Conference;
use Application;

class ApplicationRepository extends Repository {

    /**
     * Conference model.
     *
     * @var Conference
     */
    protected $conference;

    /**
     * Paper model.
     *
     * @var Paper
     */
    protected $paper;

    public function __construct(Application $model, Conference $conference, Paper $paper)
    {
        $this->model      = $model;
        $this->conference = $conference;
        $this->paper      = $paper;
    }

    public function getAllForUser(User $user)
    {
        return $user->applications()->get();
    }

    public function create($data, User $user)
    {
        $application = $this->getNew($data);
        $conference = $this->conference->newInstance($data);
        $paper = $this->paper->newInstance($data);

        if(isset($data['submit']))
            $application->submitted = 1;
        
        $user->applications()->save($application);
        $application->conference()->save($conference);
        $application->paper()->save($paper);

        return $application;
    }

}
