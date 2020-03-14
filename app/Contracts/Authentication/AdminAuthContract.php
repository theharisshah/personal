<?php

namespace Haris\Contracts\Authentication;

/**
 * Interface AdminAuthContract
 * 
 * @author Haris <theharisshah@gmail.com>
 */
interface AdminAuthContract
{
    /**
     * @param $user;
     * 
     * @return mixed
     */
    public function userHasLoggedIn($user);

    /**
     * @param $message
     *
     * @return mixed
     */
    public function userLogInFailed($message);

    /**
     * @return mixed
     */
    public function userIsBlocked();

    /**
     * @return mixed
     */
    public function userHasLoggedOut();
}
