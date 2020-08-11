<?php

namespace App\Http\Middleware;

use Closure;
use App\UserApp;

class AppAuth
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
        $token = $request->header('Authorization');

        $userApp = UserApp::where('token', $token)->where('status', 1)->first();

        if($userApp){
            return $next($request);
        }else{
            return response()->json([
                'message' => 'Não autorizado.'
            ]);
        }
    }
}
