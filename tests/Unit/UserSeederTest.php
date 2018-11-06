<?php

namespace Tests\Unit;

use App\User;
use DB;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserSeederTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_can_specifiy_password(){
        $request = [
            'name' => 'john',
            'email' => 'pdeantihuman@gmail.com',
            'password' => 'secret'
        ];
        $user = new User();
        $user->name='faker';
        $user->email='faker@gmail.com';
        $user->password=bcrypt('secret');
        $user->save();
        $this->assertTrue(\Auth::attempt($request));
    }
}
