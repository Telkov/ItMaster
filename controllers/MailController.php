<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 19.06.2017
 * Time: 21:42
 */

namespace app\controllers;
use app\models\Delete;
use Yii;
use app\models\MailForm;

// use app\models\Sent;

class MailController extends AppController
{
    public function actionIndex()
    {
        $mail = new MailForm();
        $mail->date_dep = date("Y-m-d H:i:s");
        if ($mail->load(Yii::$app->request->post())) {
        	if ($mail->save()) {
//        	    debug($mail);
                Yii::$app->mailer->compose()
//                    ->setFrom(['php.str@ukr.net' => 'ItMAster TEST'])
                    ->setFrom(['mailertest.dev@gmail.com' => 'ItMAster TEST'])
                    ->setTo($mail->recipient)
                    ->setSubject($mail->subject)
                    ->setTextBody($mail->message)
                    ->send();
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
        if (Yii::$app->request->isAjax) {
            debug($_POST);
        }
        //      $sent = Sent::find()->all(); выборка в объект
        $sent = MailForm::find()->asArray()->all(); //выборка в масив
        $countsent = MailForm::find()->asArray()->count(); //выгрузка кол-ва записей
        return $this->render('sent', compact('sent', 'countsent'));

//        Yii::$app->response->format = Response::FORMAT_JSON;
//        $data = json_decode($_POST['jsonObj']);
//        return $this->render('sent', compact('data'));

    }

    public function actionDelete()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $data = json_decode($_POST['jsonObj']);
        return $this->render('sent', compact('data'));
//        $del = new Delete();
//        $del->deleteMessages();
//            return $this->render('sent', compact('data'));
    }

}