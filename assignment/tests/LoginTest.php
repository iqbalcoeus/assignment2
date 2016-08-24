<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{

    public function testLoginPage()
    {
        $this->visit('/login')
        	->see('E-Mail Address')
        	->see('Password')
        	->see('login')
        	->see('Forgot Your Password?')
        	->see('Remember Me')
        	->dontSee('Confirm Password');
    }
    public function testLoginForm()
    {
    	$this->visit('/login')
    		->type('iqbal@gmail.com', 'email')
    		->type('coeus123', 'password')
    		->check('remember')
    		->press('Login')
    		->see('Logout');
    }
    public function testForgotPasswordLink()
    {
    	$this->visit('/login')
    		->click('Forgot Your Password?')
    		->seePageIs('password/reset');
    }
}
