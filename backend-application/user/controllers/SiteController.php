<?php

namespace user\controllers;

use common\components\Controller;
use Yii;

class SiteController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['access']['rules'] = [
            [
                'allow' => true,
                'actions' => ['index'],
                'roles' => ['admin'],
            ],
        ];

        return $behaviors;
    }

    /**
     * Displays homepage.
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
