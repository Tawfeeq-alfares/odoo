<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class CheckHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!empty($request->header('headerKey'))) {

            if ($request->header('headerKey') != 'Clean20Protein23{?gfe@@k6Uus}+') {
                return response()->json(['status' => 401, 'message' => 'header not exist!'], 401, [], JSON_UNESCAPED_SLASHES);

            } else {
                return $next($request);
            }
        } else {
            return response()->json(['status' => 401, 'message' => 'header not exist!'], 401, [], JSON_UNESCAPED_SLASHES);
        }
    }
}
