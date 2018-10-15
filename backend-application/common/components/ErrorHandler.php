<?php

namespace common\components;

use common\services\Response;
use yii\web\ErrorHandler as baseErrorHandler;
use common\components\BaseException;
use common\components\exceptions\Forbidden;
use common\components\exceptions\Unauthorized;
use Yii;

class ErrorHandler extends baseErrorHandler
{
    public function renderException($exception)
    {
        Yii::error($exception->__toString(), 'error');
        if ($exception instanceof BaseException) {

        } else {

        }
        if (getenv('environment') === 'development') {
            Response::send($this->getMessage($exception->getMessage()), 'raw');
        } else {
            Response::send(['message' => $this->getMessage($exception->getMessage())]);
        }
    }

    /**
     * @param $message
     * @return string
     */
    public function getMessage($message): string
    {
        $messageParts = explode('.', $message);
        if (count($messageParts) > 1) {
            return Yii::t(array_shift($messageParts), implode('.', $messageParts));
        } else {
            return $message;
        }
    }
}
