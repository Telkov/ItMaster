<?php

namespace app\components;

use yii\base\Widget;
use app\models\Sent;

class CountSentWidget extends Widget
{
    public function init()
    {
        parent::init();
    }
    public function run()
    {
        $countsentmsg = Sent::find()->asArray()->count(); //выгрузка кол-ва записей
        return $this->render('counts', compact('countsentmsg'));
    }
}