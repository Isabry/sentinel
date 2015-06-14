<?php
/**
 * Sentinel Service Provider 
 *
 * @package   isabry/gatekeeper
 * @author    Isamil SABRY <ismail@sabry.fr>
 * @copyright Copyright (c) Isamil SABRY
 * @link      https://github.com/isabry/sentibel
 */

namespace Isabry\Sentinel;

use Illuminate\Filesystem\Filesystem;

class ServiceProvider extends \Illuminate\Support\ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	* Bootstrap the application events.
	* 
	* @return void
	*/
	public function boot()
	{
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

		// Publish a config file
		$this->publishes([
			__DIR__.'/../config/sentinel.php' => config_path('sentinel.php')
		], 'config');

		// Publish assets
		$this->publishes([
			__DIR__.'/../assets/css/map.css' => base_path('/public/css/map.css'),
			__DIR__.'/../assets/js/map.js' => base_path('/public/js/map.js'),
			__DIR__.'/../assets/js/gmaps.js' => base_path('/public/js/gmaps.js'),
			__DIR__.'/../assets/js/gmaps.min.js' => base_path('/public/js/gmaps.min.js'),
			__DIR__.'/../assets/js/gmaps.min.js.map' => base_path('/public/js/gmaps.min.js.map'),
			__DIR__.'/../assets/js/fontawesome-markers.min.js' => base_path('/public/js/fontawesome-markers.min.js'),
		], 'assets');

		// Publish migrations
		$this->publishes([
			__DIR__.'/database/migrations/' => base_path('/database/migrations')
		], 'migrations');


		// Publish seeds
		$this->publishes([
			__DIR__.'/database/seeds/' => base_path('/database/seeds')
		], 'seeds');

		// routres
		include __DIR__.'/routes.php';

		// Views
		$this->loadViewsFrom(__DIR__.'/views', 'sentinel');


		$this->app['sentinel'] = $this->app->share(function($app) {
			return new Sentinel();
		});

		$this->app->bind('command.sentinel.AddDevice',  'Isabry\Sentinel\Console\AddDeviceCommand');

		$this->commands('command.sentinel.AddDevice');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('sentinel');
	}

}