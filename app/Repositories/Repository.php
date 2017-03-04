<?php

namespace PackageTracking\Repositories;

use Illuminate\Database\Eloquent\Model;

interface Repository
{
	public function all();

	public function findOrFail(string $id);
}