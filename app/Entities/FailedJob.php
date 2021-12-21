<?php

/**
 * Created by Reliese Model.
 */

namespace App\Entities;

use Carbon\Carbon;

/**
 * Class FailedJob
 *
 * @property int $id
 * @property string $uuid
 * @property string $connection
 * @property string $queue
 * @property string $payload
 * @property string $exception
 * @property Carbon $failed_at
 *
 * @package App\Entities
 */
class FailedJob extends Entity
{
	const ID = 'id';
	const UUID = 'uuid';
	const CONNECTION = 'connection';
	const QUEUE = 'queue';
	const PAYLOAD = 'payload';
	const EXCEPTION = 'exception';
	const FAILED_AT = 'failed_at';
	protected $table = 'failed_jobs';
	public $timestamps = false;

	protected $casts = [
		self::ID => 'int'
	];

	protected $dates = [
		self::FAILED_AT
	];

	protected $fillable = [
		self::UUID,
		self::CONNECTION,
		self::QUEUE,
		self::PAYLOAD,
		self::EXCEPTION,
		self::FAILED_AT
	];
}
