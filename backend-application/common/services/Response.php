<?php

namespace common\services;

use Yii;
use yii\helpers\Json;
use \yii\web\Response as BaseResponse;

class Response
{

    public static function send($data, $format = BaseResponse::FORMAT_JSON, $code = 200)
    {
        $response = Yii::$app->response;
        $response->format = $format;
        $response->setStatusCode($code);

        switch ($format) {
            case BaseResponse::FORMAT_HTML:
            case BaseResponse::FORMAT_RAW:
                $response->data = $data;
                break;
            case BaseResponse::FORMAT_JSON:
                $response->data = [
                    'code' => $code,
                    'data' => $data,
                ];
                break;
        }

        $response->send();
    }
}
