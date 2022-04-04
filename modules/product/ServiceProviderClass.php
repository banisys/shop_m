<?php


namespace Modules\product;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\product\DB\Provider;
use Modules\product\Facades\ProviderFacade;
use Modules\product\Http\Facades\ResponseFacade;
use Modules\product\Http\Responses\WebResponse;

class ServiceProviderClass extends ServiceProvider
{

    private $namespace = "Modules\product\Http\Controllers";

    public function register()
    {
        ProviderFacade::shouldProxyTo(Provider::class );
        ResponseFacade::shouldProxyTo(WebResponse::class);
    }

    public function boot()
    {

        $this->loadViewsFrom(__DIR__.'/views','ProductView');

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__.'/routes.php');
    }
}
