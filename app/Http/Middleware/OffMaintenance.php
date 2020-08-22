<?php

namespace App\Http\Middleware;

use Closure;

use App\Setting;

class OffMaintenance
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * 
     * maintenance = 1 Website is Up
     * maintenance = 0 Website is Down
     */
    public function handle($request, Closure $next)
    {
        $setting = Setting::first();
        if($setting->maintenance == 1) {
            return redirect('/');
        }else {
            return $next($request);
        }
    }
}
