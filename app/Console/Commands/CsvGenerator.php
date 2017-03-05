<?php

namespace PackageTracking\Console\Commands;

use Illuminate\Console\Command;
use PackageTracking\Shipment;

class CsvGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generator:csv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates an CSV file using the contents of shipments table.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Starting to generate CSV file.');

        $csvStorage = new \Keboola\Csv\CsvFile(config('packagetracking.csv_path'));

        $shipments = Shipment::all();
        // Add the columns.
        $csvStorage->writeRow(array_keys($shipments->first()->toArray()));

        foreach ($shipments as $shipment) {
            $shipment->name .= ' - from CSV';
            $csvStorage->writeRow(array_values($shipment->toArray()));
        }

        $this->info('Finished generating CSV file in ' . config('packagetracking.csv_path'));
    }
}
