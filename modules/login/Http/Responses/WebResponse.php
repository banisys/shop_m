<?php


namespace Modules\login\Http\Responses;


class WebResponse
{
    public function login()
    {
        return view('Login::index');
    }
}
