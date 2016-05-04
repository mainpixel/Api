<?php
namespace Mainpixel\Api;

use Illuminate\Support\ServiceProvider;

class MainpixelServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool $defer
	 */
	protected $defer = false;
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Configuration file
		$configPath = __DIR__ . '/Config/mainpixel.php';
		$this->mergeConfigFrom($configPath, 'mainpixel');
		$this->publishes([
			$configPath => config_path('mainpixel.php'),
		]);
	}
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['Mainpixel\Api'];
	}
	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('MpApi', function ($app) {
			return new Mainpixel\Api;
		});
	}
}