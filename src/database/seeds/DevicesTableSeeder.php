<?php
/**
 * Devices Table Seeder
 *
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class DevicesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('devices')->delete();

        $datetime = Carbon::now();

        $devices = [
			[
				'name' => 'Phone Ismail',
				'sn' => 'SN00000001',
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'name' => 'Phone Martine',
				'sn' => 'SN00000002',
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'name' => 'Phone Sarah',
				'sn' => 'SN00000003',
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
			[
				'name' => 'Phone Hossana',
				'sn' => 'SN00000004',
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
        ];

		// for($i=1; $i<15; $i++) {
		// 	$sn = sprintf("SN123456%02d", $i);
		// 	$devices[] = [
		// 		'sn' => $sn,
		// 		'created_at' => $datetime,
		// 		'updated_at' => $datetime,
		// 	];
		// }

        DB::table('devices')->insert($devices);
    }
}
