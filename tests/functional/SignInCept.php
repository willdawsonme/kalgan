<?php

$I = new FunctionalTester($scenario);

$I->am('a registered Kalgan user');
$I->wantTo('login to Kalgan');

$I->signIn();

$I->seeCurrentUrlEquals(''); // Should remove.
// $I->seeCurrentUrlEquals('/applications'); When applications are implemented.
// $I->see('Logout'); When there is a logout button.
$I->assertTrue(Auth::check());
