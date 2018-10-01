<?php

namespace user\controllers;

use common\components\Controller;


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
        echo $zxcvb;
        //throw new \Exception('wqewqeqweqw');
        return $this->response(['hui' => 'pizda']);

    }
}
