<?php
/**
 * Author: Vicens
 * E-Mail: 521287718@qq.com
 * Date: 2015/12/12 17:04
 */

namespace App\Providers\Auth;


use Illuminate\Auth\Guard;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class AdminAuth extends Guard
{

    /**
     * Create a new authentication guard.
     *
     * @param  \Illuminate\Contracts\Auth\UserProvider $provider
     * @param  \Symfony\Component\HttpFoundation\Session\SessionInterface $session
     * @param  \Symfony\Component\HttpFoundation\Request $request
     * @return void
     */
    public function __construct(AdminAuthUserProvider $provider,
                                SessionInterface $session,
                                Request $request = null)
    {
        $this->session = $session;
        $this->request = $request;
        $this->provider = $provider;
    }

    /**
     * Get a unique identifier for the auth session value.
     *
     * @return string
     */
    public function getName()
    {

        return 'admin_login_' . md5(get_class($this));
    }

    /**
     * Get the name of the cookie used to store the "recaller".
     *
     * @return string
     */
    public function getRecallerName()
    {
        return 'admin_remember_' . md5(get_class($this));
    }
}