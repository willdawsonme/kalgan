<?php

$I = new FunctionalTester($scenario);

$I->am('a registered Kalgan user');
$I->wantTo('login to Kalgan');

$I->signIn();

$I->seeCurrentUrlEquals('/applications');
$I->see('Logout');
$I->assertTrue(Auth::check());
