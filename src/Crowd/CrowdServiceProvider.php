<?php namespace davidlazarte\Crowd;

/**
 * This file is part of Crowd,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package davidlazarte\Crowd
 */

use Illuminate\Support\ServiceProvider;

class CrowdServiceProvider extends ServiceProvider
{
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
        // Publish config files
        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('crowd.php'),
        ]);

        // Register commands
        $this->commands('command.crowd.migration');
        
        // Register blade directives
        $this->bladeDirectives();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCrowd();

        $this->registerCommands();

        $this->mergeConfig();
    }

    /**
     * Register the blade directives
     *
     * @return void
     */
    private function bladeDirectives()
    {
        // Call to Crowd::hasRole
        \Blade::directive('role', function($expression) {
            return "<?php if (\\Crowd::hasRole{$expression}) : ?>";
        });

        \Blade::directive('endrole', function($expression) {
            return "<?php endif; // Crowd::hasRole ?>";
        });

        // Call to Crowd::can
        \Blade::directive('permission', function($expression) {
            return "<?php if (\\Crowd::can{$expression}) : ?>";
        });

        \Blade::directive('endpermission', function($expression) {
            return "<?php endif; // Crowd::can ?>";
        });

        // Call to Crowd::ability
        \Blade::directive('ability', function($expression) {
            return "<?php if (\\Crowd::ability{$expression}) : ?>";
        });

        \Blade::directive('endability', function($expression) {
            return "<?php endif; // Crowd::ability ?>";
        });
    }

    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerCrowd()
    {
        $this->app->bind('crowd', function ($app) {
            return new Crowd($app);
        });
        
        $this->app->alias('crowd', 'davidlazarte\Crowd\Crowd');
    }

    /**
     * Register the artisan commands.
     *
     * @return void
     */
    private function registerCommands()
    {
        $this->app->singleton('command.crowd.migration', function ($app) {
            return new MigrationCommand();
        });
    }

    /**
     * Merges user's and crowd's configs.
     *
     * @return void
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'crowd'
        );
    }

    /**
     * Get the services provided.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'command.crowd.migration'
        ];
    }
}
