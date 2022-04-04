<?php


namespace Modules\category;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\category\DB\Provider;
use Modules\category\Facades\ProviderFacade;
use Modules\category\Http\Facades\ResponseFacade;
use Modules\category\Http\Responses\WebResponse;

class ServiceProviderClass extends ServiceProvider
{

    private $namespace = "Modules\category\Http\Controllers";

    public function register()
    {
        ProviderFacade::shouldProxyTo(Provider::class );
        ResponseFacade::shouldProxyTo(WebResponse::class);
    }

    public function boot()
    {

        $this->loadViewsFrom(__DIR__.'/views','CategoryView');

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__.'/routes.php');
    }
}
