<?php

namespace Tests\Feature;

use Config;
use Tests\Feature\TestCase;
use PackageTracking\Shipment;

class ShipmentControllerTest extends TestCase
{
	/**
	 * @test
	 */
	public function index_no_shipments_found()
	{
	    $response = $this->json('GET', '/api/shipments');

	    $response->assertStatus(200)
	    	->assertJson([]);
	}

	/**
	 * @test
	 */
	public function index_four_shipments_found()
	{
		factory(Shipment::class, 4)->create();

	    $response = $this->json('GET', '/api/shipments');

	    $response->assertStatus(200);
	    $this->assertCount(4, $response->json());
	}

	/**
	 * @test
	 */
	public function show_shipment_id_found()
	{
		$shipment = factory(Shipment::class)->create(['name' => 'Test Product']);

		$response = $this->json('GET', '/api/shipment/' . $shipment->getKey());

		$response->assertStatus(200)
		    ->assertJson([
		    	'name' => 'Test Product',
	    	]);
	}

	/**
	 * @test
	 */
	public function show_shipment_id_not_found()
	{
		$response = $this->json('GET', '/api/shipment/' . 1);

		$response->assertStatus(404);
	}
}
