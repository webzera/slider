<?php

namespace Webzera\Slider;

use Illuminate\Support\ServiceProvider;

class SliderServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'slider');
    }
    
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPublishable();
    }

    private function registerPublishable()
    {
        $bashPath = dirname(__DIR__);

        $arrPublishable= [
            'migrations' => [
                "$bashPath/publishable/database/migrations" => database_path('migrations'),
            ],
            'config' => [
                "$bashPath/publishable/config/slidercredentials.php" => config_path('slidercredentials.php'),
            ]
        ];

        foreach ($arrPublishable as $group => $paths){
            $this->publishes($paths, $group);
        }
    }
    
}
