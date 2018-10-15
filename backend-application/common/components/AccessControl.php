<?php


namespace common\components;

use common\components\exceptions\Unauthorized;
use common\components\exceptions\Forbidden;
use yii\filters\AccessControl as BaseAccessControl;


class AccessControl extends BaseAccessControl
{
    /**
     * @param false|\yii\web\User $user
     * @throws Forbidden
     * @throws Unauthorized
     */
    public function denyAccess($user): void
    {
        if ($user === false || $user->getIsGuest()) {
            throw new Unauthorized('common.exceptions.unauthorized');
        } else {
            throw new Forbidden('common.exceptions.forbidden');
        }
    }
}
