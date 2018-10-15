<?php

namespace common\components\exceptions;

use common\components\BaseException;
use Throwable;

class Unauthorized extends BaseException
{
    public function __construct($message = "", $code = 401, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
