<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use App\View\Components\DashLayout;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

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
        RateLimiter::for('global', function (Request $request) {
            return Limit::perMinute(150)->by($request->ip()); // Limit 50 requests per minute per IP address
        });



        if (config('app.env') !== 'local') { // Skip enforcing HTTPS in local environment
            URL::forceScheme('https');
        }

        // Register admin components
        Blade::anonymousComponentPath(resource_path('views/administrator/Components'), 'y');

        // Custom compiler for y- prefixed components
        Blade::extend(function ($view, $compiler) {
            $pattern = '/\<y-([^\/\s>]+)(?:\s|>)/';
            return preg_replace_callback($pattern, function ($matches) {
                $component = $matches[1];
                $viewPath = "administrator.components." . Str::kebab($component);
                return "<?php echo \$__env->make('{$viewPath}', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>";
            }, $view);
        });

        Blade::componentNamespace('App\\View\\Components\\Public', 'public');
        Blade::component('dash-layout', DashLayout::class);
        Blade::directive('active', function ($expression) {
            list($pattern, $class) = explode(',', str_replace(['(', ')', ' ', "'"], '', $expression));
            return "<?= request()->is('$pattern') ? '$class' : ''; ?>";
        });

    }
}