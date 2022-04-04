<?php


namespace Modules\login\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\login\Http\Facades\ResponseFacade;

class LoginController extends Controller
{
    public function __construct()
    {
        //$this->middleware('redirect.auth')->except('logout');
    }

    public function login()
    {
        return ResponseFacade::login();
    }

    public function logout()
    {
        auth('admin')->logout();
        session()->forget('counterNewComments');
        return redirect('/');
    }

    public function doLogin()
    {
        if(auth('admin')->attempt(['username' => \request()->input('username') , 'password' => \request()->input('password')])){
            return redirect('/dashboard');
        }
        return redirect()->back()->with('loginError','Error');
    }

    public function dashboard()
    {
        return view('dashboard.home');
    }

    public function username()
    {
        return 'username';
    }
}
