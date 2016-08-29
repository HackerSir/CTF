<?php

use Hackersir\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthTest extends TestCase
{
    use DatabaseTransactions;

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
        // arrange
        $password = 'forge1234';
        $loginUser = [
            'email'    => 'ctf2@example.com',
            'password' => Hash::make($password),
        ];

        $user = factory(Hackersir\User::class)->make($loginUser);
        $user->save();

        // act & assert
        $this->visit('login')
            ->type($loginUser['email'], 'email')
            ->type($password, 'password')
            ->press('Login')
            ->seePageIs('/');
    }
}
