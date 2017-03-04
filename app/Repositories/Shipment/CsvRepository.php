<?php

namespace PackageTracking\Repositories\Shipment;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use PackageTracking\Repositories\Repository;

class CsvRepository implements Repository
{
	protected $csvFile;

	public function __construct()
	{
		$this->csvFile = new \Keboola\Csv\CsvFile(config('packagetracking.csv_path'));
	}

	public function all()
	{
		return $this->transformIntoCollection();
	}

	public function findOrFail(string $id)
	{
		$shipments = $this->transformIntoCollection();

		$shipment = $shipments->filter(function ($value) use ($id) {
			return $value['id'] == $id;
		});

		if ($shipment->isEmpty()) {
			throw (new \Illuminate\Database\Eloquent\ModelNotFoundException)
				->setModel(\PackageTracking\Shipment::class, $id);
		}

		return $shipment;
	}

	protected function transformIntoCollection()
	{
		$shipmentsCollection = new Collection($this->csvFile);
		$columns = $shipmentsCollection->first();

		return $shipmentsCollection
			->slice(1, $shipmentsCollection->count() - 1)
			->map(function ($item) use ($columns) {
				$result = [];
				foreach ($columns as $key => $column) {
					$result[$column] = $item[$key];
				}

			    return $result;
			});
	}
}