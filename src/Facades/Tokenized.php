<?php

namespace Shipu\Bkash\Facades;

use Illuminate\Support\Facades\Facade;

class Tokenized extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bkash.tokenized';
    }
}
