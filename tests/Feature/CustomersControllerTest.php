<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use Tests\TestCase;

use App\Models\Customer;

class CustomersControllerTest extends TestCase
{

    use RefreshDatabase;

    public $seed = true;

    /** @test */
    public function the_index_route_accessed()
    {
        $response = $this->get('/api/customers');

        $response->assertStatus(200);
    }

    /** @test */
    public function the_index_route_returns_valid_structure()
    {
        $response = $this->get('/api/customers');

        $structure = [
            '*' => [
                "id", "title", "name", "surname", "phone", "email", "profile_image"
            ]
        ];

        $response->assertStatus(200)
            ->assertJsonStructure($structure);
    }

    /** @test */
    public function the_show_route_accessed()
    {
        $response = $this->get('/api/customers/details/1');

        $response->assertStatus(200);
    }

    /** @test */
    public function the_show_route_returns_valid_structure_and_data()
    {

        $userData = [
            'title' => 'Mr.',
            'name' => 'TestName',
            'surname' => 'Test',
            'phone' => '+48000000000',
            'email' => 'test@example.com',
            'profile_image' => 'test_image.jpg'
        ];

        $customer = Customer::create($userData);

        $response = $this->get('/api/customers/details/13');

        $response->assertStatus(200)
            ->assertJson($userData);
    }

    /** @test */
    public function the_show_route_returns_404()
    {
        $response = $this->get('/api/customers/details/');

        $response->assertStatus(404);
    }

    /** @test */
    public function the_create_route_returns_405_error()
    {
        $response = $this->get('/api/customers/create');

        $response->assertStatus(405);
    }

    /** @test */
    public function the_create_route_add_new_customers_without_file()
    {

        $userData = [
            'title' => 'Mr.',
            'name' => 'TestName2',
            'surname' => 'Test2',
            'phone' => '+48000000001',
            'email' => 'test@example.eu',
            'use_placeholder' => 1
        ];


        $response = $this->post('/api/customers/create', $userData);

        unset($userData['use_placeholder']);

        $this->assertDatabaseHas('customers', $userData);
    }

    /** @test */
    public function the_create_route_returns_a_validation_errors()
    {
        $userData = [];

        $response = $this->post('/api/customers/create', $userData);

        $response->assertStatus(422);
    }

    /** @test */
    public function the_update_route_returns_404_error()
    {
        $response = $this->post('/api/customers/update');

        $response->assertStatus(404);
    }

    /** @test */
    public function the_update_route_update_customer()
    {

        $userData = [
            'name' => 'TestName2',
            'surname' => 'Test2',
            'phone' => '+48000000001',
            'email' => 'test@example.eu'
        ];

        $response = $this->post('/api/customers/update/2', $userData);

        $this->assertDatabaseHas('customers', $userData);
    }

    /** @test */
    public function the_update_route_returns_a_validation_errors()
    {
        $userData = [];

        $response = $this->post('/api/customers/update/2', $userData);

        $response->assertStatus(422);
    }

    /** @test */
    public function the_delete_route_deleting()
    {
        $response = $this->delete('/api/customers/delete/1');

        $this->assertDatabaseMissing('customers', [
            "id" => 1
        ]);
    }

    /** @test*/
    public function the_delete_route_returns_404()
    {
        $response = $this->delete('/api/customers/delete/');

        $response->assertStatus(404);
    }
}
