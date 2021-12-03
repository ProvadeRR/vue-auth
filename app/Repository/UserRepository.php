<?php


namespace App\Repository;


use App\DataTransferObjects\auth\RegisterUserDto;
use App\Models\User;

class UserRepository
{
    /**
     * @param RegisterUserDto $registerUserDto
     * @return User
     */
    public function createUser(RegisterUserDto $registerUserDto)
    {
        $user = new User();
        $user->name = $registerUserDto->name;
        $user->email = $registerUserDto->email;
        $user->password = $registerUserDto->password;
        $user->save();
        return $user;
    }



}
