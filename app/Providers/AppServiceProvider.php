<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('middleware', function ($expression) {
            return "<?php if(app('Illuminate\\Contracts\\Auth\\Access\\Gate')->check($expression)) : ?>";
        });
        
        Blade::directive('else', function () {
            return '<?php else : ?>';
        });
        
        Blade::directive('endmiddleware', function () {
            return '<?php endif; ?>';
        });
        
    }
}
