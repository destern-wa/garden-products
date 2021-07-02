<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        /* For the initial version of the app, tokens are just used for authentication,
         * not permissions. See https://jetstream.laravel.com/2.x/features/api.html#defining-permissions
         * for how to set up proper permissions.
         */
        Jetstream::defaultApiTokenPermissions(['all']);
        Jetstream::permissions(['all']);
    }
}
