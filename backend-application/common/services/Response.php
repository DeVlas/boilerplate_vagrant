<?php

namespace common\services;

use Yii;
use yii\helpers\Json;

class Response
{

    public static function send($data, $format = \yii\web\Response::FORMAT_JSON, $code = 200)
    {
        $response = Yii::$app->response;
        $response->format = $format;
        $response->setStatusCode($code);
        $response->data = [
            'code' => $code,
            'data' => $data,
        ];

        $response->send();
    }
}
