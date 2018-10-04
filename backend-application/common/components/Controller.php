<?php

namespace common\components;


use yii\web\Controller as BaseController;
use common\services\Response;

/*
 * Base controller
 */

class Controller extends BaseController
{
    /**
     * Send response to user
     * @param $data
     */
    public function response($data)
    {
        Response::send($data);
    }
}
