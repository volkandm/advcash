<?php

namespace VolkanAydin\Advcash;

use Illuminate\Support\ServiceProvider;

class AdvcashServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('advcash', function ($app) {
            return new Advcash();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Paketinizin kullanılabilirliğini Laravel uygulamanıza
        // tanıtarak veya konfigürasyon ayarlarını ekleyerek
        // işlem yapabilirsiniz.
    }
}
