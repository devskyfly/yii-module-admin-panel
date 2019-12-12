<?php

class LoginFormCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function tryToDirectLogin(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
    }

    public function tryToLogin(FunctionalTester $I)
    {
        $I->amOnPage('/site/login');
        //$I->see('Login form');
        
        /*$result=$I->submitForm('#login-form',[
            "LoginForm[username]" => 'admin',
            "LoginForm[password]" => '1234567'
        ], 'login-button');*/
    }

    public function tryToLogout(FunctionalTester $I)
    {
        $I->amOnPage('/site/logout');
        $I->seeResponseCodeIs(200);
    }

    public function tryToError(FunctionalTester $I)
    {
        $I->amOnPage('/site/error');
        $I->seeResponseCodeIs(404);
    }
}
