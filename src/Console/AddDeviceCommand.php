<?php
/**
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/sentibel
 */

namespace Isabry\Sentinel\Console;

use Illuminate\Console\Command;

class AddDeviceCommand extends Command
{
	protected $name = 'sentinel:add-device';
	protected $description = 'Add Device';

	/*
	 * Execute the console command.
	 *
	 * @return void
	 */
	public function fire()
	{
		$this->info('sentinel:add-device => Todo');
	}
}