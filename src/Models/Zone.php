<?php
/**
 * @package   isabry/sentinel
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/sentinel
 */
namespace Isabry\Sentinel\Models;

use Debugbar;
use Schema;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model {

	/**
	 * The database table used by the model.
	 *-------------------------------------------------------------------------
	 * @var string
	 */
	protected $table = 'zones';

	/**
	 * Get zone devices.
	 *-------------------------------------------------------------------------
	 * @return devices 
	 */
	public function devices()
	{
		// Device <-> Zones
		return $this->belongsToMany('Isabry\Sentinel\Models\Device', 'devices_zones');
	}
}
