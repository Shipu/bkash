<?php

namespace Shipu\Bkash\Response;

use Apiz\Http\Response;

class BkashResponse extends Response
{
    public function response($code = null, $data = null)
    {
        return $this->query()->collect([
            'code' => $code ?: $this->getStatusCode(),
            'data' => $data ?: $this->query()->toArray()
        ]);
    }
}
