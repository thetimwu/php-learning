<?php

namespace App\models;

use App\core\DBModel;

class User extends DBModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public string $firstName = '';
    public string $lastName = '';
    public string $email = '';
    public string $password = '';
    public string $passwordConfirm = '';
    public int $status = self::STATUS_INACTIVE;

    public function register()
    {
        return $this->save();
    }

    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'firstName' => [self::RULE_REQURED],
            'lastName' => [self::RULE_REQURED],
            'email' => [self::RULE_REQURED, self::RULE_EMAIL, [self::RULE_UNIQUE, 'class' => self::class]],
            'password' => [self::RULE_REQURED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'passwordConfirm' => [self::RULE_REQURED, [self::RULE_MATCH, 'match' => 'password']]
        ];
    }

    public static function tableName(): string
    {
        return 'users';
    }

    public static function attributes(): array
    {
        return ['firstName', 'lastName', 'email', 'status', 'password'];
    }
}
