<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 19.06.2017
 * Time: 21:42
 */

namespace app\controllers;
use Yii;
use app\models\MailForm;

class MailController extends AppController
{
    public function actionIndex()
    {
        $model = new MailForm();

        return $this->render('mailform', compact('model'));
    }
}