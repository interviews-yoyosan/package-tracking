<?php

namespace PackageTracking\Providers;

use Illuminate\Support\ServiceProvider;
use PackageTracking\Http\Controllers\ShipmentController;
use PackageTracking\Repositories\Repository;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->when(ShipmentController::class)
            ->needs(Repository::class)
            ->give(function () {
                $storageType = config('packagetracking.storage_type');
                $storageTypeClass = '\PackageTracking\Repositories\Shipment\\' . ucfirst($storageType) . 'Repository';

                return new $storageTypeClass();
            });
    }
}
