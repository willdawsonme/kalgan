<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	protected $connection = 'mysql_users';
	protected $table      = 'users';
    protected $hidden     = ['password', 'remember_token'];
    protected $fillable   = ['uts_id', 'password'];

	/**
	 * Passwords must always be hashed.
	 *
	 * @param $password
	 */
	public function setPasswordAttribute($password)
	{
	    $this->attributes['password'] = Hash::make($password);
	}

    public function applications()
    {
        return $this->hasMany('Application');
    }

}
