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

class Device extends Model {

	/**
	 * The database table used by the model.
	 *-------------------------------------------------------------------------
	 * @var string
	 */
	protected $table = 'devices';

	/**
	 * Get device users.
	 *-------------------------------------------------------------------------
	 * @return users 
	 */
	public function users()
	{
		// Device -> Users
		return $this->belongsToMany('Isabry\Sentinel\Models\User', 'users_devices');
	}

	/**
	 * Get device tracks.
	 *-------------------------------------------------------------------------
	 * @return tracks 
	 */
	public function tracks()
	{
		// Device <-> Tracks
		return $this->hasMany('Isabry\OpenidcServer\Models\Track');
	}

	/**
	 * Get device zones.
	 *-------------------------------------------------------------------------
	 * @return zones 
	 */
	public function zones()
	{
		// Device <-> Zones
		return $this->belongsToMany('Isabry\Sentinel\Models\Zone', 'devices_zones');
	}
}
