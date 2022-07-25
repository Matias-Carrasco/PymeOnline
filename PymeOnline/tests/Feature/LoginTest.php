<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class LoginTest extends TestCase
{

    public function test_user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_user_cannot_view_a_login_form_when_authenticated()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/home');
    }

   
 
    public function test_user_can_login_with_correct_credentials()
    {
        $response = $this->post('/login',[
            'email' => 'admin@admin.com',
            'password' => 'adminadmin',
        ]);

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/home');
    }

    public function test_user_cannot_login_with_incorrect_password()
    {
        $response = $this->post('/login',[
            'email' => 'test@test.com',
            'password' => 'invalid',
        ]);
       
        $response->assertRedirect('/');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

   
}
