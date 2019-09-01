<?php

namespace Shipu\Bkash\Enums;

interface BkashSubDomainType
{
    const CHECKOUT  = 'checkout';
    const TOKENIZED = 'tokenized';
    const PAYMENT   = 'direct';
}
