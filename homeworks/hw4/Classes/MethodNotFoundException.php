<?php

namespace homeworks\hw4\Classes;

use Exception;

class MethodNotFoundException extends Exception
{
    public function __construct($method, $code = 0, Exception $previous = null)
    {
        $message = "Method $method does not exist.";
        parent::__construct($message, $code, $previous);
    }
}
