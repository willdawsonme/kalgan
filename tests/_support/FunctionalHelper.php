<?php namespace Codeception\Module;

use Laracasts\TestDummy\Factory as TestDummy;

class FunctionalHelper extends \Codeception\Module
{

    /**
     * Prepare Kalgan account, and log in.
     */
    public function signIn()
    {
        $uts_id = '12345678';
        $password = 'secret';

        $user = $this->haveAnAccount(compact('uts_id', 'password'));

        $I = $this->getModule('Laravel4');

        $I->amOnPage('/login');
        $I->fillField('UTS ID', $uts_id);
        $I->fillField('Password', $password);
        $I->click('Log in', 'input');
    }

    /**
     * Create a Kalgan user account in the database.
     *
     * @param array $overrides
     * @return mixed
     */
    public function haveAnAccount($overrides = [])
    {
        return $this->have('User', $overrides);
    }

    /**
     * Insert a dummy record into a database table.
     *
     * @param $model
     * @param array $overrides
     * @return mixed
     */
    public function have($model, $overrides = [])
    {
        return TestDummy::create($model, $overrides);
    }

}
