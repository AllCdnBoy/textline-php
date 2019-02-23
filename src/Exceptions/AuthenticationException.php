<?php

namespace Textline\Exceptions;

class AuthenticationException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message, 401);
    }
}

