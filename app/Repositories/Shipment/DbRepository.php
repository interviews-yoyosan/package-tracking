<?php

namespace PackageTracking\Repositories\Shipment;

use PackageTracking\Repositories\Repository;
use PackageTracking\Shipment;

class DbRepository implements Repository
{
    /**
     * Get a collection of all shipments.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Shipment::all();
    }

    /**
     * Find the desired id or thrown a ModelNotFound exception.
     *
     * @param string $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOrFail(string $id)
    {
        return Shipment::findOrFail($id);
    }
}
