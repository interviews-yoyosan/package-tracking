<?php

namespace PackageTracking\Repositories\Shipment;

use Keboola\Csv\CsvFile;
use Illuminate\Support\Collection;
use PackageTracking\Repositories\Repository;

class CsvRepository implements Repository
{
    protected $csvFile;

    public function __construct()
    {
        $this->csvFile = new CsvFile(config('packagetracking.csv_path'));
    }

    /**
     * Set the CSV file used for the repository.
     *
     * @param string $csvFile
     */
    public function setCsvFile(string $csvFile)
    {
    	$this->csvFile = new CsvFile($csvFile);
    }

    /**
     * Get a collection of all shipments.
     *
     * @return \Illuminate\Support\Collection
     */
    public function all()
    {
        return $this->transformIntoCollection();
    }

    /**
     * Find the desired id or thrown a ModelNotFound exception.
     *
     * @param string $id
     *
     * @return \Illuminate\Support\Collection
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOrFail(string $id)
    {
        $shipments = $this->transformIntoCollection();

        $shipment = $shipments->filter(function ($value) use ($id) {
            return $value['id'] == $id;
        });

        if ($shipment->isEmpty()) {
            throw (new \Illuminate\Database\Eloquent\ModelNotFoundException())
                ->setModel(\PackageTracking\Shipment::class, $id);
        }

        return $shipment;
    }

    /**
     * Transform the parsed CSV result into a collection.
     *
     * @return \Illuminate\Support\Collection
     */
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
