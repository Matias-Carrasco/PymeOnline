<?php

namespace Tests\Unit;

use App\Models\tienda;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TagControllerTest extends TestCase
{
    
    public function test_view_index_while_logged()
    {
        $user = User::factory()->create(['rol_id' => '3']);

        $response = $this->actingAs($user)->get('/tags');

        $response->assertStatus(200);
        
    }

    public function test_store_new_tag()
    {
        $user = User::factory()->create();

        $request = [
            'tag_nombre' => 'electronica'
        ];

        $response = $this->actingAs($user)->post('/tags/',$request);

        $response->assertStatus(302);
    }

    public function test_update_existing_tag()
    {
        $user = User::factory()->create();

        $request = [
            'tag_nombre' => 'electronica'
        ];

        $response = $this->actingAs($user)->patch('/tags/',$request);
    }

    public function test_update_nonexisting_tag()
    {
        $this->assertTrue(true);
    }

    public function test_destroy_existing_tag()
    {
        $this->assertTrue(true);
    }
    public function test_destroy_nonexisting_tag()
    {
        $this->assertTrue(true);
    }

}
