<?php


namespace Modules\login;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Modules\login\DB\LoginProvider;
use Modules\login\Facades\LoginProviderFacade;
use Modules\login\Http\Facades\ResponseFacade;
use Modules\login\Http\Responses\WebResponse;

class LoginServiceProvider extends ServiceProvider
{

    private $namespace = "Modules\login\Http\Controllers";

    public function register()
    {
        LoginProviderFacade::shouldProxyTo(LoginProvider::class);
        ResponseFacade::shouldProxyTo(WebResponse::class);
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views','Login');

        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__.'/routes.php');
    }
}
