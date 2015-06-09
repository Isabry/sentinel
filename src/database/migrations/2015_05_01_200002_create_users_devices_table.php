<?php
/**
 * @package   isabry/sentinel
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/sentinel
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersDevicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_devices', function(Blueprint $table)
		{
            $table->increments('id');
            
            $table->integer('user_id');
            $table->integer('device_id');

            $table->timestamps();

            $table->index('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->index('device_id');
            $table->foreign('device_id')
                ->references('id')->on('devices')
                ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users_groups', function (Blueprint $table) {
			$table->dropForeign('users_devices_user_id_foreign');
			$table->dropForeign('users_devices_device_id_foreign');
		});
		Schema::drop('users_devices');
	}

}
