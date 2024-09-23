<?php

namespace App\Providers;

use App\Repositories\Shipment\ShipmentRepository;
use App\Repositories\Shipment\ShipmentRepositoryInterface;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Permission\PermissionRepository;
use App\Repositories\Permission\PermissionsRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ContactMethodService::class, function ($app) {
            return new ContactMethodService();
        });
    }
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //roles directives
        Blade::directive('role', function ($slug) {
            return "<?php if(Auth::user()->hasRole('admin') || Auth::user()->hasPermission($slug)){ ?>";
});
Blade::directive('endrole', function ($slug) {
return "<?php } ?>";
});
//permission directives
Blade::directive('permission', function ($slug) {
return "<?php if(Auth::user()->hasPermission($slug)){ ?>";
});
Blade::directive('endpermission', function ($slug) {
return "<?php } ?>";
});
Blade::directive('elserole', function ($slug) {
return "<?php }else{ ?>";
});

$this->app->bind(UserRepositoryInterface::class, UserRepository::class);
$this->app->bind(ShipmentRepositoryInterface::class, ShipmentRepository::class);
$this->app->bind(PermissionsRepositoryInterface::class, PermissionRepository::class);
Paginator::useBootstrap();

if (config('app.env') === 'production') {
URL::forceScheme('https');
}
}
}
