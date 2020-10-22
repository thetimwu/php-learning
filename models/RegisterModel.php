<?php

namespace App\models;

use App\core\Model;

class RegisterModel extends Model
{
    public string $firstName = '';
    public string $lastName = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';

    public function register()
    {
        echo 'register model method';
    }

    public function rules(): array
    {
        return [
            'firstName' => [self::RULE_REQURED],
            'lastName' => [self::RULE_REQURED],
            'email' => [self::RULE_REQURED, self::RULE_EMAIL],
            'password' => [self::RULE_REQURED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'passwordConfirm' => [self::RULE_REQURED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }
}
