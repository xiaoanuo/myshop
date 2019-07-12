<?php

namespace App\Http\Middleware;

use Closure;

class login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //前置
        $result = $request->session()->has('username');
        if($result){
            echo "登录成功！";
        }
//        return $next($request);
        $response = $next($request);

        echo 222;  //后置
        return $response;
    }
}
