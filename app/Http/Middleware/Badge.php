<?php

namespace App\Http\Middleware;

use App\Models\Notification;
use App\Models\Offer;
use App\Models\PurchaseOrder;
use App\Models\Transaction;
use App\Models\UpdatePrice;
use Closure;
use Illuminate\Http\Request;

class Badge
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
        $notifications = Notification::count();
        session()->put("notifications_count", $notifications);
        return $next($request);
    }
}
