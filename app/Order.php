<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 12 Sep 2017 14:41:32 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Order
 * 
 * @property int $orderID
 * @property string $name
 * @property int $status
 * @property \Carbon\Carbon $date
 * @property string $sourceRegion
 * @property string $sourceAddress
 * @property string $destinationRegion
 * @property string $destinationAddress
 * @property string $mobileNumber
 * @property int $orderCost
 * @property int $size
 * @property string $description
 * @property string $receivingDate
 * @property int $deliveryCost
 * @property int $deliveryManID
 * @property int $userID
 * @property string $customerMobileNumber
 * @property \App\Deliveryman $deliveryman
 * @property \App\User $user
 *
 * @package App
 */
class Order extends Eloquent
{
	protected $primaryKey = 'orderID';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int',
		'orderCost' => 'int',
		'size' => 'int',
		'deliveryCost' => 'int',
		'deliveryManID' => 'int',
		'userID' => 'int'
	];

	protected $dates = [
		'date'
	];

	protected $fillable = [
		'name',
		'status',
		'date',
		'sourceRegion',
		'sourceAddress',
		'destinationRegion',
		'destinationAddress',
		'mobileNumber',
		'orderCost',
		'size',
		'description',
		'receivingDate',
		'deliveryCost',
		'deliveryManID',
		'userID',
        'customerMobileNumber'
	];

	public function deliveryman()
	{
		return $this->belongsTo(\App\Deliveryman::class, 'deliveryManID');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'userID');
	}
}
