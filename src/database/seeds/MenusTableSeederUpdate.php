<?php
/**
 *  Menus Table Seeder
 *
 * @package   isabry/sentinel
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/sentinel
 */

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class MenusTableSeederUpdate extends Seeder
{
	public function run()
	{
		$menus = [
			[
				'auth' => true,
				'href' => '/devices',
				'icon' => '<i class="fa fa-server"></i>',
				'label' => 'Devices',
				'permissions' => serialize(['admin','manager']),
				'side' => 'left',
			],
			[
				'auth' => true,
				'href' => '/zones',
				'icon' => '<i class="fa fa-dot-circle-o"></i>',
				'label' => 'Zones',
				'permissions' => serialize(['admin','manager']),
				'side' => 'left',
			],
			[
				'auth' => true,
				'href' => '/tracker',
				'icon' => '<i class="fa fa-map-marker"></i>',
				'label' => 'Tracker',
				'permissions' => serialize(['admin','manager']),
				'side' => 'left',
			],
		];

		DB::table('menus')->insert($menus);
	}
}
