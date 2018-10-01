<?php
namespace common\components;

use yii\helpers\Json;
use yii\web\Controller as BaseController;
use Yii;

class Controller extends BaseController {
    private $format = \yii\web\Response::FORMAT_JSON;

    public function setFormat($format) {
        $this->format = $format;
    }

    public function getFormat() {
        return $this->format;
    }

    public function response($data) {
        $response = Yii::$app->response;
        $response->format = $this->getFormat();
        $response->data = Json::encode($data);
    }
}
