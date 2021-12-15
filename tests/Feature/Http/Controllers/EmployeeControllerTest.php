<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Employee;

class EmployeeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithoutMiddleware;

    public function test_post_employees()
    {
        $response = $this->post('/employees', [
            'first_name' => 'Tim',
            'last_name' => 'Brown',
            'middle_name' => 'Wallis',
            'address' => '512 Grove Street, Johns District',
            'country_id' => 1,
            'state_id' => 1,
            'city_id' => 1,
            'department_id' => 1,
            'birthdate' => null,
            'date_hired' => null,
            'zip_code' => 2034567,
            
        ]);

        $response->assertStatus(405);
    }

    public function test_update_employee() 
    {
        $response = $this->patch('/employees', [
            'first_name' => 'Tim',
            'last_name' => 'Grayson',
            'middle_name' => 'mason',
            'address' => '522 Grove Street, Johns District',
            'country_id' => 2,
            'state_id' => 2,
            'city_id' => 2,
            'department_id' => 2,
            'birthdate' => null,
            'date_hired' => null,
            'zip_code' => 2000567,
            
        ]);
    
        $response->assertStatus(405);
    }
    
       public function test_delete_employee()
       {
           $employee = Employee::first();
    
           $response = $this->delete('employees', [
            'employee' => $employee,
    
           ]);
    
           $response->assertStatus(405);
       }
}
