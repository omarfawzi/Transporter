<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 12 Sep 2017 14:41:33 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $userID
 * @property string $fName
 * @property string $lName
 * @property string $email
 * @property string $password
 * @property string $address
 * @property string $mobileNumber
 * @property string $profilePicture
 * 
 * @property \Illuminate\Database\Eloquent\Collection $messages
 * @property \Illuminate\Database\Eloquent\Collection $orders
 *
 * @package App
 */
class User extends Eloquent
{
	protected $table = 'user';
	protected $primaryKey = 'userID';
	public $timestamps = false;

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'fName',
		'lName',
		'email',
		'password',
		'address',
		'mobileNumber',
		'profilePicture'
	];

	public function messages()
	{
		return $this->hasMany(\App\Message::class, 'senderID');
	}

	public function orders()
	{
		return $this->hasMany(\App\Order::class, 'userID');
	}
}
