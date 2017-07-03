<?php

namespace app\components;

use yii\base\Widget;
use app\models\Sent;
use app\models\Inbox;

class CountInboxWidget extends Widget
{
    public function init()
    {
        parent::init();
    }
    public function run()
    {
        $inmails = new Inbox();
        $allinbox =  $inmails->getMail(); //получаем все входящие письма в виде массива
        $countinboxmsg = count($allinbox);

        return $this->render('countin', ['countinboxmsg' => $countinboxmsg]);
    }
}