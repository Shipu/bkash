<?php

namespace Shipu\Bkash\Exceptions;

class ForbiddenException extends \Exception
{
    public function __construct($message = "URL not match exception!", $code = 403, \Throwable $throwable = null  )
    {
        return parent::__construct($message, $code, $throwable);
    }
}
