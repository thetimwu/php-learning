<?php

namespace App\models;

use App\core\Model;
use App\core\Application;

class ContactForm extends Model
{
    public string $subject = "";
    public string $email = "";
    public string $body = "";

    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQURED],
            'email' => [self::RULE_REQURED, self::RULE_EMAIL],
            'body' => [self::RULE_REQURED]
        ];
    }

    public function labels(): array
    {
        return [
            'subject' => 'Enter your subject',
            'email' => 'Your email',
            'body' => 'Body'
        ];
    }
}
