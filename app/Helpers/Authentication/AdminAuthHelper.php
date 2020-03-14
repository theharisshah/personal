<?php

namespace Haris\Helpers\Authentication;

use Haris\Contracts\Authentication\AdminAuthContract;
use Haris\Models\Admin;
use Illuminate\Support\Facades\Auth;

/**
 * Class AdminAuthHelper
 *
 * @package Haris\Helpers\Authentication
 */
class AdminAuthHelper
{
    /**
     * @var mixed
     */
    private $auth;

    /**
     * AdminAuthHelper constructor.
     */
    public function __construct()
    {
        $this->auth = Auth::guard('admin');
    }

    /**
     * @param                                                        $request
     * @param \Haris\Contracts\Authentication\AdminAuthContract $listener
     *
     * @return mixed
     */
    public function execute($request, AdminAuthContract $listener)
    {
        return $this->attemptLogin($request, $listener);
    }

    /**
     * @param                                                        $request
     * @param \Haris\Contracts\Authentication\AdminAuthContract $listener
     *
     * @return mixed
     */
    private function attemptLogin($request, AdminAuthContract $listener)
    {
        $admin=Admin::where(['email' => $request->email])->first();
        if(!empty($admin)) {
            if (!$admin->status) {
                return $listener->userIsBlocked();
            }
            if ($this->auth->attempt(['email' => $request->email, 'password' => $request->password])) {
                return $listener->userHasLoggedIn($this->auth->User());
            }
        }
        return $listener->userLogInFailed('Invalid credentials');
    }

    /**
     * @param                                                        $request
     * @param \Haris\Contracts\Authentication\AdminAuthContract $listener
     *
     * @return mixed
     */
    public function logout($request, AdminAuthContract $listener)
    {
        $this->auth->logout();
        return $listener->userHasLoggedOut();
    }
}