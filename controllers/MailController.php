<?php

namespace app\controllers;

use app\models\DeleteId;
use app\models\Prepare;
use app\models\MailForm;
use yii\web\JsonParser;
use Yii;
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
        $new = new Prepare(); //приведем строковое значение переменной к нужному виду
        $ids = $new->transform($obj);
        $query = "DELETE FROM Sent WHERE id in (".$ids.")"; //создаем запрос на удаление и следом удаляем
        return Yii::$app->db
            ->createCommand($query)
            ->queryAll();
    }
}