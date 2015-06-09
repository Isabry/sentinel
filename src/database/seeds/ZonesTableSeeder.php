<?php
/**
 * Zones Table Seeder
 *
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/gatekeeper
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class ZonesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('zones')->delete();

        $datetime = Carbon::now();

        $zones = [
			[
				'name' => 'Zone C1',
				'type' => 'circle',
				'bounds' => serialize([
					'radius' => 1543.7847370938396,
					'latitude' => 48.13424631889282,
					'longitude' => -1.6452884674072266
				]),
				'created_at' => $datetime,
				'updated_at' => $datetime,			],
			[
				'name' => 'Zone P1',
				'type' => 'polygon',
				'bounds' => serialize([
					['latitude' => 48.143296129890331, 'longitude' => -1.6167926788330078],
					['latitude' => 48.128976073799021, 'longitude' => -1.6154193878173828],
					['latitude' => 48.127371978801321, 'longitude' => -1.5836620330810547]
				]),
				'created_at' => $datetime,
				'updated_at' => $datetime,
			],
        ];

        DB::table('zones')->insert($zones);
    }
}
