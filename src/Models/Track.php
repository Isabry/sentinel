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

class Track extends Model {

	/**
	 * The database table used by the model.
	 *-------------------------------------------------------------------------
	 * @var string
	 */
	protected $table = 'tracks';

	/**
	 * Get group users.
	 *-------------------------------------------------------------------------
	 * @return users 
	 */
	public function device()
	{
		// Track -> Device
		return $this->belongsTo('Isabry\Laradmin\Models\Device');
	}
}
