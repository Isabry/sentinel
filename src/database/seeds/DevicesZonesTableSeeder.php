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

class DevicesZonesTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('devices_zones')->delete();

		$datetime = Carbon::now();

		$devices_zones = [
			[
				'device_id' => 1,
				'zone_id'   => 1,

				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
		];

		DB::table('devices_zones')->insert($devices_zones);
	}
}
