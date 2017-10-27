<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 12 Sep 2017 14:41:32 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Deliveryman
 * 
 * @property int $deliveryManID
 * @property string $email
 * @property string $password
 * @property string $mobileNumber
 * @property string $fName
 * @property string $lName
 * @property string $profilePicture
 * 
 * @property \Illuminate\Database\Eloquent\Collection $orders
 *
 * @package App
 */
class Deliveryman extends Eloquent
{
	protected $primaryKey = 'deliveryManID';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'email',
		'password',
		'mobileNumber',
		'fName',
		'lName',
		'profilePicture'
	];

	public function orders()
	{
		return $this->hasMany(\App\Order::class, 'deliveryManID');
	}
}
