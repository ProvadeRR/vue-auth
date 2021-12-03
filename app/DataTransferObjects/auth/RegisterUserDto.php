<?php


namespace App\DataTransferObjects\auth;


use Illuminate\Support\Facades\Hash;
use Spatie\DataTransferObject\DataTransferObject;

class RegisterUserDto extends DataTransferObject
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */

    public $email;

    /**
     * @var string
     */

    public $password;


    public function __construct(array $parameters = [])
    {
        $parameters['password'] = Hash::make($parameters['password']);
        parent::__construct($parameters);
    }


}
