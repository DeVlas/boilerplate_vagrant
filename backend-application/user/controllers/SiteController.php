<?php

namespace user\controllers;

use yii\web\Controller;
use Yii;

class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->asJson(['hui' => 'pizda']);

    }
}
