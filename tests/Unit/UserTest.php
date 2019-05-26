<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic unit test function for getUsers().
     *
     * @return void
     */
    public function testgetUsers()
    {
        $response = $this->json('GET', '/api/users');
        $total = count((array)$response->getData()[0]);
        $res_array = (array)json_decode($response->content())[0];
        
        $response->assertStatus(200);
        $this->assertArrayHasKey('name', $res_array);
        $this->assertEquals(6,$total);

    }


    /**
     * A basic unit test function getUserbyID()
     *
     * @return void
     */
    public function testgetUserbyID()
    {

        $response = $this->json('GET', '/api/users/1');
        $total = count((array)$response->getData());
        $res_array = (array)json_decode($response->content());

        $response->assertStatus(200);
        $this->assertEquals(6,$total);
        $this->assertArrayHasKey('id', $res_array);
        $this->assertArrayHasKey('name', $res_array);
        $this->assertArrayHasKey('email', $res_array);
        $this->assertArrayHasKey('created_at', $res_array);

    }
}
