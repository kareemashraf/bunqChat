<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MessageTest extends TestCase
{
    /**
     * A basic unit test function to test getMessages().
     *
     * @return void
     */
    public function testgetMessages()
    {
        $response = $this->json('GET', '/api/messages/1/2');
        $total = count((array)$response->getData()[0]);
        $res_array = (array)json_decode($response->content())[0];
        
        $response->assertStatus(200);
        $this->assertArrayHasKey('message', $res_array);
        $this->assertArrayHasKey('user', $res_array);
        $this->assertArrayHasKey('from_user_id', $res_array);
        $this->assertArrayHasKey('to_user_id', $res_array);
        $this->assertEquals(7,$total);
    }


    /**
     * A basic unit test function to test sendMessage().
     *
     * @return void
     */
    public function testsendMessage()
    {
        $this->post('/api/messages/', [
        'from_user_id' => 1,
        'to_user_id' => 2,
        'message' => 'unit test message',
	    ])->assertJsonStructure([
	        'from_user_id',
	        'to_user_id',
	        'message',
	        'updated_at',
	        'created_at',
	        'id'
	    ]);
    }
}



