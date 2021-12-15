<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\State;

class StateControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_post_states()
    {

        $response = $this->post('/states', [
            'country_id' => '1',
            'name' => 'Kingston',
            
        ]);

        $response->assertStatus(302);
    }

    public function test_update_user() {

        $response = $this->patch('/states', [
            'country_id' => '1',
            'name' => 'Portmore City',
        ]);
    
        $response->assertStatus(405);
       }

       public function test_delete_user()
       {
           $state = State::first();
    
           $response = $this->delete('states', [
            'state' => $state,
    
           ]);
    
           $response->assertStatus(405);
       }
}
