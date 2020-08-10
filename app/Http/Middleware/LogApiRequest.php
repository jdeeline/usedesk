<?php

namespace App\Http\Middleware;

use App\ApiLog;
use Closure;

class LogApiRequest
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
        return $next($request);
    }
	
	public function terminate($request, $response)
	{
		if (auth('api')->guest()) return;
		
		ApiLog::create([
			'url' => $request->fullUrl(),
			'method' => $request->method(),
			'request' => $request->all(),
			'visitor' => $request->ip(),
			'user_id' => auth('api')->user()->id
		]);
	}
}
