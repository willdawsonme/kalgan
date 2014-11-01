<?php namespace Kalgan\Repositories;

use User;
use Application;

class ApplicationRepository {

    public function getAll()
    {
        return Application::with('paper')->with('conference')->get();
    }

    public function getAllForUser(User $user)
    {
        return $user->applications()->with('paper')->with('conference')->get();
    }

}
