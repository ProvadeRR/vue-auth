<?php


namespace App\Services;


use App\Models\User;

class TokenService
{
    /**
     * @param User $user
     * @return \Laravel\Passport\PersonalAccessTokenResult
     */
    public function createToken(User $user){
       return $user->createToken(env('APP_NAME'));
    }
}
