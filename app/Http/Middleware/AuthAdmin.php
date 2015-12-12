<?php

namespace App\Http\Middleware;

use App\Providers\Auth\AdminAuth;
use Closure;
use App\Enum\Admin as AdminEnum;

class AuthAdmin
{


    protected $auth;


    public function __construct(AdminAuth $auth)
    {

        $this->auth = $auth;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ($this->auth->guest() || $this->auth->user()->admin_status === AdminEnum::STATUS_NORMAL) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {

                return redirect()->guest('/admin/auth/login');
            }
        }

        return $next($request);
    }
}
