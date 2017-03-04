<?php

namespace PackageTracking\Repositories\Shipment;

use PackageTracking\Repositories\Repository;
use PackageTracking\Shipment;

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
