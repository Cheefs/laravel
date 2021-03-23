<?php


namespace App\Adaptors;

use App\Models\User;
use Laravel\Socialite\Contracts\User as OauthUser;


class UserAdaptor
{
    public function getUserBySocId(OauthUser $user, string $socName) {
        $userInSystem = User::query()
            ->where('social_id', $user->id)
            ->where('auth_type', $socName)
            ->first();
        if (!$userInSystem) {
            $userInSystem = $this->saveUser($user, $socName);
        }
        return $userInSystem;
    }

    protected function saveUser(OauthUser $user, string $socName) {
        $userInSystem = new User();
        $userInSystem->fill([
            'name' => $user->getNickname(),
            'email' => $user->getEmail(),
            'social_id' => $user->getId(),
            'auth_type' => $socName,
            'password' => '',
            'email_verified_at' => now(),
            'avatar' => $user->getAvatar()
        ]);
        $userInSystem->save();
        return $userInSystem;
    }
}
