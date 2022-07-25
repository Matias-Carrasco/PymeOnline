<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Tests\TestCase;
use App\Models\User;

class RegisterTest extends TestCase
{
 
    public function test_user_can_view_a_register_form()
    {
        $response = $this->get('/register');

        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
    }

    public function test_user_cannot_view_a_register_form_when_authenticated()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/register');

        $response->assertRedirect('/home');
    }

    public function test_user_can_register()
    {
        
        $user = User::where('email','register@register.com');
        $user -> delete();

        $response = $this->post('/register', [
            'email' => 'register@register.com',
            'password' => 'secretpassword',
            'password_confirmation' => 'secretpassword',
            'rol_id' => random_int(2,3),
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
        
        

        
        
    }

    public function test_user_already_registered()
    {
        $response = $this->post('/register', [
            'email' => 'tienda@tienda.com',
            'password' => 'secretpassword',
            'password_confirmation' => 'secretpassword',
            'rol_id' => random_int(2,3),
        ]);
        
        $response->assertStatus(302);

    }

    public function test_confirmation_password_is_not_equal()
    {
        $password = 'secretpassword';
        $password_confirmation = 'notthesamepassword';
        $response = $this->post('/register', [
            'email' => 'confirmation@confirmation.com',
            'password' => $password,
            'password_confirmation' => $password_confirmation,
            'rol_id' => random_int(2,3),
        ]);

        $this->assertTrue((strcmp($password,$password_confirmation)!==0));

        
     
    }

   

   
 
   


}
