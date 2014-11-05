<?php namespace Kalgan\Repositories;

use User;
use Paper;
use Conference;
use Application;

class ApplicationRepository {

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
        $application = $this->getNew($data + ['user_id' => $user->id]);
        $conference = $this->conference->newInstance($data);
        $paper = $this->paper->newInstance($paper);

        $application->save();

        $application->conference()->save($conference);
        $application->paper()->save($paper);

        return $application;
    }

}
