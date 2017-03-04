<?php

namespace PackageTracking\Providers;

use Illuminate\Support\ServiceProvider;
use PackageTracking\Repositories\Repository;
use PackageTracking\Http\Controllers\ShipmentController;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
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
