<?php

/**
 * Created by Reliese Model.
 */

namespace App\Entities;

use Carbon\Carbon;

/**
 * Class PersonalRecord
 *
 * @property int $id
 * @property int $user_id
 * @property int $movement_id
 * @property float $value
 * @property Carbon $date
 *
 * @property User $user
 * @property Movement $movement
 *
 * @package App\Entities
 */
class PersonalRecord extends Entity
{
	const ID = 'id';
	const USER_ID = 'user_id';
	const MOVEMENT_ID = 'movement_id';
	const VALUE = 'value';
	const DATE = 'date';
	protected $table = 'personal_record';
	public $timestamps = false;

	protected $casts = [
		self::ID => 'int',
		self::USER_ID => 'int',
		self::MOVEMENT_ID => 'int',
		self::VALUE => 'float'
	];

	protected $dates = [
		self::DATE
	];

	protected $fillable = [
		self::USER_ID,
		self::MOVEMENT_ID,
		self::VALUE,
		self::DATE
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function movement()
	{
		return $this->belongsTo(Movement::class);
	}
}
