<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard as Auth;
use App\Providers\Auth\AdminAuthUserProvider;
use App\Enum\Admin as AdminEnum;

class SuperAdmin
{


    protected $auth;


    public function __construct(Auth $auth, AdminAuthUserProvider $userProvider)
    {

        $this->auth = $auth;
        $this->auth->setProvider($userProvider);
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

        if ($this->auth->guest() || $this->auth->user()->admin_role === AdminEnum::ROLE_SUPERADMIN) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {

               abort(404);
            }
        }

        return $next($request);
    }
}
