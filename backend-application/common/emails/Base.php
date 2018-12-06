<?php

namespace common\emails;

use Yii;

abstract class Base
{
    private $dirNameHtml = 'html';
    private $dirNameText = 'text';
    private $mailer;

    protected $viewName;
    protected $subject;
    protected $data = [];
    protected $from = 'blabla@example.com';
    protected $to;

    public function __construct($data = [])
    {
        $this->mailer = Yii::$app->mailer;
    }

    /**
     * @param $data
     * @return Base
     */
    public function setData($data): Base
    {
        $this->data = array_merge($this->data, $data);

        return $this;
    }

    /**
     * @param $to
     */
    public function setTo($to): void
    {
        $this->to = $to;
    }

    /**
     * @param $from
     */
    public function setFrom($from): void
    {
        $this->from = $from;
    }

    /**
     * @param $layoutName
     * @return Base
     */
    public function setLayout($layoutName): Base {
        $this->mailer->htmlLayout = "@email/layouts/html/{$layoutName}";

        return $this;
    }

    /**
     * @param $data
     */
    public function send(): void
    {

        $this->mailer->compose([
            'html' => "{$this->dirNameHtml}/{$this->viewName}",
            'text' => "{$this->dirNameText}/{$this->viewName}",
        ], $this->data)
            ->setFrom($this->to)
            ->setTo($this->to)
            ->setSubject($this->subject)
            ->send();
    }
}
