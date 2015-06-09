<?php
/**
 * @package   isabry/sentinel
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/sentinel
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSentinelSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('MenusTableSeederUpdate');
		
		$this->call('DevicesTableSeeder');
		$this->call('UsersDevicesTableSeeder');

		$this->call('TracksTableSeeder');

		$this->call('ZonesTableSeeder');
		$this->call('DevicesZonesTableSeeder');
	}

}
