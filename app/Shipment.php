<?php

namespace PackageTracking;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
	/**
	 * Status states.
	 */
    const STATUS_DELIVERED = 'delivered';
    const STATUS_PENDING = 'pending';
    const STATUS_PROCESSING = 'processing';


    /**
     * @return array
     */
    public static function getStatuses()
    {
    	return [
    		self::STATUS_PROCESSING,
    		self::STATUS_PENDING,
    		self::STATUS_DELIVERED,
    	];
    }
}
