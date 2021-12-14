<?php

namespace Tests\Feature\Http\Controller;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_post_user()
    {
        //store new user in emysis database http post test
        $response = $this->post('/users', [
            'username' => 'thedarkknight',
            'first_name' => 'Bruce',
            'last_name' => 'Wayne',
            'email' => 'brucewayne@gmail.com',
            'password' => '12345678',
        ]);

        $response->assertStatus(302);
    }

    public function test_get_user() 
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/users', [

        ]);

        $response->assertStatus(200);
    }

   public function test_update_user() {
    $response = $this->patch('/users', [
        'username' => 'thedarkknight',
        'first_name' => 'Bruce',
        'last_name' => 'Wayne',
        'email' => 'brucewayne@gmail.com'
    ]);

    $response->assertStatus(405);
   }

   public function test_delete_user()
   {
       $user = User::first();

       $response = $this->delete('users', [
        'user' => $user,

       ]);

       $response->assertStatus(405);
   }
        
}
