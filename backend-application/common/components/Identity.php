<?php


namespace common\components;

use yii\web\IdentityInterface;
use common\queries\AuthorizationQuery;
use common\models\User;

class Identity extends Model implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null): ?User
    {

        $modelUser = User::find()
            ->innerJoinWith(['authorizations' => function (AuthorizationQuery $query) use ($token) {
                $query->andWhere(['token' => $token]);
            }])->one();
        if ($modelUser) {
            return $modelUser;
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {

    }
}
