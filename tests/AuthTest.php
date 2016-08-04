<?php

use Hackersir\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp()
    {
        parent::setUp();

        // 準備一組帳號做登入測試
    }

    public function testRegister()
    {
        // arrange
        $userName = 'CTF';
        $userEmail = 'ctf@example.com';
        $userPassword = 'ctf1234';

        // act
        $this->visit('register')
            ->type($userName, 'name')
            ->type($userEmail, 'email')
            ->type($userPassword, 'password')
            ->type($userPassword, 'password_confirmation')
            ->press('Register')
            ->seePageIs('/');

        // assert
        $user = User::where('email', $userEmail)->first();
        $this->assertEquals($userName, $user->name);
        $this->assertTrue(Hash::check($userPassword, $user->getAuthPassword()));
    }

    public function testLogin()
    {
    }
}
