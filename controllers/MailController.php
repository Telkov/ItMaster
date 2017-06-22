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
// use app\m odels\Sent;

class MailController extends AppController
{
    public function actionIndex()
    {
        $mail = new MailForm();
        $mail->date_dep = date("Y-m-d H:i:s");
        if ($mail->load(Yii::$app->request->post())) {
        	if ($mail->save()) {
        		Yii::$app->session->setFlash('succes', 'Письмо отправлено успешно');
        		return $this->refresh();
        	} else {
        		Yii::$app->session->setFlash('error', 'Произошла ошибка');
        	}
        }

        return $this->render('mailform', compact('mail'));


    }

    
    
    public function actionSent()
    {
//      $sent = Sent::find()->all(); выборка в объект
        $sent = MailForm::find()->asArray()->all(); //выборка в масив
        $countsent = MailForm::find()->asArray()->count(); //выгрузка кол-ва записей
        return $this->render('sent', compact('sent', 'countsent'));
    }
}