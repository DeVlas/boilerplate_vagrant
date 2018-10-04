<?php

use common\components\Model;

class Language extends Model
{

    const STATUS_NOT_AVAILABLE = 0;
    const STATUS_AVAILABLE = 1;

    public static function tableName()
    {
        return '{{languages}}';
    }
}
