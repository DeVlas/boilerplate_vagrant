<?php


namespace common\components;

use yii\web\User as WebUser;

/**
 * @property $identityClass Identity
 */
class User extends WebUser
{
    public function getId() {
        return $this->identity->getId();
    }

    public function getRole()
    {
        return $this->identity;
    }
}
