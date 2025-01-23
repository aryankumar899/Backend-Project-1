<?php
namespace App\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware{

/** 



*@param \Illuminate\Request   $request

 *   @return string|null
*/


    protected function redirectTo($request)
    {
        if(! $request->expectsJson()){
            return route('login');
        }
    }
}
