<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Cache;

class UserActivity
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
        /** @var User $user */
        $user = $request->user();

        if ($user) {

            $cacheKey = 'activity_set_' . $user->id; //$cacheKey => activity_set_201

            $cache = Cache::get($cacheKey);

            if (!$cache) {
                $user->last_activity = Carbon::now();
                $user->save();

                Cache::put($cacheKey, 1, Carbon::now()->addMinutes(1));
            }


        }

        return $next($request);
    }
}
