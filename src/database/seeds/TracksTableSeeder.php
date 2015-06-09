<?php
/**
 * Tracks Table Seeder
 *
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class TracksTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('tracks')->delete();

		$datetime = Carbon::now();
		$device_id = 1;

		$tracks = [
			[
				'device_id' => $device_id,
				'latitude'  => 48.10565448,
				'longitude' => -1.61305904,
				'timestamp' => Carbon::now()->addHours(1),

				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'device_id' => $device_id,
				'latitude'  => 48.10873503,
				'longitude' => -1.60881042,
				'timestamp' => Carbon::now()->addHours(2),

				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'device_id' => $device_id,
				'latitude'  => 48.11425089,
				'longitude' => -1.60848856,
				'timestamp' => Carbon::now()->addHours(3),

				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'device_id' => $device_id,
				'latitude'  => 48.12745791,
				'longitude' => -1.62590683,
				'timestamp' => Carbon::now()->addHours(4),
				
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
		];

		DB::table('tracks')->insert($tracks);
	}
}
