<?php

namespace common\emails;


class Promote extends Base
{
    protected $subject = 'dasd';
    protected $viewName = 'promote';
    protected $title = 'dasdad';

    public function send(): void
    {
        parent::send();
    }
}
