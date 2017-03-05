<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Collection;
use PackageTracking\Repositories\Shipment\CsvRepository;

class ShipmentCsvRepositoryTest extends TestCase
{
	private $repo;

	public function setUp()
	{
		parent::setUp();

		$this->repo = new CsvRepository();
	}

	/**
	 * @test
	 */
	public function all_no_shipments_found()
	{
		$this->repo->setCsvFile(base_path('tests/Unit/fixtures/no_shipments.csv'));
		$shipments = $this->repo->all();

		$this->assertInstanceOf(Collection::class, $shipments);
		$this->assertTrue($shipments->isEmpty());
	}

	/**
	 * @test
	 */
	public function all_four_shipments_found()
	{
		$this->repo->setCsvFile(base_path('tests/Unit/fixtures/four_shipments.csv'));
		$shipments = $this->repo->all();

		$this->assertInstanceOf(Collection::class, $shipments);
		$this->assertCount(4, $shipments);
	}

	/**
	 * @test
	 */
	public function findOrFail_shipment_found()
	{
		$this->repo->setCsvFile(base_path('tests/Unit/fixtures/four_shipments.csv'));
		$shipment = $this->repo->findOrFail('1');

		$this->assertInstanceOf(Collection::class, $shipment);
		$this->assertCount(1, $shipment);
		$this->assertEquals('Libero rerum non Gigi Pruna', $shipment->first()['name']);
	}

	/**
	 * @test
	 * @expectedException \Illuminate\Database\Eloquent\ModelNotFoundException
	 */
	public function findOrFail_shipment_not_found()
	{
		$this->repo->setCsvFile(base_path('tests/Unit/fixtures/no_shipments.csv'));

		$this->repo->findOrFail('1');
	}

	/**
	 * @test
	 * @expectedException \Illuminate\Database\Eloquent\ModelNotFoundException
	 */
	public function findOrFail_csv_only_with_headers_shipment_not_found()
	{
		$this->repo->setCsvFile(base_path('tests/Unit/fixtures/only_headers.csv'));

		$this->repo->findOrFail('1');
	}
}
