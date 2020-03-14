<?php

namespace Haris\Helpers\Authentication;

use Carbon\Carbon;
use Haris\Contracts\Authentication\WebAuthContract;
use Haris\Models\User;
use Haris\Models\UserPasswordReset;
use Haris\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\Factory as Socialite;

class WebAuthHelper
{
    private $auth;

    private $socialite;

    public function __construct(Socialite $socialite)
    {
        $this->auth = Auth::guard('web');
        $this->socialite = $socialite;
    }

    public function execute($request, WebAuthContract $listener)
    {
        $user = User::where(['email' => $request->email])->first();
        if (!empty($user)) {
            if (!$user->status) {
                return $listener->userIsBlocked();
            }
            if ($this->auth->validate(['email' => $request->email, 'password' => $request->password])) {
                return $listener->userCanLogIn($user);
            }
        }
        return $listener->userLogInFailed('Invalid credentials');
    }

    public function executeSocial($hasCode, WebAuthContract $listener, $social)
    {
        if (!$hasCode) {
            return $this->getAuthorizationFirst($social);
        }
        $socialUser = $this->getSocialUser($social);
        if (!empty($socialUser->getEmail())) {
            $userService = new UserService();
            $user = $userService->createOrGetUserBySocial($socialUser);
            return $listener->userCanLogIn($user);
        }
        return $listener->userSocialEmailMissing();
    }

    public function resetPassword(User $user,WebAuthContract $listener,$request)
    {
            if ($this->auth->validateCredentials($user,['password' => $request->old_password])) {
                $userService = new UserService();
                $userService->resetPassword($user,$request);
                return $listener->userPasswordResetDone();
            }
        return $listener->userPasswordResetFailed('Invalid Password');
    }

    public function resetPasswordUsingToken(WebAuthContract $listener,$request)
    {
        $resetPassword=UserPasswordReset::where('token',$request->token)->with('customer')
            ->where('expires_on','>',Carbon::now()->toDateTimeString())->first();
        if(!empty($resetPassword)) {
            $userService = new UserService();
            $userService->resetPassword($resetPassword->customer, $request);
            $resetPassword->delete();
            return $listener->userPasswordResetDone();
        }
        return $listener->userPasswordResetFailed('Invalid Token');

    }

    public function logout($request, WebAuthContract $listener)
    {
        $this->auth->logout();
        return $listener->userHasLoggedOut();
    }

    private function getAuthorizationFirst($social)
    {
        return $this->socialite->driver($social)->redirect();
    }

    private function getSocialUser($social_type)
    {
        return $this->socialite->driver($social_type)->user();
    }
}