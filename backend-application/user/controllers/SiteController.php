<?php

namespace user\controllers;

use common\components\Controller;
use Yii;

class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     * @throws \Exception
     */
    public function actionIndex()
    {
        try {

            return $this->response(['something' => Yii::t('common', 'test')]);
        } catch (\Throwable $e) {
            // Throwable base class of Exception;
        }
    }
}
