<?php


namespace common\models;

use common\components\Model;
use common\queries\AuthorizationQuery;

/**
 * @property int user_id
 * @property string token
 * @property string expired_at
 * @property string created_at
 * @property string updated_at
 */
class Authorization extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{authorizations}}';
    }

    /**
     * @inheritdoc
     */
    public static function find(): AuthorizationQuery
    {
        return new AuthorizationQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
