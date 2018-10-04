<?php

namespace common\services;

use Yii;

class Internationalization
{
    const LANGUAGE_EN = 'en';
    const LANGUAGE_RU = 'ru';

    /**
     * available languages in application
     */
    const AVAILABLE_LANGUAGES = [
        self::LANGUAGE_EN,
        self::LANGUAGE_RU,
    ];

    /**
     * Define a language by custom header or acceptable user languages
     */
    public static function setLanguage()
    {
        if (Yii::$app->request->headers['x-language'] && in_array(Yii::$app->request->headers['x-language'], self::AVAILABLE_LANGUAGES)) {
            Yii::$app->language = Yii::$app->request->headers['x-language'];
        } else {
            foreach (Yii::$app->request->getAcceptableLanguages() as $language) {
                if (in_array($language, self::AVAILABLE_LANGUAGES)) {
                    Yii::$app->language = $language;
                    break;
                }
            }
        }
    }
}
