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
        if ($model->load(Yii::$app->request->post())) {
        	if($model->validate()) {
        		Yii::$app->session->setFlash('succes', 'Данные приняты');
        	} else {
        		Yii::$app->session->setFlash('error', 'Произошла ошибка');
        	}
        }

        return $this->render('mailform', compact('model'));


    }
}