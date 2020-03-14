<?php

namespace Haris\Contracts\Authentication;

/**
 * Interface WebAuthContract
 * 
 * @author Haris <theharisshah@gmail.com>
 */
interface WebAuthContract
{
    /**
     * @param $user;
     * 
     * @return mixed
     */
    public function userCanLogIn($user);

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

    /**
     * @return mixed
     */
    public function userSocialEmailMissing();

    /**
     * @return mixed
     */
    public function userPasswordResetDone();

    /**
     * @param $message
     * 
     * @return mixed
     */
    public function userPasswordResetFailed($message);
}
