<?php


namespace common\components;

use yii\filters\AccessRule as BaseAccessRule;

class AccessRule extends BaseAccessRule
{
    public function matchRole($user)
    {

        if (empty($this->roles)) {
            return true;
        }

        if ($user->getIsGuest() && in_array('?', $this->roles)) {
            return true;
        }

        if (!$user->getIsGuest()) {
            if (in_array('@', $this->roles)) {
                return true;
            }

            if (in_array($user->identity->role, $this->roles)) {
                return true;
            }
        }


        return false;
    }
}
