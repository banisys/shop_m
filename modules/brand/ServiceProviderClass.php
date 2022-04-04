<?php


namespace Modules\brand;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\brand\DB\Provider;
use Modules\brand\Facades\ProviderFacade;
use Modules\brand\Http\Facades\ResponseFacade;
use Modules\brand\Http\Responses\WebResponse;

class ServiceProviderClass extends ServiceProvider
{

    private $namespace = "Modules\brand\Http\Controllers";

    public function register()
    {
        ProviderFacade::shouldProxyTo(Provider::class );
        ResponseFacade::shouldProxyTo(WebResponse::class);
    }

    public function boot()
    {

        $this->loadViewsFrom(__DIR__.'/views','BrandView');

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__.'/routes.php');
    }
}
