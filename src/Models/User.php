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

class User extends Model {

	/**
	 * The database table used by the model.
	 *-------------------------------------------------------------------------
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * Get group users.
	 *-------------------------------------------------------------------------
	 * @return users 
	 */
	public function devices()
	{
		// Users -> Devices
		return $this->belongsToMany('Isabry\Sentinel\Models\Device', 'users_devices');
	}
}
