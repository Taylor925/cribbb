<?php namespace Sloshdev\Supyo;

use Illuminate\Support\ServiceProvider;

class SupyoServiceProvider extends ServiceProvider {

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
		$this->package('sloshdev/supyo');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
		$this->app['supyo'] = $this->app->share(function($app){
			return new Supyo;
		});

		$this->app->booting(function(){

			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Supyo','Sloshdev\Supyo\Facades\Supyo');

		});
	}


	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('supyo');
	}

}