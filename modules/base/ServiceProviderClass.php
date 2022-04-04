<?php


namespace Modules\base;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\base\DB\Provider;
use Modules\base\Facades\ProviderFacade;
use Modules\base\Http\Facades\ResponseFacade;
use Modules\base\Http\Responses\WebResponse;

class ServiceProviderClass extends ServiceProvider
{

    private $namespace = "Modules\base\Http\Controllers";

    public function register()
    {
        ProviderFacade::shouldProxyTo(Provider::class );
        ResponseFacade::shouldProxyTo(WebResponse::class);
    }

    public function boot()
    {

        $this->loadViewsFrom(__DIR__.'/views','ViewPage');

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__.'/routes.php');
    }
}
