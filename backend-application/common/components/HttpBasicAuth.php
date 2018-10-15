<?php

namespace common\components;

use common\components\exceptions\Unauthorized;
use yii\filters\auth\AuthMethod as BaseAuthMethod;
use Yii;

class HttpBasicAuth extends BaseAuthMethod
{
    /**
     * @param $user \common\components\User
     * @param $request
     * @param $response
     * @return mixed|null|\yii\web\IdentityInterface
     */
    public function authenticate($user, $request, $response)
    {

        $token = $request->headers['X-Authorization'];
        if ($token) {
            $identity = $user->loginByAccessToken($token);
            if ($identity) {
                return $identity;
            }
        }

        return null;
    }

    /**
     * @param \yii\base\Action $action
     * @return bool|void
     */
    public function beforeAction($action)
    {
        $this->authenticate(
            $this->user ?: Yii::$app->getUser(),
            $this->request ?: Yii::$app->getRequest(),
            $this->response ?: Yii::$app->getResponse()
        );

        return true;
    }

    /**
     * @param \yii\web\Response $response
     * @throws Unauthorized
     */
    public function handleFailure($response)
    {
        throw new Unauthorized(\Yii::t('common', 'exceptions.unauthorized'));
    }
}
