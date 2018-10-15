<?php

namespace common\components;

use yii\i18n\PhpMessageSource;
use yii\i18n\MissingTranslationEvent;

class MessageSource extends PhpMessageSource
{
    const MESSAGE_DELIMITER = '.';
    public $messages = [];

    protected function translateMessage($category, $message, $language)
    {
        $key = $language . '/' . $category;
        if (!isset($this->messages[$key])) {
            $this->messages[$key] = $this->loadMessages($category, $language);
        }

        if (isset($this->messages[$key][$message]) && $this->messages[$key][$message] !== '') {
            return $this->messages[$key][$message];
        }

        $nestedMessage = explode(self::MESSAGE_DELIMITER, $message);
        if (count($nestedMessage) > 1) {
            $findMessage = null;
            foreach ($nestedMessage as $step) {
                if ($findMessage === null) {
                    $findMessage = $this->messages[$key][$step];
                    continue;
                }
                $findMessage = $findMessage[$step];
            }

            if ($findMessage) {
                return $findMessage;
            }

            return false;
        }
        if ($this->hasEventHandlers(self::EVENT_MISSING_TRANSLATION)) {
            $event = new MissingTranslationEvent([
                'category' => $category,
                'message' => $message,
                'language' => $language,
            ]);
            $this->trigger(self::EVENT_MISSING_TRANSLATION, $event);
            if ($event->translatedMessage !== null) {
                return $this->messages[$key][$message] = $event->translatedMessage;
            }
        }

        return $this->messages[$key][$message] = false;
    }
}
