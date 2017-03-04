<?php

namespace PackageTracking\Repositories\Shipment;

use PackageTracking\Shipment;
use Illuminate\Database\Eloquent\Model;
use PackageTracking\Repositories\Repository;

class DbRepository implements Repository
{
	public function all()
	{
		return Shipment::all();
	}

	public function findOrFail(string $id)
	{
		return Shipment::findOrFail($id);
	}
}