<?php namespace DigitalAgua\LaravelHelpers\Providers;

use Illuminate\Support\ServiceProvider;

class HelpersServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        foreach (glob(__DIR__.'/../*.php') as $filename){
            require_once($filename);
        }
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
	}

}
