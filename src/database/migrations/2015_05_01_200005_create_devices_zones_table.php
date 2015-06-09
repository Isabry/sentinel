<?php
/**
 * @package   isabry/sentinel
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/sentinel
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesZonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('devices_zones', function(Blueprint $table)
		{
            $table->increments('id');
            
            $table->integer('device_id');
            $table->integer('zone_id');

            $table->timestamps();

            $table->index('device_id');
            $table->foreign('device_id')
                ->references('id')->on('devices')
                ->onDelete('cascade');

            $table->index('zone_id');
            $table->foreign('zone_id')
                ->references('id')->on('zones')
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
		Schema::table('devices_zones', function (Blueprint $table) {
			$table->dropForeign('devices_zones_user_id_foreign');
			$table->dropForeign('devices_zones_zone_id_foreign');
		});
		Schema::drop('devices_zones');
	}

}
