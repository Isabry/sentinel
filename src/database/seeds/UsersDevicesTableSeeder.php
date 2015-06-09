<?php
/**
 * Users Table Seeder
 *
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class UsersDevicesTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users_devices')->delete();

		$datetime = Carbon::now();

		$users_devices = [
			[
				'user_id' => 101,
				'device_id' => 1,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'user_id' => 102,
				'device_id' => 2,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'user_id' => 103,
				'device_id' => 3,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'user_id' => 104,
				'device_id' => 4,
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
		];

		DB::table('users_devices')->insert($users_devices);
	}
}
