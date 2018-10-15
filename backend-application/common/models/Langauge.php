<?php

namespace common\models;

use common\components\Model;
use common\queries\LanguageQuery;

class Language extends Model
{

    const STATUS_NOT_AVAILABLE = 0;
    const STATUS_AVAILABLE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{languages}}';
    }

    /**
     * @inheritdoc
     */
    public static function find()
    {
        return new LanguageQuery(get_called_class());
    }
}
