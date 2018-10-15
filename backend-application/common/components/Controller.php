<?php

namespace common\components;

use yii\web\Controller as BaseController;
use common\services\Response;

class Controller extends BaseController
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::class
        ];

        $behaviors['access'] = [
            'class' => AccessControl::class,
            'ruleConfig' => ['class' => AccessRule::class],
        ];

        return $behaviors;
    }

    /**
     * Send response to user
     * @param $data
     */
    public function response($data)
    {
        Response::send($data);
    }
}
