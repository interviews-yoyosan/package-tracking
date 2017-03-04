<?php

namespace PackageTracking\Repositories;

interface Repository
{
    public function all();

    public function findOrFail(string $id);
}
