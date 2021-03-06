<?php

namespace App\models;

use Dumko23\PhpMvcCore\Model;

class ContactForm extends Model
{
    public string $subject = '';
    public string $email = '';
    public string $body = '';


    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED],
            'body' => [self::RULE_REQUIRED]
        ];
    }

    public function labels(): array
    {
        return [
            'subject' => 'Your subject',
            'email' => 'Your Email address',
            'body' => 'Message'
        ];
    }

    public function send(): bool
    {
        return true;
    }
}