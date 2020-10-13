<?php
 
namespace Dickyp\RajaOngkir;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class ROngkirPackageServiceProvider extends ServiceProvider{
    public function boot(){
        $this->publishes([
            __DIR__.'/config/rajaongkir.php' => config_path('config/rajaongkir.php'),
        ]);
    }


    public function register()
    {
        $this->app->singleton('rajaongkir', function() {
            return true;
        });

        App::bind('rajaongkir', function()
        {
            return new RajaOngkir;
        });
    }
}
