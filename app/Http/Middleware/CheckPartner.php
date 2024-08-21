<?php

namespace App\Http\Middleware;

use App\Enums\ERegisterPartnerStatus;
use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPartner
{
    public function __construct(Application $app, Request $request) {
        $this->app = $app;
        $this->request = $request;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->register_partner_status != ERegisterPartnerStatus::ACTIVE) {
            return redirect()->route("user.register.partner");
        }
        return $next($request);
    }
}
