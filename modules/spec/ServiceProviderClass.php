<?php


namespace Modules\spec;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\spec\DB\Provider;
use Modules\spec\Facades\ProviderFacade;
use Modules\spec\Http\Facades\ResponseFacade;
use Modules\spec\Http\Responses\WebResponse;

class ServiceProviderClass extends ServiceProvider
{

    private $namespace = "Modules\spec\Http\Controllers";

    public function register()
    {
        ProviderFacade::shouldProxyTo(Provider::class );
        ResponseFacade::shouldProxyTo(WebResponse::class);
    }

    public function boot()
    {

        $this->loadViewsFrom(__DIR__.'/views','SpecView');

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__.'/routes.php');
    }
}
