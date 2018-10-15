<?php

namespace common\components\exceptions;

use common\components\BaseException;
use Throwable;

class Forbidden extends BaseException
{
    public function __construct($message = "", $code = 403, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
