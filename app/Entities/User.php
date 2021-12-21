<?php

/**
 * Created by Reliese Model.
 */

namespace App\Entities;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $slug_name
 *
 * @property Collection|PersonalRecord[] $personal_records
 *
 * @package App\Entities
 */
class User extends Entity
{
	const ID = 'id';
	const NAME = 'name';
	const SLUG_NAME = 'slug_name';
	protected $table = 'user';
	public $timestamps = false;

	protected $casts = [
		self::ID => 'int'
	];

	protected $fillable = [
		self::NAME,
		self::SLUG_NAME
	];

	public function personal_records()
	{
		return $this->hasMany(PersonalRecord::class);
	}
}
