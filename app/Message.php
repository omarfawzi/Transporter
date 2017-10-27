<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 12 Sep 2017 14:41:32 +0000.
 */

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Message
 * 
 * @property int $messageID
 * @property int $receiverID
 * @property string $content
 * @property int $senderID
 * 
 * @property \App\User $user
 *
 * @package App
 */
class Message extends Eloquent
{
	protected $primaryKey = 'messageID';
	public $timestamps = false;

	protected $casts = [
		'receiverID' => 'int',
		'senderID' => 'int'
	];

	protected $fillable = [
		'receiverID',
		'content',
		'senderID'
	];

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'senderID');
	}
}
