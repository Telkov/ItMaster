<?php

namespace app\controllers;
use app\models\Delete;
use app\models\Prepare;
use Yii;
use app\models\MailForm;
use yii\web\JsonParser;

// use app\models\Sent;

class MailController extends AppController
{
    public $obj;
    public $ids;
    //Функционал отправки письма и добавление новых писем в БД
    public function actionNew()
    {
        $mail = new MailForm();
        $mail->date_dep = date("Y-m-d H:i:s");
        if ($mail->load(Yii::$app->request->post())) {
        	if ($mail->save()) {
                Yii::$app->mailer->compose()
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

    //Выборка писем из БД
    public function actionSent()
    {
        $sent = MailForm::find()->asArray()->all(); //выборка в масив
        $countsent = MailForm::find()->asArray()->count(); //выгрузка кол-ва записей
        return $this->render('sent', compact('sent', 'countsent'));

    }

    //Удаление писем
    public function actionDelete()
    {
        if (Yii::$app->request->isAjax) {
            $obj = $_POST['jsonObj'];
        }
        $new = new Prepare();
        $ids = $new->transform($obj);
        echo $ids;

        $del = new Delete();
        $q = $del->deleteMsg($ids);

        debug($q);
//        return \Yii::$app
//            ->db
//            ->createCommand()
//            ->delete('Sent', ['id => $ids'])
//            ->execute();


////        $del = new Delete();
////        $del->deleteMessages();
////            return $this->render('sent', compact('data'));
    }

}