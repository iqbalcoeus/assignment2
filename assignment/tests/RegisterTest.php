<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testRegisterPage()
    {
        $this->visit('/register')
        	->see('Password')
        	->see('Confirm Password')
        	->dontSee('Forgot Your Password?');
    }
    public function testNewUserRegistration()
    {
    	$name = str_random(10);
    	$email=str_random(10).'@gmail.com';
    	$password='coeus123';
    	$this->visit('register')
    		->type($name,'name')
    		->type($email,'email')
    		->type($password, 'password')
    		->type($password, 'password_confirmation')
    		->press('Register')
    		->seeInDatabase('users', ['email' => $email]);

    }
}
