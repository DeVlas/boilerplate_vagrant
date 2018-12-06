<?php

namespace user\controllers;

use common\components\Controller;
use common\emails\Promote;
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
                'roles' => [],
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

        $email = new Promote();
        $email->setData(['data' => 'dasdasd', 'da' => 'no'])->send();

        return $this->response(['something' => Yii::t('common', 'test')]);

    }
}
