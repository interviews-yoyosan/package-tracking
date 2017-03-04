<?php

return [
	/**
	 * The path where the CSV file is stored.
	 */
	'csv_path' => env('CSV_PATH', database_path('database.csv')),

	/**
	 * The type of storage being used to retrieve information.
	 *
	 * Possible values: db, csv
	 */
	'storage_type' => env('STORAGE_type', 'csv'),
];