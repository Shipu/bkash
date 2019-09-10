<?php

namespace Shipu\Bkash\Response;

use Apiz\Http\Response;

/**
 * Class BkashResponse
 * @package Shipu\Bkash\Response
 */
class BkashResponse extends Response
{
    /**
     * @param null $code
     * @param null $data
     *
     * @return \Nahid\QArray\QueryEngine
     * @throws \Nahid\QArray\Exceptions\ConditionNotAllowedException
     */
    public function response( $code = null, $data = null )
    {
        return $this->query()->collect([
            'code' => $code ?: $this->getStatusCode(),
            'data' => $data ?: $this->query()->toArray()
        ]);
    }
}
