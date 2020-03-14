<?php

namespace Haris\Services;

use Haris\Exceptions\ServiceException;
use Haris\Models\User;
use Haris\Services\Service;
use Illuminate\Http\Request;
use Laravel\Socialite\Contracts\User as SocialiteUser;

class UserService extends Service
{
    public function createOrGetUserBySocial(SocialiteUser $socialUser)
    {
        $name = explode(' ', $socialUser->getName());
        $firstName = $name[0];
        $lastName = !empty($name[1]) ? $name[1] : null;
        $user = User::firstOrCreate(['email' => $socialUser->getEmail()], [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $socialUser->getEmail(),
            'password' => bcrypt(getPassword($firstName))
        ]);

        return $user;
    }

    public function resetPassword(User $user, $request)
    {
        $user->password=bcrypt($request->password);
        $user->save();
        return $user;
    }
}
