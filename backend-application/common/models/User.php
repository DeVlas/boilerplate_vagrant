<?php

namespace common\models;

use common\components\Identity;
use common\queries\UserQuery;
use yii\db\ActiveQuery;

/**
 * @property $id integer
 * @property $email string
 * @property $password string
 * @property $phone string
 * @property $created_at string
 * @property $updated_at string
 * @property $deleted_at string
 */
class User extends Identity
{
    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';

    /**
     * @inheritdoc
     */
    public static function tableName(): string
    {
        return '{{users}}';
    }

    /**
     * @inheritdoc
     */
    public static function find(): UserQuery
    {
        return new UserQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function getAuthorizations(): ActiveQuery
    {
        return $this->hasMany(Authorization::class, ['user_id' => 'id']);
    }
}
