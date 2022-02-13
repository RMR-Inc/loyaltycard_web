<?php

namespace App\Http\Middleware;

use App\Models\LoyaltyCardEmployee;
use App\Models\Referent;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsLoyaltyCardEmployee
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
        $userId = Auth::user()->id;
        $employee = LoyaltyCardEmployee::where('user_id', '=', $userId)->first();
        if(!$employee) abort(403);

        return $next($request);
    }
}
